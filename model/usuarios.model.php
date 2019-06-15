<?php

require_once "Conexion.php";

class ModelUsuarios
{
    //___________________________________________________________________________________________________________
    // model método que permite mostrar un usuario / varios usuarios dependiendo de la consulta
    public static function modelMostrarUsuarios($tablaBD, $columnaBD, $valorBD)
    {
        if ($columnaBD != null) {
            // si se pasa como argumento $columnaBD con info, quiere decir que la busqueda es a un usuario
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
    // model método que pernite registrar un usuario
    public static function modelRegistrarUsuario($tablaBD, $arrayDatos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tablaBD(nombre_usuario, alias_usuario, password_usuario, rol_usuario_fk, foto_usuario) 
            VALUES(:nombre, :alias, :pass, :rol, :ruta)");
        $stmt->bindParam(":nombre", $arrayDatos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":alias", $arrayDatos["alias"], PDO::PARAM_STR);
        $stmt->bindParam(":pass", $arrayDatos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $arrayDatos["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $arrayDatos["ruta"], PDO::PARAM_STR);
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
    //  model método que permite editar usuarios
    public static function modelEditarUsuarios($tablaBD, $arrayDatos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tablaBD SET nombre_usuario = :nombre, password_usuario = :pass, 
        rol_usuario_fk = :rol, foto_usuario = :ruta WHERE alias_usuario = :alias");
        $stmt->bindParam(":nombre", $arrayDatos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":pass", $arrayDatos["pass"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $arrayDatos["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $arrayDatos["ruta"], PDO::PARAM_STR);
        $stmt->bindParam(":alias", $arrayDatos["alias"], PDO::PARAM_STR);

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
    // model método que permite eliminar usuario
    public static function modelEliminarUsuario($tablaBD, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tablaBD WHERE id_usuario = :id");
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

    //___________________________________________________________________________________________________________
    // model método que permite actualizar estado activo/desactivo y último login
    public static function modelActualizarUsuario($tablaBD, $columnaBD1, $columnaBD2, $valorBD1, $valorBD2)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tablaBD SET $columnaBD1 = :$columnaBD1 WHERE $columnaBD2 = :$columnaBD2");
        $stmt->bindParam(":" . $columnaBD1, $valorBD1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $columnaBD2, $valorBD2, PDO::PARAM_STR);

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
