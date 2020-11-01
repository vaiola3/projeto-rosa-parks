<?php

namespace RosaParks\Controllers;

class Controller {
	private $model;
	private $twig;
	
	public function imprimirConteudo($nomeArquivo, $args) {
		$template = $this->getTemplate($nomeArquivo);
		echo $template->render($args);
	}
	
	protected function obterParametro($parametro) {
		$resultado = filter_input( 
			INPUT_POST, 
			$parametro, 
			FILTER_SANITIZE_STRING,
			FILTER_FLAG_NO_ENCODE_QUOTES
		);
		
		return $resultado;
	}
	
	protected function getTemplate($nomeArquivo) {
		$twig = $this->getTwig();
		$template = $twig->load($nomeArquivo);
		return $template;
	}
	
	#	getters / setters
	
	protected function getTwig() {
		return $this->twig;
	}
	
	protected function setTwig($twig) {
		$this->twig = $twig;
	}
	
	protected function getModel() {
		return $this->model;
	}
	
	protected function setModel($model) {
		$this->model = $model;
	}
}
?>