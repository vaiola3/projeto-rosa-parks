<?php 

	class RegistroController extends Controller {
		public function __construct() {
			$this->setModel(new RegistroModel);
			$this->setTwig(Twig::getInstancia());
		}

		public function verificaNecessidadeValidarFormulario() {
			////	
		}

		public function imprimirTela() {
			$model = $this->getModel();

			$urlHost 	   = env('APP_HOST');
			$etnias 	   = $model->consultarEtniasCadastradas();
			$generos 	   = $model->consultarGenerosCadastrados();
			$escolaridades = $model->consultarEscolaridadesCadastradas();
			$tiposUsuario  = $model->consultarTiposUsuarioCadastrados();
			$disciplinas   = $model->consultarDisciplinasCadastradas();

			$args = [
				'urlHost'        => $urlHost,
				'etnias' 		 => $etnias,
				'generos' 		 => $generos,
				'escolaridades'  => $escolaridades,
				'tiposUsuario'   => $tiposUsuario,
				'disciplinas'    => $disciplinas,
				'iconeLogout' 	 => 'in',
				'mensagemLogout' => 'Logar'
			];

			$this->imprimirConteudo('registroView.html', $args);
		}
	}

 ?>