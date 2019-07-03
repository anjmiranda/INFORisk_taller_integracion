<?php

// controladores
require_once "controller/index.controller.php";
require_once "controller/usuarios.controller.php";
require_once "controller/empresas.controller.php";
require_once "controller/clientes.controller.php";
require_once "controller/archivos.controller.php";
require_once "controller/rolesusuario.controller.php";
require_once "controller/tiposincidentes.controller.php";
require_once "controller/incidentes.controller.php";
require_once "controller/tiposarchivos.controller.php";

// modelos
require_once "model/usuarios.model.php";
require_once "model/empresas.model.php";
require_once "model/clientes.model.php";
require_once "model/archivos.model.php";
require_once "model/rolesusuarios.model.php";
require_once "model/tiposincidentes.model.php";
require_once "model/incidentes.model.php";
require_once "model/tiposarchivos.model.php";

$index = new ControllerIndex();
$index -> controllerCrearIndex();