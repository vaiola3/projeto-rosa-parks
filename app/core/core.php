<?php 

	class Core {
		private $proxController;
		private $templateEstrutura;

		public function carregarConteudo() {

			$usuarioLogado = isset($_SESSION["id_tipo_usuario"]);

			if($usuarioLogado){
				echo "usuario logado";
			} else {
				(new RegistroController)->start();
				// (new LoginController)->start();
				// (new AlunoController)->start();
				// (new AdminController)->start();
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
	}

 ?>