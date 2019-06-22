<?php

require_once "../controller/incidentes.controller.php";
require_once "../model/incidentes.model.php";

class AjaxIncidentes
{
    //_______________________________________________________________________________________________________
    // METODOS AJAX
    //_______________________________________________________________________________________________________
    public $idIncidente;

    public function ajaxEditarIncidente()
    {
        $columnaBD = "id_registro_incidente";
        $valorBD = $this->idIncidente;

        $respuesta = ControllerIncidentes::controllerMostrarIncidentes($columnaBD, $valorBD);

        echo json_encode($respuesta);
    }
    //_______________________________________________________________________________________________________
}
//___________________________________________________________________________________________________________

//___________________________________________________________________________________________________________
// recibir datos para ejecutar la funcion de editar incidente
if (isset($_POST["idIncidente"])) {
    $editar = new AjaxIncidentes();
    $editar->idIncidente = $_POST["idIncidente"];
    $editar->ajaxEditarIncidente();
}
//___________________________________________________________________________________________________________
