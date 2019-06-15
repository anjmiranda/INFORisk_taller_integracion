<?php

class ControllerUsuarios
{
    //___________________________________________________________________________________________________________
    // controller método que permite mostrar un usuario / varios usuarios
    public static function controllerMostrarUsuarios($columnaBD, $valorBD)
    {
        $tablaBD = "usuarios";
        $respuesta = ModelUsuarios::modelMostrarUsuarios($tablaBD, $columnaBD, $valorBD);
        return $respuesta;
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite evaluar el ingreso de un usuario al sistema
    public static function controllerIngresarUsuario()
    {
        if (isset($_POST["nombreUsuario"])) {
            // validar con expresiones regulares los ingresos por input
            if (
                preg_match('/^[a-zA-z0-9]+$/', $_POST["nombreUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["passUsuario"])
            ) {
                $password = hash('sha512', $_POST["passUsuario"]);
                $tablaBD = "usuarios";
                $columnaBD = "alias_usuario";
                $valorBD = strtolower($_POST["nombreUsuario"]);

                $respuesta = ModelUsuarios::modelMostrarUsuarios($tablaBD, $columnaBD, $valorBD);

                // validación del controller para saber si el usuario y pass es correcto o no
                if (
                    strtolower($respuesta["alias_usuario"]) == strtolower($_POST["nombreUsuario"]) &&
                    $respuesta["password_usuario"] == $password
                ) {
                    // se verifica si el usuario está activado y si está, se pasan variables de sesión
                    // activado = 1 / desactivado = 2
                    if ($respuesta["estado_usuario"] == 1) {
                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id_usuario"];
                        $_SESSION["nombre"] = $respuesta["nombre_usuario"];
                        $_SESSION["usuario"] = $respuesta["alias_usuario"];
                        $_SESSION["foto"] = $respuesta["foto_usuario"];
                        $_SESSION["rol"] = $respuesta["rol_usuario_fk"];
                        $_SESSION["fecha_creacion"] = $respuesta["fechacreacion_usuario"];
                        $_SESSION["ultimo_log"] = $respuesta["ultimolog_usuario"];

                        // actualizar el último acceso del usuario
                        date_default_timezone_set('America/Santiago');

                        $fecha = date('Y-m-d');
                        $hora = date('H:i:s');

                        $fechaActual = $fecha . " " . $hora;
                        //$tablaBD, $columnaBD1, $columnaBD2, $valorBD1, $valorBD2
                        $columnaBD1 = "ultimolog_usuario";
                        $valorBD1 = $fechaActual;

                        $columnaBD2 = "id_usuario";
                        $valorBD2 = $respuesta["id_usuario"];

                        $ultimoLogin = ModelUsuarios::modelActualizarUsuario($tablaBD, $columnaBD1, $columnaBD2, $valorBD1, $valorBD2);

                        if($ultimoLogin == "ok"){
                            if ($_SESSION["rol"] != "3") {
                                echo '<script> window.location = "inicio"; </script>';
                            } else {
                                echo '<script> window.location = "usuarios"; </script>';
                            } 
                        }
                    } else {
                        // alerta usuario desactivado
                        echo '<br><div class="alert alert-danger">Su usuario fue desactivado</div>';
                    }
                } else {
                    // credenciales incorrectas desde la BBDD
                    echo '<br><div class="alert alert-danger">Sus credenciales no son correctas, reintente</div>';
                }
            } else {
                // credenciales incorrectas desde expreg
                echo '<br><div class="alert alert-danger">Sus credenciales no son correctas, reintente</div>';
            }
        }
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite agregar un usuario a la BBDD
    public static function controllerRegistrarUsuario()
    {
        if (isset($_POST["nuevoNombre"])) {
            // expreg para validar nombre de usuario, alias y contraseña
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoAlias"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoPassword1"])
            ) {

                // si no viene foto de usuario, la ruta estará vacía
                $ruta = "";

                if ($_FILES["nuevaFoto"]["tmp_name"] != "") {
                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    $directorio = "view/componentes/images/usuarios/" . $_POST["nuevoAlias"];
                    // try para la creación de directorio
                    try {
                        mkdir($directorio, 0755);
                        // valida si el formato es JPG y luego trata la imagen para guardarla en un nuevo directorio
                        if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
                            $aleatorio = mt_rand(100, 999);
                            $ruta = "view/componentes/images/usuarios/" . $_POST["nuevoAlias"] . "/" . $aleatorio . ".jpg";
                            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, $ruta);
                        }

                        // valida si el formato es PNG y luego trata la imagen para guardarla en un nuevo directorio
                        if ($_FILES["nuevaFoto"]["type"] == "image/png") {
                            $aleatorio = mt_rand(100, 999);
                            $ruta = "view/componentes/images/usuarios/" . $_POST["nuevoAlias"] . "/" . $aleatorio . ".png";
                            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, $ruta);
                        }
                    } catch (Exception $e) {
                        $ruta = "";
                    }
                }
                $tablaBD = "usuarios";
                // $encriptado captura la variable $_POST["nuevoPassword1"]
                // y la transforma en una contraseña cifrada
                $encriptado = hash('sha512', $_POST["nuevoPassword1"]);
                $arrayDatos = array(
                    "nombre" => $_POST["nuevoNombre"],
                    "alias" => $_POST["nuevoAlias"],
                    "password" => $encriptado,
                    "rol" => $_POST["nuevoRol"],
                    "ruta" => $ruta
                );
                // envío de información al modelo
                $respuesta = ModelUsuarios::modelRegistrarUsuario($tablaBD, $arrayDatos);

                // si viene una respuesta "ok" del modelo, quiere decir que se agregó los datos
                if ($respuesta == "ok") {
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
            } else {
                echo '<script>
                    swal({
                            title: "Error al ingresar el usuario",
                            text: "Revise bien y vuelva a ingresar los datos ingresados.",
                            type: "error",
                            confirmButtonText: "cerrar"
                        });
                </script>';
            }
        }
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite modificar un usuario
    public static function controllerEditarUsuario()
    {
        if (isset($_POST["editarNombre"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {
                $ruta = $_POST["fotoActual"];
                // se verifica si la variable editarFoto no viene vacía para reemplazar. 
                // si viene con datos se elimina la foto actual y se reemplaza
                if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {
                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    $directorio = "view/componentes/images/usuarios/" . $_POST["editarAlias"];
                    if (!empty($_POST["fotoActual"])) {
                        unlink($_POST["fotoActual"]);
                    } else {
                        mkdir($directorio, 0755);
                    }
                    // en caso que la foto venga en formato jpeg
                    if ($_FILES["editarFoto"]["type"] == "image/jpeg") {
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "view/componentes/images/usuarios/" . $_POST["editarAlias"] . "/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }
                    // en caso que la foto venga en png
                    if ($_FILES["editarFoto"]["type"] == "image/png") {
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "view/componentes/images/usuarios/" . $_POST["editarAlias"] . "/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }
                // tabla de la BBDD
                $tablaBD = "usuarios";
                // en caso que editarPassword venga con una nueva, se encripta nuevamente
                if ($_POST["editarPassword1"] != "") {
                    if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPassword1"])) {
                        $encriptado = hash('sha512', $_POST["editarPassword1"]);
                    } else {
                        echo '<script>
                            swal({
                                    title: "Error al ingresar el usuario",
                                    text: "La password no puede tener caracteres especiales.",
                                    type: "error",
                                    confirmButtonText: "cerrar"
                                });
                        </script>';
                    }
                } else {
                    // si no, se pasa el passwordActual que está escondido en el html
                    $encriptado = $_POST["passwordActual"];
                }
                // array de datos para enviar al modelo
                $arrayDatos = array(
                    "nombre"   => $_POST["editarNombre"],
                    "alias"  => $_POST["editarAlias"],
                    "pass" => $encriptado,
                    "rol"   => $_POST["editarRol"],
                    "ruta"     => $ruta
                );

                $respuesta = ModelUsuarios::modelEditarUsuarios($tablaBD, $arrayDatos);
                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "El usuario ha sido modificado de forma correcta",
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
            } else {
                echo '<script>
                        swal({
                            type: "error",
                            title: "El nombre no puede ir vacío o llevar caracteres especiales ",
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
        }
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite eliminar un usuario
    public static function controllerEliminarUsuario()
    {
        if (isset($_GET["idUsuario"])) {
            // enviar por parámetros el id del usuario 
            $tablaBD = "usuarios";
            $datos = $_GET["idUsuario"];
            if ($_GET["fotoUsuario"] != "") {
                // eliminar la foto del usuario
                unlink($_GET["fotoUsuario"]);
                // eliminar el directorio del usuario (debe estar vacío)
                rmdir('view/componentes/images/usuarios/' . $_GET["aliasUsuario"]);
            }
            // petición al modelo para eliminar el usuario
            $respuesta = ModelUsuarios::modelEliminarUsuario($tablaBD, $datos);
            // verificación de la respuesta del modelo
            if ($respuesta == "ok") {
                echo '<script>
                        swal({
                            type: "success",
                            title: "El usuario ha sido borrado de forma correcta",
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
        }
    }
    //___________________________________________________________________________________________________________
}
