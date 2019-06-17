<?php

require_once "Conexion.php";

class ModelArchivos
{
    //___________________________________________________________________________________________________________
    // model método que permite mostrar un usuario / varios usuarios dependiendo de la consulta
    public static function modelCrearRegArchivos($tablaBD, $valorBD, $fechaActual)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tablaBD(id_usuario_asignado_fk, fecha_asignacion) 
        VALUES(:usuario, :fecha)");
        $stmt->bindParam(":nombre", $arrayDatos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":alias", $arrayDatos["alias"], PDO::PARAM_STR);
        $stmt->bindParam(":pass", $arrayDatos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $arrayDatos["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $arrayDatos["ruta"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $arrayDatos["estado"], PDO::PARAM_STR);
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
