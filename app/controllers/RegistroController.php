<?php 

namespace RosaParks\Controllers;

use RosaParks\Config\Env;

class RegistroController extends Controller {
	public function __construct($di_models, $di_utils) {
		$model_login = $di_models["registro"];
		$twig = $di_utils["twig"];

		$this->setModel($model_login);
		$this->setTwig($twig);
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
			'API_USER'  	 	=> Env::get('API_USER'),
			'API_PASS'       	=> Env::get('API_PASS'),
			'urlHost'        	=> Env::get('APP_HOST'),
			'etnias'         	=> $etnias,
			'generos'			=> $generos,
			'escolaridades'  	=> $escolaridades,
			'tiposUsuario'   	=> $tiposUsuario,
			'disciplinas'    	=> $disciplinas,
			'iconeLogout' 	 	=> 'in',
			'mensagemLogout' 	=> 'Logar'
		];
		
		$this->imprimirConteudo('registroView.html.twig', $args);
	}
}

?>