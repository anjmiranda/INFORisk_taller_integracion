<?php

// controladores
require_once "controller/index.controller.php";
require_once "controller/usuarios.controller.php";
require_once "controller/empresas.controller.php";
require_once "controller/clientes.controller.php";
require_once "controller/rolesusuario.controller.php";

// modelos
require_once "model/usuarios.model.php";
require_once "model/empresas.model.php";
require_once "model/clientes.model.php";
require_once "model/rolesusuarios.model.php";

$index = new ControllerIndex();
$index -> controllerCrearIndex();