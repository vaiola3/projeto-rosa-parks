<?php 

	class LoginController {
		private $corpoLoginView = "app/views/loginView.html";
		private $solicitacaoRegistro;

		public function __construct() {
			$this->verificaSolicitacaoRegistro();
		}

		public function verificaSolicitacaoRegistro() {
			$parametro = filter_input( 
                INPUT_POST, 
                "getNewRegister",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );

            $this->setSolicitacaoRegistro($parametro == "true");
		}

		public function start() {
			$novaSolicitacaoRegistro = $this->getSolicitacaoRegistro();

			if($novaSolicitacaoRegistro){
				(new RegistroController)->start();
			} else {
				$this->carregaTelaLogin();
			}
		}

		public function carregaTelaLogin() {
			$conteudo = file_get_contents($this->getCorpoLoginView());
			echo $conteudo;
		}

		#	getters / setters

		private function getSolicitacaoRegistro() {
			return $this->solicitacaoRegistro;
		}

		private function setSolicitacaoRegistro($status) {
			$this->solicitacaoRegistro = $status;
		}

		private function getCorpoLoginView() {
			return $this->corpoLoginView;
		}

		private function setCorpoLoginView($corpo) {
			$this->corpoLoginView = $corpo;
		}
	}

 ?>