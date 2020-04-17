<?php

    class AdminController extends Controller {
        public function __construct() {
			$this->setModel(new AdminModel);
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

			$this->imprimirConteudo('adminView.html', $args);
		}
    }

 ?>