<?php 

namespace RosaParks\Core;

final class Main {
	private static function isSolicitacaoRegistro() {
		return self::isTrue("getNewRegister");
	}

	private static function isSolicitacaoLogout () {
		return self::isTrue("LogOutSession");
	}
	
	public static function carregarConteudo($di_controllers) {
		$login_controller = $di_controllers["login"];
		$registro_controller = $di_controllers["registro"];

		if (self::isSolicitacaoRegistro()){
			$registro_controller->start();
		} else {
			if (self::isSolicitacaoLogout()) {
				$login_controller->logout();
			}
			$login_controller->start($di_controllers);
		}
	}
	
	private static function obterParametro($parametro) {
		$resultado = filter_input( 
			INPUT_POST, 
			$parametro, 
			FILTER_SANITIZE_STRING,
			FILTER_FLAG_NO_ENCODE_QUOTES
		);
		
		return $resultado;
	}

	private static function isTrue($nome_parametro) {
		$parametro = self::obterParametro($nome_parametro);
		return ($parametro == "true");
	}
	
	#	getters / setters
}

?>