<?php 
	class Conexao {
		private static $conexao  = null;

		private static $servidor = 'localhost';
		private static $nome 	 = 'programacaoferiasverao2020';
		private static $usuario  = 'root';
		private static $senha    = '';

		private function __construct(){}
        private function __clone(){}
        private function __wakeup(){}

		public static function getConexao(){
			if(!isset(self::$conexao)){				
				self::$conexao = new mysqli(self::$servidor, self::$usuario, self::$senha, self::$nome);

				self::$conexao->set_charset("utf8");

				if(self::$conexao->connect_error){
					$conexao = null;
				}
			}

			return self::$conexao;
		}
	}
 ?>