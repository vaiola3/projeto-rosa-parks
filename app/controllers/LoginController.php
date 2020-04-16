<?php 

	class LoginController extends Controller {
		private $corpoLoginView = "app/views/loginView.html";

		public function __construct() {
			// $this->setModel(new LoginModel);
			$this->setTwig(Twig::getInstancia());
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
				(new RegistroController)->imprimirTela();
			} else {
				$this->imprimirTela();
			}
		}

		public function imprimirTela() {
			$model = $this->getModel();

            $this->imprimirConteudo('loginView.html',[]);
		}

		#	getters / setters
	}

 ?>