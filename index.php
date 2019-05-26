<?php

// controladores
require_once "controller/index.controller.php";
require_once "controller/usuarios.controller.php";

// modelos
require_once "model/usuarios.model.php";

$index = new ControllerIndex();
$index -> controllerCrearIndex();