<?php 

namespace RosaParks\Core;

use RosaParks\Controllers\LoginController;
use RosaParks\Controllers\RegistroController;

class Main {
	private function verificarSolicitacaoRegistro() {
		$parametro = $this->obterParametro('getNewRegister');
		return ($parametro == "true");
	}
	
	private function verificarSolicitacaoLogout() {
		$parametro = $this->obterParametro('LogOutSession');
		if($parametro == "true"){
			session_destroy();
			$_SESSION = [];
		}
	}
	
	public function carregarConteudo() {
		
		$this->verificarSolicitacaoLogout();
		
		$solicitouCadastro = $this->verificarSolicitacaoRegistro();
		
		if($solicitouCadastro){
			(new RegistroController)->start();
		} else {
			(new LoginController)->start();
		}
	}
	
	private function obterParametro($parametro) {
		$resultado = filter_input( 
			INPUT_POST, 
			$parametro, 
			FILTER_SANITIZE_STRING,
			FILTER_FLAG_NO_ENCODE_QUOTES
		);
		
		return $resultado;
	}
	
	#	getters / setters
}

?>