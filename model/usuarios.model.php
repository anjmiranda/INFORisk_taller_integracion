<?php

require_once "Conexion.php";

class ModelUsuarios{
    //___________________________________________________________________________________________________________
    // model método que permite mostrar un usuario / varios usuarios dependiendo de la consulta
    public static function modelMostrarUsuarios($tablaBD, $columnaBD, $valorBD){
        if($columnaBD != null){
            $columna = "";
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaBD WHERE $columnaBD = :$columnaBD");
            $stmt -> bindParam(":".$columnaBD, $valorBD, PDO::PARAM_STR);
            $stmt -> execute();
            // fech trae un solo registro
            return $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tablaBD");
            $stmt -> execute();
            // fetchall trae todos los registros
            return $stmt -> fetchall();
        }
        $stmt -> close();
        $stmt = null;
    }
    //___________________________________________________________________________________________________________
}