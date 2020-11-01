<?php 

namespace RosaParks\Controllers;

use RosaParks\Config\Twig;
use RosaParks\Models\LoginModel;
use RosaParks\Controllers\AdminController;

class LoginController extends Controller {
	
	public function __construct() {
		$this->setModel(new LoginModel);
		$this->setTwig(Twig::getInstancia());
	}
	
	public function start() {
		if($this->logar()){
			$this->carregarEntidade();
		} else if(isset($_SESSION['id_tipo_usuario'])){
			$this->carregarEntidade();
		} else {
			$this->imprimirTela();
		}
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
	
	private function _carregarEntidade() {
		var_dump($_SESSION);
	}
	
	private function carregarEntidade() {
		if(isset($_SESSION['id'])){
			$tipoUsuario = $_SESSION['tipo_usuario'];
			
			if($tipoUsuario == 'Administrador')
			(new AdminController)->start();
			
			/**
			*
			*	Atualmente os usuarios Aluno e Professor nao logam no sistema.
			*
			*	Em outra situacao executar:
			*		(new ProfessorController)->start();
			*  ou
			* 		(new AlunoController)->start();
			*
			*/
			
			if($tipoUsuario == 'Professor')
			$this->imprimirTela(['MENSAGEM' => 'Atualmente usuários Professor não logam no sistema.']);
			if($tipoUsuario == 'Aluno')
			$this->imprimirTela(['MENSAGEM' => 'Atualmente usuários Aluno não logam no sistema.']);
		}
	}
	
	#	getters / setters
}

?>