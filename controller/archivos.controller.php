<?php

class ControllerArchivos{
    //___________________________________________________________________________________________________________
    // controller método que permite crear registros de archivos
    public static function controllerCrearRegArchivos($idUsuario){
        // valores para modelo
        $tablaBD = "registro_archivos";
        $valorBD = $idUsuario;

        // tomar la hora de creación de registro
        date_default_timezone_set('America/Santiago');

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $fechaActual = $fecha . " " . $hora;

        $respuesta = ModelArchivos::modelCrearRegArchivos($tablaBD, $valorBD, $fechaActual);
    }
    //___________________________________________________________________________________________________________
}