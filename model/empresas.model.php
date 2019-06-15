<?php

require_once "Conexion.php";

class ModelEmpresas
{
    //___________________________________________________________________________________________________________
    // model método que permite mostrar un usuario / varios usuarios dependiendo de la consulta
    public static function modelMostrarEmpresas($tablaBD, $columnaBD, $valorBD)
    {
        if ($columnaBD != null) {
            // si se pasa como argumento $columnaBD con info, quiere decir que la busqueda es a una empresa
            $columna = "";
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaBD WHERE $columnaBD = :$columnaBD");
            $stmt->bindParam(":" . $columnaBD, $valorBD, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            // si se pasa como argumento $columnaBD nulo, quiere decir que la busqueda es a toda la tabla
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaBD");
            $stmt->execute();
            return $stmt->fetchall();
        }
        $stmt->close();
        $stmt = null;
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // model método que permite registrar una empresa
    public static function modelRegistrarEmpresa($tablaBD, $arrayDatos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tablaBD(rut_empresa, nombre_empresa, alias_empresa, 
        direccion_empresa, giro_empresa, foto_empresa) VALUES(:rut, :nombre, :alias, :direccion, :giro, :foto)");
        $stmt->bindParam(":rut", $arrayDatos["rut"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $arrayDatos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":alias", $arrayDatos["alias"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $arrayDatos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":giro", $arrayDatos["giro"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $arrayDatos["foto"], PDO::PARAM_STR);
        $mensaje = "";
        if ($stmt->execute()) {
            $mensaje = "ok";
        } else {
            $mensaje = "error";
        }
        return $mensaje;
        $stmt->close();
        $stmt = null;
    }
    //___________________________________________________________________________________________________________
}
