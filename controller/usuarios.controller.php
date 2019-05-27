<?php

class ControllerUsuarios{
    //___________________________________________________________________________________________________________
    // controller método que permite evaluar el ingreso de un usuario al sistema
    public static function controllerIngresoUsuario(){
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
}