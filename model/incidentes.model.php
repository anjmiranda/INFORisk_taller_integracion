<?php

require_once "Conexion.php";

class ModelIncidentes
{
    //___________________________________________________________________________________________________________
    // model método que permite mostrar un incidente/varios incidentes
    public static function modelMostrarIncidentes($tablaBD, $columnaBD, $valorBD)
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
    // model método que permite registrar un incidente
    public static function modelRegistrarIncidente($tablaBD, $arrayDatos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tablaBD(titulo_registro_incidente, tipo_registro_incidente_fk, 
        fecha_registro_incidente, afectado_registro_incidente_fk, prevencionista_registro_incidente_fk, comentarios_registro_incidente) 
        VALUES(:titulo, :tipoIncidente, :fecha, :afectado, :prevencionista, :comentarios)");
        $stmt->bindParam(":titulo", $arrayDatos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":tipoIncidente", $arrayDatos["tipoIncidente"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $arrayDatos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":afectado", $arrayDatos["afectado"], PDO::PARAM_STR);
        $stmt->bindParam(":prevencionista", $arrayDatos["prevencionista"], PDO::PARAM_STR);
        $stmt->bindParam(":comentarios", $arrayDatos["comentarios"], PDO::PARAM_STR);
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

    //___________________________________________________________________________________________________________
    //  model método que permite editar incidente
    public static function modelEditarIncidente($tablaBD, $arrayDatos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tablaBD SET titulo_registro_incidente = :titulo, tipo_registro_incidente_fk = :tipoIncidente,
        fecha_registro_incidente = :fecha, afectado_registro_incidente_fk = :afectado, prevencionista_registro_incidente_fk = :prevencionista,
        comentarios_registro_incidente = :comentarios WHERE id_registro_incidente = :idActual");
        $stmt->bindParam(":titulo", $arrayDatos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":tipoIncidente", $arrayDatos["tipoIncidente"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $arrayDatos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":afectado", $arrayDatos["afectado"], PDO::PARAM_STR);
        $stmt->bindParam(":prevencionista", $arrayDatos["prevencionista"], PDO::PARAM_STR);
        $stmt->bindParam(":comentarios", $arrayDatos["comentarios"], PDO::PARAM_STR);
        $stmt->bindParam(":idActual", $arrayDatos["idActual"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________    
    // model método que permite eliminar incidente
    public static function modelEliminarIncidente($tablaBD, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tablaBD WHERE id_registro_incidente = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
    //___________________________________________________________________________________________________________
}
