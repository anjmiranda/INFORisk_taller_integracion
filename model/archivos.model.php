<?php

require_once "Conexion.php";

class ModelArchivos
{
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
}
