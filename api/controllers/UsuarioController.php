<?php

    class UsuarioController extends Controller {

		public function __construct() {
			$this->setModel(new UsuarioModel);
		}

		public function consultar($tipo, $status) {
            if($tipo == 'alunos')
            	return $this->consultarAlunos($status);

            if($tipo == 'professores')
            	return $this->consultarProfessores($status);
        }

        private function consultarAlunos($status) {
        	$model = $this->getModel();
        	$listagem = null;

			if($status == 'aguardando')
				$listagem = $model->consultarAlunosAguardandoAtivacao();
			return $listagem;
		}

		private function consultarProfessores($status) {
			$model = $this->getModel();
			$listagem = null;

			if($status == 'aguardando')
				$listagem = $model->consultarProfessoresAguardandoAtivacao();
			return $listagem;
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