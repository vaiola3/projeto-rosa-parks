<?php 

	class Core {
		private $proxController;
		private $templateEstrutura;

		public function trataRequisicao() {
			if(isset($_GET['CurrentView'])){
				$currentView = $_GET['CurrentView'];

				if($currentView == 'RegisterView')
					(new RegistroController)->tratarAjax();
			}
		}

		public function carregarConteudo($estrutura) {
			$this->setTemplateEstrutura($estrutura);

			$usuarioLogado = isset($_SESSION["id_tipo_usuario"]);

			if($usuarioLogado){
				echo "usuario logado";
			} else {
				(new RegistroController)->iniciar();
				// (new LoginController)->imprimirTela();
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