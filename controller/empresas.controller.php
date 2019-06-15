<?php

class ControllerEmpresas
{
    //___________________________________________________________________________________________________________
    // controller método que permite mostrar una empresa
    public static function controllerMostrarEmpresas($columnaBD, $valorBD)
    {
        $tablaBD = "empresas";
        $respuesta = ModelEmpresas::modelMostrarEmpresas($tablaBD, $columnaBD, $valorBD);
        return $respuesta;
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite ingresar una empresa
    public static function controllerRegistrarEmpresa()
    {
        if (isset($_POST["nuevoRut"])) {
            // expreg para validar rut, nombre, alias, direccion y giro de empresa
            if (
                preg_match('/^(\d{2}\.\d{3}\.\d{3}-)([a-zA-Z]{1}$|\d{1}$)/', $_POST["nuevoRut"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoAlias"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDireccion"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoGiro"])
            ) {
                // si no viene foto de empresa, la ruta estará vacía
                $ruta = "";

                if ($_FILES["nuevaFoto"]["tmp_name"] != "") {
                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    $directorio = "view/componentes/images/empresas/" . $_POST["nuevoAlias"];
                    // try para la creación de directorio
                    try {
                        mkdir($directorio, 0755);
                        // valida si el formato es JPG y luego trata la imagen para guardarla en un nuevo directorio
                        if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
                            $aleatorio = mt_rand(100, 999);
                            $ruta = "view/componentes/images/empresas/" . $_POST["nuevoAlias"] . "/" . $aleatorio . ".jpg";
                            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, $ruta);
                        }

                        // valida si el formato es PNG y luego trata la imagen para guardarla en un nuevo directorio
                        if ($_FILES["nuevaFoto"]["type"] == "image/png") {
                            $aleatorio = mt_rand(100, 999);
                            $ruta = "view/componentes/images/empresas/" . $_POST["nuevoAlias"] . "/" . $aleatorio . ".png";
                            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, $ruta);
                        }
                    } catch (Exception $e) {
                        $ruta = "";
                    }
                }
                $tablaBD = "empresas";
                // array de datos: debe incluir rut, nombre, alias, direccion, giro y foto de empresa
                $arrayDatos = array(
                    "rut" => $_POST["nuevoRut"],
                    "nombre" => $_POST["nuevoNombre"],
                    "alias" => $_POST["nuevoAlias"],
                    "direccion" => $_POST["nuevaDireccion"],
                    "giro" => $_POST["nuevoGiro"],
                    "foto" => $ruta
                );
                // envío de información al modelo
                $respuesta = ModelEmpresas::modelRegistrarEmpresa($tablaBD, $arrayDatos);

                // si viene una respuesta "ok" del modelo, quiere decir que se agregó los datos
                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "La empresa ha sido ingresado de forma correcta",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value)
                            {
                                window.location = "empresas";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                            title: "Error al ingresar la empresa",
                            text: "Revise bien y vuelva a ingresar los datos.",
                            type: "error",
                            confirmButtonText: "cerrar"
                        });
                </script>';
            }
        }
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite editar una empresa
    public static function controllerEditarEmpresa()
    {
        if (isset($_POST["editarNombre"])) {
            if (
                preg_match('/^(\d{2}\.\d{3}\.\d{3}-)([a-zA-Z]{1}$|\d{1}$)/', $_POST["editarRut"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDireccion"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarGiro"])
            ) {
                $ruta = $_POST["fotoActual"];
                // se verifica si la variable editarFoto no viene vacía para reemplazar. 
                // si viene con datos se elimina la foto actual y se reemplaza
                if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {
                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    $directorio = "view/componentes/images/empresas/" . $_POST["editarAlias"];
                    if (!empty($_POST["fotoActual"])) {
                        unlink($_POST["fotoActual"]);
                    } else {
                        mkdir($directorio, 0755);
                    }
                    // en caso que la foto venga en formato jpeg
                    if ($_FILES["editarFoto"]["type"] == "image/jpeg") {
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "view/componentes/images/empresas/" . $_POST["editarAlias"] . "/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }
                    // en caso que la foto venga en png
                    if ($_FILES["editarFoto"]["type"] == "image/png") {
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "view/componentes/images/empresas/" . $_POST["editarAlias"] . "/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }
                // tabla de la BBDD
                $tablaBD = "empresas";
                // array de datos para enviar al modelo
                $arrayDatos = array(
                    "rut" => $_POST["editarRut"],
                    "nombre" => $_POST["editarNombre"],
                    "alias" => $_POST["editarAlias"],
                    "direccion" => $_POST["editarDireccion"],
                    "giro" => $_POST["editarGiro"],
                    "foto" => $ruta
                );

                $respuesta = ModelEmpresas::modelEditarEmpresa($tablaBD, $arrayDatos);
                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "La empresa ha sido modificada de forma correcta",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value)
                            {
                                window.location = "empresas";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                        swal({
                            type: "error",
                            title: "Las variables no puede ir vacías o llevar caracteres especiales ",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value)
                            {
                                window.location = "empresas";
                            }
                        });
                    </script>';
            }
        }
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite eliminar una empresa
    public static function controllerEliminarEmpresa()
    {
        if (isset($_GET["idEmpresa"])) {
            // enviar por parámetros el id de la empresa
            $tablaBD = "empresas";
            $datos = $_GET["idEmpresa"];
            if ($_GET["fotoEmpresa"] != "") {
                // eliminar la foto de la empresa
                unlink($_GET["fotoEmpresa"]);
                // eliminar el directorio de la empresa (debe estar vacío)
                rmdir('view/componentes/images/empresas/' . $_GET["aliasEmpresa"]);
            }
            // petición al modelo para eliminar la empresa
            $respuesta = ModelEmpresas::modelEliminarEmpresa($tablaBD, $datos);
            // verificación de la respuesta del modelo
            if ($respuesta == "ok") {
                echo '<script>
                        swal({
                            type: "success",
                            title: "La empresa ha sido borrada de forma correcta",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value)
                            {
                                window.location = "empresas";
                            }
                        });
                    </script>';
            }
        }
    }
    //___________________________________________________________________________________________________________
}
