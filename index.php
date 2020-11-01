<?php

  error_reporting(E_ALL);

  use RosaParks\Core\Main;

  require_once __DIR__ . "/vendor/autoload.php";

  session_start();
  // $_SESSION = [];

  $main = new Main();
  $main->carregarConteudo();

 ?>