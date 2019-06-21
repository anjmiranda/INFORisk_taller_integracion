<?php

class ControllerTiposIncidentes{
    //___________________________________________________________________________________________________________
    // controller método que permite preguntar por tipos incidentes
    public static function controllerMostrarTiposIncidentes($columnaBD, $valorBD){
        // valores para pasarse a la BBDD
        $tablaBD = "tipos_incidentes";
        $respuesta = ModelTiposIncidentes::modelMostrarTiposIncidentes($tablaBD, $columnaBD, $valorBD);
        return $respuesta;
    }
    //___________________________________________________________________________________________________________
}