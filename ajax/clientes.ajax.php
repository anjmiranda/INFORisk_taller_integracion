<?php

require_once "../controller/clientes.controller.php";
require_once "../model/clientes.model.php";

class AjaxClientes
{
    //_______________________________________________________________________________________________________
    // METODOS AJAX
    //_______________________________________________________________________________________________________
    // AJAX método para editar clientes
    public $idCliente;

    public function ajaxEditarCliente()
    {
        $columnaBD = "id_cliente";
        $valorBD = $this->idCliente;

        $respuesta = ControllerClientes::controllerMostrarClientes($columnaBD, $valorBD);

        echo json_encode($respuesta);
    }
    //_______________________________________________________________________________________________________

    //_______________________________________________________________________________________________________
    // AJAX método para activar o desactivar clientes
    public $activarCliente;
    public $activarId;

    public function ajaxActivarCliente()
    {
        // $tablaBD, $columnaBD, $valorBD
        $tablaBD = "clientes";
        $columnaBD1 = "estado_cliente";
        $valorBD1 = $this->activarCliente;
        $columnaBD2 = "id_cliente";
        $valorBD2 = $this->activarId;

        // no hay retorno para la respuesta
        $respuesta = ModelClientes::modelActualizarCliente($tablaBD, $columnaBD1, $columnaBD2, $valorBD1, $valorBD2);
    }
    //_______________________________________________________________________________________________________

    //_______________________________________________________________________________________________________
    // AJAX metodo para validar alias repetidos
    public $validarCliente;

    public function ajaxValidarCliente()
    {
        $columnaBD = "alias_cliente";
        $valorBD = $this->validarCliente;

        $respuesta = ControllerClientes::controllerMostrarClientes($columnaBD, $valorBD);

        echo json_encode($respuesta);
    }
    //_______________________________________________________________________________________________________
}

//___________________________________________________________________________________________________________
// recibir datos para ejecutar la funcion de editar cliente
if (isset($_POST["idCliente"])) {
    $editar = new AjaxClientes();
    $editar->idCliente = $_POST["idCliente"];
    $editar->ajaxEditarCliente();
}
//___________________________________________________________________________________________________________

//___________________________________________________________________________________________________________
// recibir datos para ejecutar la funcion de activar o desactivar Cliente
if (isset($_POST["activarCliente"])) {
    $activarCliente = new AjaxClientes();
    $activarCliente->activarCliente = $_POST["activarCliente"];
    $activarCliente->activarId = $_POST["activarId"];
    $activarCliente->ajaxActivarCliente();
}
//___________________________________________________________________________________________________________

//___________________________________________________________________________________________________________
// recibir datos para ejecutar la funcion de validar alias repetidos
if (isset($_POST["validarCliente"])) {
    $valCliente = new AjaxClientes();
    $valCliente->validarCliente = $_POST["validarCliente"];
    $valCliente->ajaxValidarCliente();
}
//___________________________________________________________________________________________________________
