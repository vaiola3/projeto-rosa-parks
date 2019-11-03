<?php

    require('app/core/core.php');
    require('app/controller/HomeController.php');
    require('app/controller/RegisterController.php');
    require('app/controller/ErrorController.php');

    $template = file_get_contents('app/template/estrutura.html');

    ob_start(); //  begin
        $core = new Core;
        $core->start( $_GET );

        $saida = ob_get_contents();
    ob_clean(); //  end

    $readyTemplate = str_replace( '{{CONTENT}}', $saida, $template );

    echo $readyTemplate;