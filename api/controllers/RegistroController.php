<?php

    class RegistroController extends Controller {

		public function __construct() {
			$this->setModel(new RegistroModel);
		}

		public function cadastrarNovoUsuario($dadosNovoUsuario) {
			$model = $this->getModel();
			$dadosOperacao = ['erro' => false, 'mensagem' => ''];

			foreach($dadosNovoUsuario as $key => $value){
				if($value == ''){
					$dadosOperacao['erro'] = true;
					$dadosOperacao['mensagem'] += "Campo {$key} em branco\n";
				}
			}

			if(!$dadosOperacao['erro']){
				$dadosOperacao['erro'] = ($model->cadastrarNovoUsuario($dadosNovoUsuario) == 0);
			}

			if(!$dadosOperacao['erro'])
				$dadosOperacao['mensagem'] = 'Cadastro realizado com sucesso!';
			else
				$dadosOperacao['mensagem'] = 'Ocorreu um erro!';

			return $dadosOperacao;
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
		
    }

 ?>