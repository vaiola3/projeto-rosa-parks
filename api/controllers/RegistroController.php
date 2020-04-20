<?php

    class RegistroController extends Controller {

		public function __construct() {
			$this->setModel(new RegistroModel);
		}

		public function cadastrarNovoUsuario($dadosNovoUsuario) {
			$model = $this->getModel();
			$dadosRetorno = ['erro' => false, 'mensagem' => ''];

			$erro = $this->validarParametros($dadosNovoUsuario);

			if(!$erro){
				$erro = ($model->cadastrarNovoUsuario($dadosNovoUsuario) == 0);
			}

			if($erro){
				$dadosRetorno['erro'] = true;
				$dadosRetorno['mensagem'] = 'Ocorreu um erro!';
			} else {
				$dadosRetorno['erro'] = false;
				$dadosRetorno['mensagem'] = 'Cadastro realizado com sucesso!';
			}

			return $dadosRetorno;
		}

    	public function verificarEmail($email) {
			$model = $this->getModel();

			$existeRegistro = $model->existeEmail($email);

    		$resposta = [
    			'data' => [
    				'valido' => ($existeRegistro) ? (false) : (true)
    			]
    		];

    		return $resposta;
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