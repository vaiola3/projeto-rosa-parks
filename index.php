<?php

    error_reporting(E_ALL);

    require_once("app/system/env.php");

    require_once("app/views/View.php");
    require_once("app/views/RegistroView.php");
    require_once("app/views/LoginView.php");

    require_once("app/system/Conexao.php");

    require_once("app/models/Model.php");
    require_once("app/models/RegistroModel.php");

    require_once("app/controllers/Controller.php");
    require_once("app/controllers/LoginController.php");
    require_once("app/controllers/RegistroController.php");

    require_once("app/core/Core.php");

    session_start();
    // $_SESSION = [];
    $core = new Core();
    $ajax = (isset($_GET['RequestFromAjax']) and $_GET['RequestFromAjax'] == 'true');

    if($ajax) {
        $core->trataRequisicao();
    } else {
        $pagina = file_get_contents("app/template/estrutura.html");

        ob_start();
        $core->carregarConteudo($pagina);
        $conteudo = ob_get_contents();
        ob_end_clean();

        $pagina = str_replace("{{CONTENT}}", $conteudo, $pagina);

        echo $pagina;
    }

 ?>