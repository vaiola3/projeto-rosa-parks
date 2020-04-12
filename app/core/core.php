<?php 

	class Core {
		private $statusLogin;
		private $proxController;
		private $templateEstrutura;

		public function __construct($estrutura) {
			$this->setTemplateEstrutura($estrutura);
			$this->setStatusLogin(isset($_SESSION["id_tipo_usuario"]));
		}

		public function start() {

			$usuarioLogado = $this->getStatusLogin();

			if($usuarioLogado){
				echo "usuario logado";
			} else {
				(new RegistroController)->start();
				// (new LoginController)->start();
			}
		}

		#	getters / setters

		private function getTemplateEstrutura() {
			return $this->templateEstrutura;
		}

		private function setTemplateEstrutura($estrutura) {
			$this->templateEstrutura = $estrutura;
		}

		private function getProxController() {
			return $this->proxController;
		}

		private function setProxController($controller) {
			$this->proxController = $controller;
		}

		private function getStatusLogin() {
			return $this->statusLogin;
		}

		private function setStatusLogin($status) {
			$this->statusLogin = $status;
		}
	}

 ?>