<?php

    error_reporting(E_ALL);

    require_once("app/views/View.php");
    require_once("app/views/RegistroView.php");

    require_once("app/system/Conexao.php");

    require_once("app/models/Model.php");
    require_once("app/models/RegistroModel.php");

    require_once("app/controllers/LoginController.php");
    require_once("app/controllers/RegistroController.php");

    require_once("app/core/Core.php");

    session_start();
    // $_SESSION = [];

    $htmEstrutura = file_get_contents("app/template/estrutura.html");

    ob_start();

    $objCore = new Core($htmEstrutura);
    $objCore->start();

    $htmCorpo = ob_get_contents();

    ob_end_clean();

    $htmEstrutura = str_replace("{{CONTENT}}", $htmCorpo, $htmEstrutura);

    echo $htmEstrutura;

 ?>