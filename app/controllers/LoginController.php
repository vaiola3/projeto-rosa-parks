<?php 

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

		public function imprimirTela() {
			$model = $this->getModel();
			$this->imprimirConteudo('loginView.html.twig',[]);
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
				// if($tipoUsuario == 'Professor')
					// (new ProfessorController)->start();
				if($tipoUsuario == 'Aluno')
					(new AlunoController)->start();
			}
		}

		#	getters / setters
	}

 ?>