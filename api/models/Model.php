<?php 
	class Model {
		private $conexao;

		public function executarQuery($query) {
			$this->abrirConexao();
			$conexao = $this->getConexao();
			$resultado = $conexao->query($query);

			return $resultado;
		}

		public function abrirConexao() {
			$this->setConexao(Conexao::getConexao());
			return $this->getConexao();
		}

		public function fecharConexao() {
			if($this->getConexao() != null){
				$conexao->close();
				$this->setConexao(null);
			}
		}

		protected function consultarCadastrosGeraisPorTipo($idTipo) {
			$conexao = $this->abrirConexao();

			$query = "SELECT id, nome FROM cadastros_gerais WHERE (id_tipo = '{$idTipo}');";

			return $this->executarQuery($query);
		}

		protected function consultarTiposCadastrosPorNome($nome) {
			$conexao = $this->abrirConexao();

			$query = "SELECT nome, id FROM tipos_cadastros WHERE (nome = '{$nome}')";

			return $this->executarQuery($query);
		}

		#	getters / setters

		protected function getConexao() {
			return $this->conexao;
		}

		protected function setConexao($novaConexao) {
			$this->conexao = $novaConexao;
		}
	}
 ?>