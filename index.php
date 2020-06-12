<?php

  error_reporting(E_ALL);

  require_once('vendor/autoload.php');

  require_once("app/config/Env.php");
  require_once("app/config/Twig.php");
  require_once("app/config/Conexao.php");

  require_once("app/models/Model.php");
  require_once("app/models/LoginModel.php");
  require_once("app/models/RegistroModel.php");
  require_once("app/models/AlunoModel.php");
  require_once("app/models/AdminModel.php");

  require_once("app/controllers/Controller.php");
  require_once("app/controllers/LoginController.php");
  require_once("app/controllers/RegistroController.php");
  require_once("app/controllers/AlunoController.php");
  require_once("app/controllers/ProfessorController.php");
  require_once("app/controllers/AdminController.php");

  require_once("app/core/Core.php");

  session_start();
  // $_SESSION = [];

  $core = new Core();
  $core->carregarConteudo();

 ?>