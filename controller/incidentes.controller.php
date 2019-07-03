<?php

class ControllerIncidentes
{
    //___________________________________________________________________________________________________________
    // controller método que permite mostrar un incidente/varios incidentes
    public static function controllerMostrarIncidentes($columnaBD, $valorBD)
    {
        $tablaBD = "registro_incidentes";
        $respuesta = ModelIncidentes::modelMostrarIncidentes($tablaBD, $columnaBD, $valorBD);
        return $respuesta;
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite ingresar incidente
    public static function controllerRegistrarIncidente()
    {
        if (isset($_POST["nuevoTitulo"])) {
            // expreg para validar 
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTitulo"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoComentario"])
            ) {
                $tablaBD = "registro_incidentes";
                // array de datos: debe incluir rut, nombre, alias, direccion, giro y foto de empresa
                $arrayDatos = array(
                    "titulo" => $_POST["nuevoTitulo"],
                    "tipoIncidente" => $_POST["nuevoTipoIncidente"],
                    "fecha" => ControllerArchivos::toolsObtenerHora(),
                    "afectado" => $_POST["nuevoAfectado"],
                    "prevencionista" => $_SESSION["id"],
                    "comentarios" => $_POST["nuevoComentario"]
                );
                // envío de información al modelo
                $respuesta = ModelIncidentes::modelRegistrarIncidente($tablaBD, $arrayDatos);

                // si viene una respuesta "ok" del modelo, quiere decir que se agregó los datos
                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "El incidente ha sido ingresado de forma correcta",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value)
                            {
                                window.location = "accidentes";
                            }
                        });
                    </script>';
                }else {
                    echo '<script>
                        swal({
                                title: "Error al ingresar el nuevo incidente",
                                text: "Revise bien y vuelva a ingresar los datos.",
                                type: "error",
                                confirmButtonText: "cerrar"
                            });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                            title: "Error al ingresar el nuevo incidente",
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
    public static function controllerEditarIncidente()
    {
        if (isset($_POST["editarTitulo"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTitulo"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarComentario"])
            ) {
                // tabla de la BBDD
                $tablaBD = "registro_incidentes";
                // array de datos: debe incluir rut, nombre, alias, direccion, giro y foto de empresa
                $arrayDatos = array(
                    "titulo" => $_POST["editarTitulo"],
                    "tipoIncidente" => $_POST["editarTipoIncidente"],
                    "fecha" => ControllerArchivos::toolsObtenerHora(),
                    "afectado" => $_POST["editarAfectado"],
                    "prevencionista" => $_SESSION["id"],
                    "comentarios" => $_POST["editarComentario"],
                    "idActual" => $_POST["idActual"]
                );

                $respuesta = ModelIncidentes::modelEditarIncidente($tablaBD, $arrayDatos);
                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "El incidente ha sido modificada de forma correcta",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value)
                            {
                                window.location = "accidentes";
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
                                window.location = "accidentes";
                            }
                        });
                    </script>';
            }
        }
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite eliminar un incidente
    public static function controllerEliminarIncidente()
    {
        if (isset($_GET["idIncidente"])) {
            // enviar por parámetros el id de la empresa
            $tablaBD = "registro_incidentes";
            $datos = $_GET["idIncidente"];

            // petición al modelo para eliminar el incidente
            $respuesta = ModelIncidentes::modelEliminarIncidente($tablaBD, $datos);
            // verificación de la respuesta del modelo
            if ($respuesta == "ok") {
                echo '<script>
                        swal({
                            type: "success",
                            title: "El incidente ha sido borrado de forma correcta",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value)
                            {
                                window.location = "accidentes";
                            }
                        });
                    </script>';
            }
        }
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // metodo para obtener hora
    public static function toolsObtenerHora()
    {
        // Herramienta obtener zona horaria
        date_default_timezone_set('America/Santiago');

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $fechaActual = $fecha . " " . $hora;
        return $fechaActual;
    }
    //___________________________________________________________________________________________________________
}
