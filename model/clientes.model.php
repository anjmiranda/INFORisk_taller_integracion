<?php

require_once "Conexion.php";

class ModelClientes{
    //___________________________________________________________________________________________________________
    // model método que permite mostrar un cliente / varios clientes dependiendo de la consulta
    public static function modelMostrarClientes(){
        // código...
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
    public static function modelEditarCliente(){
        // código...
    }
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // model método que pernite eliminar un cliente
    public static function modelEliminarCliente(){
        // código...
    }
    //___________________________________________________________________________________________________________
}