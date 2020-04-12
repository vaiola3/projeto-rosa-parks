<?php 
	class RegistroModel extends Model {
		public function consultarEtniasCadastradas() {
			$resultado = $this->consultarTiposCadastrosPorNome('etnia');

			foreach ($resultado as $key => $value) {
				$etnias = $this->consultarCadastrosGeraisPorTipo($value['id']);
			}

			return $etnias;
		}

		public function consultarGenerosCadastrados() {
			$resultado = $this->consultarTiposCadastrosPorNome('genero');

			foreach ($resultado as $key => $value) {
				$generos = $this->consultarCadastrosGeraisPorTipo($value['id']);
			}

			return $generos;
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