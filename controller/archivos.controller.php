<?php

class ControllerArchivos
{
    //___________________________________________________________________________________________________________
    // controller método que permite mostrar un archivo/varios archivos
    public static function controllerMostrarRegArchivos($columnaBD, $valorBD)
    {
        $tablaBD = "registro_archivos";
        $respuesta = ModelArchivos::modelMostrarRegArchivos($tablaBD, $columnaBD, $valorBD);
        return $respuesta;
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite crear registros de archivos
    public static function controllerCrearRegArchivos($idUsuario, $fechaCreacion)
    {
        // se llaman a los tipos de arhcivos almacenados en la BBDD
        $tablaBD = "tipos_archivos";
        $columnaBD = null;
        $valorBD = null;
        $estado = 0;

        // obtener los tipos de archivos disponibles (si se modifica debe tmb hacerlo la consulta SQL)
        $arch = ModelTiposArchivos::modelMostrarTiposArchivos($tablaBD, $columnaBD, $valorBD);

        // valores de los ID de archivos
        $a1 = $arch[0]["id_archivo"];
        $a2 = $arch[1]["id_archivo"];
        $a3 = $arch[2]["id_archivo"];
        $a4 = $arch[3]["id_archivo"];
        $a5 = $arch[4]["id_archivo"];
        $a6 = $arch[5]["id_archivo"];
        $a7 = $arch[6]["id_archivo"];
        $a8 = $arch[7]["id_archivo"];
        $tablaBD = "registro_archivos";

        // llamado al model de archivos para ejecutar las consultas
        $regArchivos = ModelArchivos::modelCrearRegArchivos($tablaBD, $idUsuario, $estado, $fechaCreacion, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8);
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite registrar un archivo
    public static function controllerRegistrarArchivo()
    {
        if (isset($_FILES["registrarArchivo"]["tmp_name"])) {
            $tablaBD = "registro_archivos";
            $idUsuario = $_POST["upld_usuario"];
            $idArchivo = $_POST["upld_archivo"];
            $idRegistro = $_POST["upld_registro"];
            $nombreArchivo;

            // verificacion de los archivos por id del archivo
            if ($idArchivo == "0") {
                $nombreArchivo = "contrato_trabajo.pdf";
            } else if ($nombreArchivo == "1") {
                $nombreArchivo = "entrega_epps.pdf";
            } else if ($nombreArchivo == "2") {
                $nombreArchivo = "examenes_psicosentotecnicos.pdf";
            } else if ($nombreArchivo == "3") {
                $nombreArchivo = "procedimientos_trabajos.pdf";
            } else if ($nombreArchivo == "4") {
                $nombreArchivo = "examen_ocupacional.pdf";
            } else if ($nombreArchivo == "5") {
                $nombreArchivo = "reglamento_interno.pdf";
            } else if ($nombreArchivo == "6") {
                $nombreArchivo = "derecho_saber.pdf";
            } else if ($nombreArchivo == "7") {
                $nombreArchivo = "hojavida_conductor.pdf";
            };

            // evaluación del peso del archivo
            if ($_FILES["registrarArchivo"]["size"] < 20000000) {

                // evaluación de la extesión [PDF]
                if ($_FILES["registrarArchivo"]["type"] == "application/pdf") {

                    // obtener el alias del usuario para crear directorio 
                    $columnaBD = "id_usuario";
                    $valorBD = $idUsuario;
                    $respuesta = ControllerUsuarios::controllerMostrarUsuarios($columnaBD, $valorBD);

                    // creacion del directorio
                    mkdir("files/archivos/archivos_" . $respuesta["alias_usuario"] . "");

                    // ruta para guardar el archivo en la carpeta, no sirve para guardar en la BBDD
                    $rutaArchivo = "files/archivos/archivos_" . $respuesta["alias_usuario"] . "/" . $nombreArchivo;
                    move_uploaded_file($_FILES["registrarArchivo"]["tmp_name"], $rutaArchivo);

                    // array con datos de modificacion
                    $arrayDatos = array(
                        "estado" => "1",
                        "ubicacion" => $rutaArchivo,
                        "fecha" => ControllerArchivos::toolsObtenerHora(),
                        "idRegistro" => $_POST["upld_registro"]
                    );
                    $tablaBD = "registro_archivos";

                    $respuesta = ModelArchivos::modelEditarRegArchivo($tablaBD, $arrayDatos);

                    if ($respuesta == "ok") {
                        echo '<script>
                                swal({
                                    type: "success",
                                    title: "El archivo ha sido subido de forma correcta",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
                                }).then((result)=>{
                                    if(result.value)
                                    {
                                        window.location = "archivos";
                                    }
                                });
                            </script>';

                        // tiempo registro de la subida        
                        date_default_timezone_set('America/Santiago');
                        $fecha = date('Y-m-d');
                        $hora = date('H:i:s');
                        $fechaCreacionProReg = $fecha . " " . $hora;

                        // crear registro de la subida
                        $tablaBDReg = "registro_data";
                        $proyectoDataReg = $_SESSION["proyecto"]["id_proyecto"];
                        $usuarioDataReg = $_SESSION["id"];
                        $tipoInputDataReg = "subirArchivo";
                        $infoDataReg = "subió el archivo " . $_POST["upld_tipoArchivo"] . ".pdf" . " de forma correcta";
                        $tipoUsuario = $_SESSION["perfil"];

                        $respuesta = ModelProyecto::modelCrearRegistroData($tablaBDReg, $proyectoDataReg, $usuarioDataReg, $tipoInputDataReg, $infoDataReg, $fechaCreacionProReg, $tipoUsuario);
                    } else {
                        echo '<script>
                                swal({
                                        title: "Error!",
                                        text: "Por favor revise nuevamente los datos",
                                        type: "error",
                                        confirmButtonText: "cerrar"
                                    });
                            </script>';
                    }
                } else {
                    echo '<script>
                            swal({
                                    title: "Error al agregar el archivo",
                                    text: "Revise que tipo de extensión es y vuelva a subirlo",
                                    type: "error",
                                    confirmButtonText: "cerrar"
                                });
                            </script>';
                }
            } else {
                echo '<script>
                    swal({
                            title: "Error al agregar el archivo",
                            text: "El archivo no puede pesar mas de 20 mb.",
                            type: "error",
                            confirmButtonText: "cerrar"
                        });
                    </script>';
            }
        }
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // controller método que permite registrar un archivo
    public static function controllerEditarArchivo()
    {
        if (isset($_FILES["editarArchivo"]["tmp_name"])) {
            $tablaBD = "registro_archivos";
            $idUsuario = $_POST["edit_usuario"];
            $idArchivo = $_POST["edit_archivo"];
            $idRegistro = $_POST["edit_registro"];
            $nombreArchivo;

            // verificacion de los archivos por id del archivo
            if ($idArchivo == "0") {
                $nombreArchivo = "contrato_trabajo.pdf";
            } else if ($nombreArchivo == "1") {
                $nombreArchivo = "entrega_epps.pdf";
            } else if ($nombreArchivo == "2") {
                $nombreArchivo = "examenes_psicosentotecnicos.pdf";
            } else if ($nombreArchivo == "3") {
                $nombreArchivo = "procedimientos_trabajos.pdf";
            } else if ($nombreArchivo == "4") {
                $nombreArchivo = "examen_ocupacional.pdf";
            } else if ($nombreArchivo == "5") {
                $nombreArchivo = "reglamento_interno.pdf";
            } else if ($nombreArchivo == "6") {
                $nombreArchivo = "derecho_saber.pdf";
            } else if ($nombreArchivo == "7") {
                $nombreArchivo = "hojavida_conductor.pdf";
            };

            // evaluación del peso del archivo
            if ($_FILES["editarArchivo"]["size"] < 20000000) {

                // evaluación de la extesión [PDF]
                if ($_FILES["editarArchivo"]["type"] == "application/pdf") {

                    // obtener el alias del usuario para modificar archivos en directorios
                    $columnaBD = "id_usuario";
                    $valorBD = $idUsuario;
                    $respuesta = ControllerUsuarios::controllerMostrarUsuarios($columnaBD, $valorBD);
                    
                    // eliminar el archivo anterior
                    unlink("files/archivos/archivos_" . $respuesta["alias_usuario"] . "/" . $nombreArchivo);

                    // ruta para guardar el archivo en la carpeta, no sirve para guardar en la BBDD
                    $rutaArchivo = "files/archivos/archivos_" . $respuesta["alias_usuario"] . "/" . $nombreArchivo;
                    move_uploaded_file($_FILES["editarArchivo"]["tmp_name"], $rutaArchivo);

                    // array con datos de modificacion
                    $arrayDatos = array(
                        "estado" => "1",
                        "ubicacion" => $rutaArchivo,
                        "fecha" => ControllerArchivos::toolsObtenerHora(),
                        "idRegistro" => $_POST["edit_registro"]
                    );
                    $tablaBD = "registro_archivos";

                    $respuesta = ModelArchivos::modelEditarRegArchivo($tablaBD, $arrayDatos);

                    if ($respuesta == "ok") {
                        echo '<script>
                                swal({
                                    type: "success",
                                    title: "El archivo ha sido modificado de forma correcta",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
                                }).then((result)=>{
                                    if(result.value)
                                    {
                                        window.location = "archivos";
                                    }
                                });
                            </script>';
                    } else {
                        echo '<script>
                                swal({
                                        title: "Error!",
                                        text: "Hubo un error al editar el archivo.",
                                        type: "error",
                                        confirmButtonText: "cerrar"
                                    });
                            </script>';
                    }
                } else {
                    echo '<script>
                            swal({
                                    title: "Error al agregar el archivo",
                                    text: "Revise que tipo de extensión es y vuelva a subirlo",
                                    type: "error",
                                    confirmButtonText: "cerrar"
                                });
                            </script>';
                }
            } else {
                echo '<script>
                    swal({
                            title: "Error al agregar el archivo",
                            text: "El archivo no puede pesar mas de 20 mb.",
                            type: "error",
                            confirmButtonText: "cerrar"
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
