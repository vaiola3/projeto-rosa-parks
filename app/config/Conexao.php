<?php 
	class Conexao {
		private static $conexao  = null;

		private function __construct(){}
        private function __clone(){}
        private function __wakeup(){}

		public static function getConexao(){
			if(!isset(self::$conexao)){
				$servidor = Env::get('DB_HOST');
				$usuario  = Env::get('DB_USERNAME');
				$senha    = Env::get('DB_PASSWORD');
				$nome 	  = Env::get('DB_NAME');

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