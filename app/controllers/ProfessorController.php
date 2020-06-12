<?php

    class ProfessorController extends Controller {
        public function __construct() {
			$this->setModel(new AlunoModel);
			$this->setTwig(Twig::getInstancia());
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