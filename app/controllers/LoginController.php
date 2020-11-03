<?php 

namespace RosaParks\Controllers;

class LoginController extends Controller {
	
	public function __construct($di_models, $di_utils) {
		$model_login = $di_models["login"];
		$twig = $di_utils["twig"];

		$this->setModel($model_login);
		$this->setTwig($twig);
	}
	
	public function start($di_controllers) {
		session_start();
		if($this->logar()){
			$this->carregarEntidade($di_controllers);
		} else if(isset($_SESSION['id_tipo_usuario'])){
			$this->carregarEntidade($di_controllers);
		} else {
			$this->imprimirTela();
		}
	}

	public function logout () {
		session_start();
		session_destroy();
		$_SESSION = [];
	}
	
	public function imprimirTela($args = []) {
		$model = $this->getModel();
		$this->imprimirConteudo('loginView.html.twig',$args);
	}
	
	private function logar() {
		$model = $this->getModel();
		
		$email = $this->obterParametro('EmailUsuario');
		$senha = $this->obterParametro('SenhaUsuario');
		
		$loginValido = $model->validaLogin($email, $senha);
		
		return $loginValido;
	}
	
	private function carregarEntidade($di_controllers) {
		$admin_controller = $di_controllers["admin"];
		// $aluno_controller = $di_controllers["aluno"];
		// $professor_controller = $di_controllers["professor"];

		if(isset($_SESSION['id'])){
			$tipo_usuario = $_SESSION['tipo_usuario'];
			
			if ($tipo_usuario == 'Administrador') $admin_controller->start();
			
			/**
			*	Atualmente os usuarios Aluno e Professor nao logam no sistema.
			*
			*	Em outra situacao executar:
			*		$professor_controller->start();
			*   ou
			* 		$aluno_controller->start();
			*/
			
			if ($tipo_usuario == 'Professor') {
				$this->imprimirTela([
					'MENSAGEM' => 'Atualmente usuários Professor não logam no sistema.'
				]);
			}

			if ($tipo_usuario == 'Aluno') {
				$this->imprimirTela([
					'MENSAGEM' => 'Atualmente usuários Aluno não logam no sistema.'
				]);
			}
		}
	}
	
	#	getters / setters
}

?>