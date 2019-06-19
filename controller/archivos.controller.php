<?php

require "model/tiposarchivos.model.php";

class ControllerArchivos{
    //___________________________________________________________________________________________________________
    // controller método que permite crear registros de archivos
    public static function controllerCrearRegArchivos($idUsuario, $horaCreacion){
        // se llaman a los tipos de arhcivos almacenados en la BBDD
        $tablaBD = "tipos_archivos";
        $columnaBD = null;
        $valorBD = null;
        // obtener los tipos de archivos 
        $tiposArchivos = ModelTiposArchivos::modelMostrarTiposArchivos($tablaBD, $columnaBD, $valorBD);
        return $tiposArchivos;

        // foreach para crear 8 registros de usuarios
        foreach($archivos as $key => $archivo){

        }
    }
    //___________________________________________________________________________________________________________
}