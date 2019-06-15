<?php

require_once "../controller/empresas.controller.php";
require_once "../model/empresas.model.php";

class AjaxEmpresas
{
    //_______________________________________________________________________________________________________
    // METODOS AJAX
    //_______________________________________________________________________________________________________
    public $idEmpresa;

    public function ajaxEditarEmpresa()
    {
        $columnaBD = "id_empresa";
        $valorBD = $this->idEmpresa;

        $respuesta = ControllerEmpresas::controllerMostrarEmpresas($columnaBD, $valorBD);

        echo json_encode($respuesta);
    }
    //_______________________________________________________________________________________________________

    //_______________________________________________________________________________________________________
    // AJAX metodo para validar alias repetidos
    public $validarEmpresa;

    public function ajaxValidarEmpresa()
    {
        $columnaBD = "alias_empresa";
        $valorBD = $this->validarEmpresa;

        $respuesta = ControllerEmpresas::controllerMostrarEmpresas($columnaBD, $valorBD);

        echo json_encode($respuesta);
    }
    //_______________________________________________________________________________________________________
}
//___________________________________________________________________________________________________________

//___________________________________________________________________________________________________________
// recibir datos para ejecutar la funcion de editar empresa
if (isset($_POST["idEmpresa"])) {
    $editar = new AjaxEmpresas();
    $editar->idEmpresa = $_POST["idEmpresa"];
    $editar->ajaxEditarEmpresa();
}
//___________________________________________________________________________________________________________

//___________________________________________________________________________________________________________
// recibir datos para ejecutar la funcion de validar alias repetidos
if (isset($_POST["validarEmpresa"])) {
    $valEmpresa = new AjaxEmpresas();
    $valEmpresa->validarEmpresa = $_POST["validarEmpresa"];
    $valEmpresa->ajaxValidarEmpresa();
}
//___________________________________________________________________________________________________________
