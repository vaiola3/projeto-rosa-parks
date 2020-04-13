<?php 
	class RegistroModel extends Model {

		public function validaEnderecoEmail($email) {
			$conexao = $this->getConexao();
			$emailValidado = $conexao->escape_string($email);
			$query = "SELECT id FROM cadastros_usuarios WHERE (email = '{$emailValidado}')";

			$retorno = $conexao->query($query);
			$existeRegistro = false;

			if(isset($retorno) && ($retorno->num_rows > 0))
				$existeRegistro = true;
			
			return $existeRegistro; 
		}

		public function buscarPor($tipoRegistro) {
			$resultado = $this->consultarTiposCadastrosPorNome($tipoRegistro);
			$row = $resultado->fetch_assoc();
			$registros = $this->consultarCadastrosGeraisPorTipo($row['id']);
			return $registros;
		}

		public function consultarEtniasCadastradas() {
			return $this->buscarPor('etnia');
		}

		public function consultarGenerosCadastrados() {
			return $this->buscarPor('genero');
		}

		public function consultarEscolaridadesCadastradas() {
			return $this->buscarPor('escolaridade');
		}

		private function consultarCadastrosGeraisPorTipo($idTipo) {
			$conexao = $this->abrirConexao();

			$query = "SELECT id, nome FROM cadastros_gerais WHERE (id_tipo = '{$idTipo}');";

			return $this->executarQuery($query);
		}

		private function consultarTiposCadastrosPorNome($nome) {
			$conexao = $this->abrirConexao();

			$query = "SELECT nome, id FROM tipos_cadastros WHERE (nome = '{$nome}')";

			return $this->executarQuery($query);
		}
	}
 ?>