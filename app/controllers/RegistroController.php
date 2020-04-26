<?php 

	class RegistroController extends Controller {
		public function __construct() {
			$this->setModel(new RegistroModel);
			$this->setTwig(Twig::getInstancia());
		}

		public function start() {
			$this->imprimirTela();
		}

		private function imprimirTela() {
			$model = $this->getModel();

			$etnias        = $model->consultarEtniasCadastradas();
			$generos       = $model->consultarGenerosCadastrados();
			$escolaridades = $model->consultarEscolaridadesCadastradas();
			$tiposUsuario  = $model->consultarTiposUsuarioCadastrados();
			$disciplinas   = $model->consultarDisciplinasCadastradas();

			$args = [
				'API_USER'  	 => env('API_USER'),
				'API_PASS'       => env('API_PASS'),
				'urlHost'        => env('APP_HOST'),
				'etnias'         => $etnias,
				'generos' 		 => $generos,
				'escolaridades'  => $escolaridades,
				'tiposUsuario'   => $tiposUsuario,
				'disciplinas'    => $disciplinas,
				'iconeLogout' 	 => 'in',
				'mensagemLogout' => 'Logar'
			];

			$this->imprimirConteudo('registroView.html.twig', $args);
		}
	}

 ?>