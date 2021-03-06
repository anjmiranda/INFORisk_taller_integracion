<?php

require_once "Conexion.php";

class ModelClientes
{
    //___________________________________________________________________________________________________________
    // model método que permite mostrar un cliente / varios clientes dependiendo de la consulta
    public static function modelMostrarClientes($tablaBD, $columnaBD, $valorBD)
    {
        if ($columnaBD != null) {
            // si se pasa como argumento $columnaBD con info, quiere decir que la busqueda es a un cliente
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
    // model método que pernite registrar un cliente
    public static function modelRegistrarCliente($tablaBD, $arrayDatos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tablaBD(nombre_cliente, alias_cliente, email_cliente, empresa_cliente_fk, 
        telefono_cliente, foto_cliente, estado_cliente) VALUES(:nombre, :alias, :email, :empresa, :telefono, :foto, :estado)");
        $stmt->bindParam(":nombre", $arrayDatos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":alias", $arrayDatos["alias"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $arrayDatos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":empresa", $arrayDatos["empresa"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $arrayDatos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $arrayDatos["foto"], PDO::PARAM_STR);
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

    //___________________________________________________________________________________________________________
    // model método que pernite editar un cliente
    public static function modelEditarCliente($tablaBD, $arrayDatos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tablaBD SET nombre_cliente = :nombre, email_cliente = :email, 
        empresa_cliente_fk = :empresa, telefono_cliente = :telefono, foto_cliente = :foto WHERE alias_cliente = :alias");
        $stmt->bindParam(":nombre", $arrayDatos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $arrayDatos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":empresa", $arrayDatos["empresa"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $arrayDatos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $arrayDatos["foto"], PDO::PARAM_STR);
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
    // model método que pernite eliminar un cliente
    public static function modelEliminarCliente($tablaBD, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tablaBD WHERE id_cliente = :id");
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
    // model método que pernite activar/desactivar un cliente
    public static function modelActualizarCliente($tablaBD, $columnaBD1, $columnaBD2, $valorBD1, $valorBD2)
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
