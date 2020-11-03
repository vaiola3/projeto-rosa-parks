<?php

namespace RosaParks\Controllers;


class ProfessorController extends Controller {
    public function __construct($di_models, $di_utils) {
        $model_professor = $di_models["login"];
        $twig = $di_utils["twig"];
        
        $this->setModel($model_professor);
        $this->setTwig($twig);
    }
    
    public function start() {
        $this->imprimirTela();
    }
    
    public function imprimirTela() {
        $model = $this->getModel();
        
        $args = [
            'iconeLogout' 	 => 'out',
            'mensagemLogout' => 'Sair'
        ];
        
        $this->imprimirConteudo('professorView.html.twig', $args);
    }
}

?>