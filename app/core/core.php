<?php 

	class Core {
		private $proxController;
		private $templateEstrutura;

		private function verificaSolicitacaoRegistro() {
			$parametro = $this->obtenhaParametro('getNewRegister');
            return ($parametro == "true");
		}

		public function carregarConteudo() {

			$usuarioLogado = isset($_SESSION["id_tipo_usuario"]);
			$solicitouCadastro = $this->verificaSolicitacaoRegistro();

			if($usuarioLogado){
				echo "usuario logado";
			} else {
				if($solicitouCadastro){
					(new RegistroController)->start();
				} else {
					(new LoginController)->start();
				}
				// (new AlunoController)->start();
				// (new AdminController)->start();
			}
		}

		private function obtenhaParametro($parametro) {
			$resultado = filter_input( 
                INPUT_POST, 
                $parametro, 
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
			);

			return $resultado;
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