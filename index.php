<?php

use RosaParks\Core\Main;

require_once __DIR__ . "/vendor/autoload.php";

$di_utils = [
    "twig"      => RosaParks\Config\Twig::getInstancia(),
];

$di_models = [
    "login"     => new RosaParks\Models\LoginModel,
    "registro"  => new RosaParks\Models\RegistroModel,
    "admin"     => new RosaParks\Models\AdminModel,
];

$di_controllers = [
    "login"     => new RosaParks\Controllers\LoginController($di_models, $di_utils),
    "registro"  => new RosaParks\Controllers\RegistroController($di_models, $di_utils),
    "admin"     => new RosaParks\Controllers\AdminController($di_models, $di_utils),
    "professor" => new RosaParks\Controllers\ProfessorController($di_models, $di_utils)
];

Main::carregarConteudo($di_controllers);

?>