<?php 

	class RegistroController extends Controller {
		public function __construct() {
			$this->setModel(new RegistroModel);
			$this->setView(new RegistroView);
		}

		public function verificaNecessidadeValidarFormulario() {
			////	
		}

		public function tratarAjax() {
			$model = $this->getModel();

			if(isset($_GET['Method'])){
				$solicitacao = $_GET['Method'];

				if($solicitacao == 'CheckThisEmail'){
					if(isset($_GET['EmailAdress'])){
						$email = $_GET['EmailAdress'];
						$model->validaEnderecoEmail($email);
					}
				}
				
			}
		}

		public function carregarTela() {
			$view = $this->getView();
			$model = $this->getModel();

			$view->carregarBotaoSair();
			$view->carregarOpcoesTipoUsuario();

			$etnias = $model->consultarEtniasCadastradas();
			$view->carregarSelectEtnias($etnias);

			$generos = $model->consultarGenerosCadastrados();
			$view->carregarSelectGeneros($generos);

			$escolaridades = $model->consultarEscolaridadesCadastradas();
			$view->carregarSelectEscolaridades($escolaridades);

            $view->imprimirHtml();
		}
	}

 ?>