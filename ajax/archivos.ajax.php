<?php

require_once "../controller/archivos.controller.php";
require_once "../model/archivos.model.php";

class AjaxArchivos
{
    //_______________________________________________________________________________________________________
    // METODOS AJAX
    //_______________________________________________________________________________________________________
    // AJAX método consultar todos los registros
    public $idUsuario;

    public function ajaxConsultarRegistros()
    {
        $columnaBD = "id_usuario_asignado_fk";
        $valorBD = $this->idUsuario;

        $respuesta = ControllerArchivos::controllerMostrarRegArchivos($columnaBD, $valorBD);

        echo json_encode($respuesta);
    }
    //_______________________________________________________________________________________________________

}
//___________________________________________________________________________________________________________
// recibir datos para ejecutar la funcion de consultar archivos
if (isset($_POST["idUsuario"])) {
    $RegUsuario = new AjaxArchivos();
    $RegUsuario->idUsuario = $_POST["idUsuario"];
    $RegUsuario->ajaxConsultarRegistros();
}
//___________________________________________________________________________________________________________
