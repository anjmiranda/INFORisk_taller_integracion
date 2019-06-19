<?php

class ControllerTiposArchivos{
    //___________________________________________________________________________________________________________
    // controller método que permite preguntar por tipos de archivos
    public static function controllerMostrarTiposArchivos($columnaBD, $valorBD){
        // valores para pasarse a la BBDD
        $tablaBD = "tipos_archivos";
        $respuesta = ModelTiposArchivos::modelMostrarTiposArchivos($tablaBD, $columnaBD, $valorBD);
        return $respuesta;
    }
    //___________________________________________________________________________________________________________
}