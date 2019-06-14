<?php

class ControllerClientes
{
    //___________________________________________________________________________________________________________
    // controller método que permite mostrar clientes
    public static function controllerMostrarCiente()
    {
        $tablaBD = "clientes";
        $respuesta = ModelClientes::modelMostrarClientes($tablaBD, $columnaBD, $valorBD);
        return $respuesta;
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite registrar un cliente
    public static function controllerRegistrarCiente()
    {
        if (isset($_POST["nuevoCliente"])) {
            // expreg para validar nombre del cliente y alias
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreCliente"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["aliasCliente"])
            ) {

                // si no viene foto de cliente, la ruta estará vacía
                $ruta = "";

                if ($_FILES["nuevaFoto"]["tmp_name"] != "") {
                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    $directorio = "view/componentes/images/usuarios/" . $_POST["nuevoNombre"];
                    // try para la creación de directorio
                    try {
                        mkdir($directorio, 0755);
                        // valida si el formato es JPG y luego trata la imagen para guardarla en un nuevo directorio
                        if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
                            $aleatorio = mt_rand(100, 999);
                            $ruta = "view/componentes/images/usuarios/" . $_POST["nuevoNombre"] . "/" . $aleatorio . ".jpg";
                            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, $ruta);
                        }

                        // valida si el formato es PNG y luego trata la imagen para guardarla en un nuevo directorio
                        if ($_FILES["nuevaFoto"]["type"] == "image/png") {
                            $aleatorio = mt_rand(100, 999);
                            $ruta = "view/img/usuarios/" . $_POST["nuevoNombre"] . "/" . $aleatorio . ".png";
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
                $respuesta = ModelClientes::modelRegistrarCliente($tablaBD, $arrayDatos);

                // si viene una respuesta "ok" del modelo, quiere decir que se agregó los datos
                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "El cliente ha sido ingresado de forma correcta",
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
                            title: "Error al ingresar el cliente",
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
    // controller método que permite editar un cliente
    public static function controllerEditarCiente()
    {
        // código...
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite eliminar un cliente
    public static function controllerEliminarCiente()
    {
        // código...
    }
    //___________________________________________________________________________________________________________
}
