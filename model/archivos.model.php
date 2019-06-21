<?php

require_once "Conexion.php";

class ModelArchivos
{
    //___________________________________________________________________________________________________________
    // model método que permite mostrar registros de archivos
    public static function modelMostrarRegArchivos($tablaBD, $columnaBD, $valorBD)
    {
        // en este caso siempre el select será en función de los 8 tipos de archivos del usuario
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaBD WHERE $columnaBD = $valorBD");
        $stmt->execute();
        return $stmt->fetchall();
        $stmt->close();
        $stmt = null;
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // model método que permite crear los 8 registros correspondientes a cada usuario
    public static function modelCrearRegArchivos($tablaBD, $idNombreFk, $estado, $fecha, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tablaBD(id_tipo_archivo_fk, id_usuario_asignado_fk, estado_asignacion,
         fecha_asignacion) VALUES
         ($a1, :idNombreFk, :estado, :fecha),
         ($a2, :idNombreFk, :estado, :fecha),
         ($a3, :idNombreFk, :estado, :fecha),
         ($a4, :idNombreFk, :estado, :fecha),
         ($a5, :idNombreFk, :estado, :fecha),
         ($a6, :idNombreFk, :estado, :fecha),
         ($a7, :idNombreFk, :estado, :fecha),
         ($a8, :idNombreFk, :estado, :fecha)");
        $stmt->bindParam(":idNombreFk", $idNombreFk, PDO::PARAM_STR);
        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
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
    //  model método que permite editar un archivo
    public static function modelEditarRegArchivo($tablaBD, $arrayDatos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tablaBD SET estado_asignacion = :estado, 
        ubicacion_archivo = :ubicacion, fecha_asignacion = :fecha WHERE id_registro = :idRegistro");
        $stmt->bindParam(":estado", $arrayDatos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":ubicacion", $arrayDatos["ubicacion"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $arrayDatos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":idRegistro", $arrayDatos["idRegistro"], PDO::PARAM_STR);

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
