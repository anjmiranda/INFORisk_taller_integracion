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
        $a1 = $arch[0]["id_archivo"]; $a2 = $arch[1]["id_archivo"]; 
        $a3 = $arch[2]["id_archivo"]; $a4 = $arch[3]["id_archivo"];
        $a5 = $arch[4]["id_archivo"]; $a6 = $arch[5]["id_archivo"];
        $a7 = $arch[6]["id_archivo"]; $a8 = $arch[7]["id_archivo"];
        $tablaBD = "registro_archivos";

        // llamado al model de archivos para ejecutar las consultas
        $regArchivos = ModelArchivos::modelCrearRegArchivos($tablaBD, $idUsuario, $estado, $fechaCreacion, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8);
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
