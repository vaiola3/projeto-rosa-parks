<?php
    class LoginView extends View {
        public function __construct() {
			$arquivoView = "app/views/html/loginView.html";

			$textoHtml = file_get_contents($arquivoView);

			$this->setConteudoHtml($textoHtml);
			$this->setArquivoView($arquivoView);
        }

        public function imprimirHtml() {
			echo $this->getConteudoHtml();
		}
    }
 ?>