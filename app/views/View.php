<?php 
	class View {
		protected $arquivoView;
		protected $botaoSair;
		protected $conteudoHtml;

		#	getters / setters

		protected function getConteudoHtml() {
			return $this->conteudoHtml;
		}

		protected function setConteudoHtml($texto) {
			$this->conteudoHtml = $texto;
		}

		protected function getBotaoSair() {
			return $this->botaoSair;
		}

		protected function setBotaoSair($arquivo) {
			$this->botaoSair = $arquivo;
		}

		protected function getArquivoView() {
			return $this->arquivoView;
		}

		protected function setArquivoView($arquivo) {
			$this->arquivoView = $arquivo;
		}
	}
 ?>