<?php

require_once "Conexion.php";

class ModelUsuarios{
    //___________________________________________________________________________________________________________
    // model método que permite mostrar un usuario / varios usuarios dependiendo de la consulta
    public static function modelMostrarUsuarios($tablaBD, $columnaBD, $valorBD){
        if($columnaBD != null){
            // si se pasa como argumento $columnaBD con info, quiere decir que la busqueda es a un usuario
            $columna = "";
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaBD WHERE $columnaBD = :$columnaBD");
            $stmt -> bindParam(":".$columnaBD, $valorBD, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }else{
            // si se pasa como argumento $columnaBD nulo, quiere decir que la busqueda es a toda la tabla
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tablaBD");
            $stmt -> execute();
            return $stmt -> fetchall();
        }
        $stmt -> close();
        $stmt = null;
    }
    //___________________________________________________________________________________________________________
}