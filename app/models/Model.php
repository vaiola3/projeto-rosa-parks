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

		#	getters / setters

		protected function getConexao() {
			return $this->conexao;
		}

		protected function setConexao($novaConexao) {
			$this->conexao = $novaConexao;
		}
	}
 ?>