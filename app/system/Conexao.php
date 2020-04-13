<?php 
	class Conexao {
		private static $conexao  = null;

		private function __construct(){}
        private function __clone(){}
        private function __wakeup(){}

		public static function getConexao(){
			if(!isset(self::$conexao)){
				$servidor = env('DB_HOST');
				$usuario  = env('DB_USERNAME');
				$senha    = env('DB_PASSWORD');
				$nome 	  = env('DB_NAME');

				self::$conexao = new mysqli($servidor, $usuario, $senha, $nome);

				self::$conexao->set_charset("utf8");

				if(self::$conexao->connect_error){
					$conexao = null;
				}
			}

			return self::$conexao;
		}
	}
 ?>