<?php

require_once "../controller/usuarios.controller.php";
require_once "../model/usuarios.model.php";

class AjaxUsuarios
{
    //_______________________________________________________________________________________________________
    // METODOS AJAX
    //_______________________________________________________________________________________________________
    public $idUsuario;

    public function ajaxEditarUsuario()
    {
        $columnaBD = "id_usuario";
        $valorBD = $this->idUsuario;

        $respuesta = ControllerUsuarios::controllerMostrarUsuarios($columnaBD, $valorBD);

        echo json_encode($respuesta);
    }
    //_______________________________________________________________________________________________________

    //_______________________________________________________________________________________________________
    // AJAX método para activar o desactivar usuario
    public $activarUsuario;
    public $activarId;

    public function ajaxActivarUsuario()
    {
        // $tablaBD, $columnaBD, $valorBD
        $tablaBD = "usuarios";
        $columnaBD1 = "estado_usuario";
        $valorBD1 = $this->activarUsuario;
        $columnaBD2 = "id_usuario";
        $valorBD2 = $this->activarId;

        $respuesta = ModelUsuarios::modelActualizarUsuario($tablaBD, $columnaBD1, $columnaBD2, $valorBD1, $valorBD2);
    }
    //_______________________________________________________________________________________________________

    //_______________________________________________________________________________________________________
    // AJAX metodo para validar nombres repetidos
    public $validarUsuario;

    public function ajaxValidarUsuario()
    {
        $columnaBD = "alias_usuario";
        $valorBD = $this->validarUsuario;

        $respuesta = ControllerUsuarios::controllerMostrarUsuarios($columnaBD, $valorBD);

        echo json_encode($respuesta);
    }
    //_______________________________________________________________________________________________________
}
//___________________________________________________________________________________________________________

//___________________________________________________________________________________________________________
// recibir datos para ejecutar la funcion de editar usuario
if (isset($_POST["idUsuario"])) {
    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarUsuario();
}
//___________________________________________________________________________________________________________

//___________________________________________________________________________________________________________
// recibir datos para ejecutar la funcion de activar o desactivar usuario
if (isset($_POST["activarUsuario"])) {
    $activarUsuario = new AjaxUsuarios();
    $activarUsuario->activarUsuario = $_POST["activarUsuario"];
    $activarUsuario->activarId = $_POST["activarId"];
    $activarUsuario->ajaxActivarUsuario();
}
//___________________________________________________________________________________________________________

//___________________________________________________________________________________________________________
// recibir datos para ejecutar la funcion de validar nombres repetidos
if (isset($_POST["validarUsuario"])) {
    $valUsuario = new AjaxUsuarios();
    $valUsuario->validarUsuario = $_POST["validarUsuario"];
    $valUsuario->ajaxValidarUsuario();
}
//___________________________________________________________________________________________________________
