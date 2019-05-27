<?php

class ControllerRolesUsuario{
    //___________________________________________________________________________________________________________
    // controller método que permite preguntar por los roles de usuario
    public static function controllerMostrarRolesUsuario($columnaBD, $valorBD){
        // valores para pasarse a la BBDD
        $tablaBD = "roles_usuario";
        $respuesta = ModelRolesUsuario::modelMostrarRolesUsuario($tablaBD, $columnaBD, $valorBD);
        return $respuesta;
    }
}