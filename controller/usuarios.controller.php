<?php

class ControllerUsuarios{
    //___________________________________________________________________________________________________________
    // controller método que permite evaluar el ingreso de un usuario al sistema
    public static function controllerIngresarUsuario(){
        if(isset($_POST["nombreUsuario"])){
            // validar con expresiones regulares los ingresos por input
            if(preg_match('/^[a-zA-z0-9]+$/', $_POST["nombreUsuario"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["passUsuario"]))
               {
                $password = hash('sha512', $_POST["passUsuario"]);
                $tablaBD = "usuarios";
                $columnaBD = "alias_usuario";
                $valorBD = strtolower($_POST["nombreUsuario"]);

                $respuesta = ModelUsuarios::modelMostrarUsuarios($tablaBD, $columnaBD, $valorBD); 

                // validación del controller para saber si el usuario y pass es correcto o no
                if(strtolower($respuesta["alias_usuario"]) == strtolower($_POST["nombreUsuario"]) && 
                   $respuesta["password_usuario"] == $password)
                   {
                    // se verifica si el usuario está activado y si está, se pasan variables de sesión
                    // activado = 1 / desactivado = 0
                    if($respuesta["estado_usuario" == "1"]){
                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id_usuario"];
                        $_SESSION["nombre"] = $respuesta["nombre_usuario"];
                        $_SESSION["usuario"] = $respuesta["alias_usuario"];
                        $_SESSION["foto"] = $respuesta["foto_usuario"];
                        $_SESSION["rol"] = $respuesta["rol_usuario_fk"];
                        $_SESSION["fecha_creacion"] = $respuesta["fechacreacion_usuario"];
                        $_SESSION["ultimo_log"] = $respuesta["ultimolog_usuario"];

                        

                        if($_SESSION["rol"] != "3"){
                            echo '<script> window.location = "inicio"; </script>';
                        }else{
                            echo '<script> window.location = "usuarios"; </script>';
                        }
                        
                    }else{
                        echo '<br><div class="alert alert-danger">Su usuario fue desactivado</div>';
                    }

                   
                }else{
                   echo '<br><div class="alert alert-danger">Sus credenciales no son correctas, reintente</div>';
                }
            }else{
                echo '<br><div class="alert alert-danger">Sus credenciales no son correctas, reintente</div>';
            }
        }
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite mostrar un usuario / varios usuarios
    public static function controllerMostrarUsuarios($columnaBD, $valorBD){
        $tablaBD = "usuarios";
        $respuesta = ModelUsuarios::modelMostrarUsuarios($tablaBD, $columnaBD, $valorBD);
        return $respuesta;
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite agregar un usuario a la BBDD
    public static function controllerRegistrarUsuario(){
        if(isset($_POST["nuevoUsuario"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoPassword"])){
                $ruta = "";
                if(isset($_FILES["nuevaFoto"]["tmp_name"])){ 
                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    $directorio = "view/img/usuarios/".$_POST["nuevoUsuario"];
                    mkdir($directorio, 0755);
                    if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){
                        $aleatorio = mt_rand(100,999);
                        $ruta = "view/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if($_FILES["nuevaFoto"]["type"] == "image/png"){
                        $aleatorio = mt_rand(100,999);
                        $ruta = "view/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";
                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }
                $tablaBD = "usuarios";
                $encriptado = hash('sha512', $_POST["nuevoPassword"]);
                $arrayDatos = array("nombre" => $_POST["nuevoNombre"],
                               "usuario" => $_POST["nuevoUsuario"],
                               "password" => $encriptado,
                               "perfil" => $_POST["nuevoPerfil"],
                               "ruta" => $ruta
                );
                
                $respuesta = ModelUsuarios::modelRegistrarUsuario($tablaBD, $arrayDatos);

                if($respuesta == "ok"){
                    echo '<script>
                        swal({
                            type: "success",
                            title: "El usuario ha sido ingresado de forma correcta",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value)
                            {
                                window.location = "usuarios";
                            }
                        });
                    </script>';
                }
            }else{
                echo '<script>
                    swal({
                            title: "Error al ingresar el usuario",
                            text: "La password no puede tener caracteres.",
                            type: "error",
                            confirmButtonText: "cerrar"
                        });
                </script>';
            }
        }
    }
}