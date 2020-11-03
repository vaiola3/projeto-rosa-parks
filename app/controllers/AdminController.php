<?php

namespace RosaParks\Controllers;

use RosaParks\Config\Env;

class AdminController extends Controller {
    public function __construct($di_models, $di_utils) {
        $model_admin = $di_models["admin"];
        $twig = $di_utils["twig"];
        
        $this->setModel($model_admin);
        $this->setTwig($twig);
    }
    
    public function start() {
        $this->imprimirTela();
    }
    
    public function imprimirTela() {
        $model = $this->getModel();
        
        $nomes = explode(' ', $_SESSION['nome']);
        $primeiro_nome = $nomes[0];
        
        $args = [
            'API_USER'          => Env::get('API_USER'),
            'API_PASS'          => Env::get('API_PASS'),
            'urlHost'           => Env::get('APP_HOST'),
            'NOME_USUARIO'      => $primeiro_nome,
            'iconeLogout' 	    => 'out',
            'mensagemLogout'    => 'Sair'
        ];
        
        $this->imprimirConteudo('adminView.html.twig', $args);
    }
}

?>