<?php 

	class LoginController extends Controller {
		private $corpoLoginView = "app/views/loginView.html";

		public function __construct() {
			// $this->setModel(new LoginModel);
			$this->setView(new LoginView);
		}

		public function verificaSolicitacaoRegistro() {
			$parametro = filter_input( 
                INPUT_POST, 
                "getNewRegister",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );

            return ($parametro == "true");
		}

		public function start() {
			$novoRegistro = $this->verificaSolicitacaoRegistro();
			if($novoRegistro){
				(new RegistroController)->start();
			} else {
				$this->imprimirTela();
			}
		}

		public function imprimirTela() {
			$view = $this->getView();
			$model = $this->getModel();

            $view->imprimirHtml();
		}

		#	getters / setters
	}

 ?>