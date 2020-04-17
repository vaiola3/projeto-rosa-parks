<?php 

	class LoginController extends Controller {

		public function __construct() {
			$this->setModel(new LoginModel);
			$this->setTwig(Twig::getInstancia());
		}

		public function verificaSolicitacaoRegistro() {
			$parametro = $this->obtenhaParametro('getNewRegister');

            return ($parametro == "true");
		}

		public function verificaSolicitacaoLogin() {
			$model = $this->getModel();

			$email = $this->obtenhaParametro('EmailUsuario');
			$senha = $this->obtenhaParametro('SenhaUsuario');

			$loginValido = $model->validaLogin($email, $senha);

			return $loginValido;
		}

		public function start() {
			$novoRegistro = $this->verificaSolicitacaoRegistro();
			$loginSuscedido = $this->verificaSolicitacaoLogin();

			if($novoRegistro){
				(new RegistroController)->imprimirTela();
			} else {
				if($loginSuscedido)
					echo "logado com sucesso";
				else
					$this->imprimirTela();
			}
		}

		public function imprimirTela() {
			$model = $this->getModel();
			$this->imprimirConteudo('loginView.html.twig',[]);
		}

		#	getters / setters
	}

 ?>