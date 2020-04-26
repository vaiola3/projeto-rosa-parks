<?php

    class AdminController extends Controller {

		public function __construct() {
			$this->setModel(new AdminModel);
		}

		public function consultar($args) {
            $model = $this->getModel();
            $operacao = $args['operacao'];
            return $model->$operacao();
        }

		private function validarParametros($parametros) {
			$erro = false;
			foreach($parametros as $key => $value){
				if($value == ''){
					$erro = true;
				}
			}
			return $erro;
		}
		
    }

 ?>