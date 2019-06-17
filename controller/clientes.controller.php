<?php

class ControllerClientes
{
    //___________________________________________________________________________________________________________
    // controller método que permite mostrar clientes
    public static function controllerMostrarClientes($columnaBD, $valorBD)
    {
        $tablaBD = "clientes";
        $respuesta = ModelClientes::modelMostrarClientes($tablaBD, $columnaBD, $valorBD);
        return $respuesta;
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite registrar un cliente
    public static function controllerRegistrarCliente()
    {
        if (isset($_POST["nuevoNombre"])) {
            // expreg para validar nombre del cliente y alias
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoAlias"]) &&
                preg_match('/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/', $_POST["nuevoEmail"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevaEmpresa"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoTelefono"])
            ) {

                // si no viene foto de cliente, la ruta estará vacía
                $ruta = "";

                if ($_FILES["nuevaFoto"]["tmp_name"] != "") {
                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    $directorio = "view/componentes/images/clientes/" . $_POST["nuevoAlias"];
                    // try para la creación de directorio
                    try {
                        mkdir($directorio, 0755);
                        // valida si el formato es JPG y luego trata la imagen para guardarla en un nuevo directorio
                        if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
                            $aleatorio = mt_rand(100, 999);
                            $ruta = "view/componentes/images/clientes/" . $_POST["nuevoAlias"] . "/" . $aleatorio . ".jpg";
                            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, $ruta);
                        }

                        // valida si el formato es PNG y luego trata la imagen para guardarla en un nuevo directorio
                        if ($_FILES["nuevaFoto"]["type"] == "image/png") {
                            $aleatorio = mt_rand(100, 999);
                            $ruta = "view/componentes/images/clientes/" . $_POST["nuevoAlias"] . "/" . $aleatorio . ".png";
                            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, $ruta);
                        }
                    } catch (Exception $e) {
                        $ruta = "";
                    }
                }
                $tablaBD = "clientes";
                $arrayDatos = array(
                    "nombre" => $_POST["nuevoNombre"],
                    "alias" => $_POST["nuevoAlias"],
                    "email" => $_POST["nuevoEmail"],
                    "empresa" => $_POST["nuevaEmpresa"],
                    "telefono" => $_POST["nuevoTelefono"],
                    "foto" => $ruta,
                    // 2 significa usuario desactivado
                    "estado" => "2",
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
                                window.location = "clientes";
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
    public static function controllerEditarCliente()
    {
        if (isset($_POST["editarNombre"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarAlias"]) &&
                preg_match('/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/', $_POST["editarEmail"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarEmpresa"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarTelefono"])
            ) {
                $ruta = $_POST["fotoActual"];
                // se verifica si la variable editarFoto no viene vacía para reemplazar. 
                // si viene con datos se elimina la foto actual y se reemplaza
                if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {
                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    $directorio = "view/componentes/images/clientes/" . $_POST["editarAlias"];
                    if (!empty($_POST["fotoActual"])) {
                        unlink($_POST["fotoActual"]);
                    } else {
                        mkdir($directorio, 0755);
                    }
                    // en caso que la foto venga en formato jpeg
                    if ($_FILES["editarFoto"]["type"] == "image/jpeg") {
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "view/componentes/images/clientes/" . $_POST["editarAlias"] . "/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }
                    // en caso que la foto venga en png
                    if ($_FILES["editarFoto"]["type"] == "image/png") {
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "view/componentes/images/clientes/" . $_POST["editarAlias"] . "/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }
                // tabla de la BBDD
                $tablaBD = "clientes";
                // array de datos para enviar al modelo
                $arrayDatos = array(
                    "nombre" => $_POST["editarNombre"],
                    "alias" => $_POST["editarAlias"],
                    "email" => $_POST["editarEmail"],
                    "empresa" => $_POST["editarEmpresa"],
                    "telefono" => $_POST["editarTelefono"],
                    "foto" => $ruta
                );

                $respuesta = ModelClientes::modelEditarCliente($tablaBD, $arrayDatos);
                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "El cliente ha sido modificado de forma correcta",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value)
                            {
                                window.location = "clientes";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                        swal({
                            type: "error",
                            title: "Revise bien y vuelva a ingresar los datos ingresados.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value)
                            {
                                window.location = "clientes";
                            }
                        });
                    </script>';
            }
        }
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite eliminar un cliente
    public static function controllerEliminarCliente()
    {
        // código...
    }
    //___________________________________________________________________________________________________________
}
