<?php 
	class RegistroView extends View {

		public function __construct() {
			$arquivoView = "app/views/html/registroView.html";
			$arquivoBotaoSair = "app/template/logout/buttonQuit.html";
            $host = env('APP_HOST');

			$textoHtml = file_get_contents($arquivoView);
            $textoHtml = str_replace("{{MNEMONICO_URL_HOST}}", $host, $textoHtml);

			$this->setConteudoHtml($textoHtml);
			$this->setArquivoView($arquivoView);
            $this->setBotaoSair($arquivoBotaoSair);
        }

        private function imprimeSelect($dados, $valorDefault = "", $mnemonico) {
            $options =      "<option value=''>{$valorDefault}</option>";
            foreach($dados as $key => $value){
                $id = $value['id'];
                $nome = $value['nome'];
                $options .= "<option value='{$id}'>{$nome}</option>";
            }

            $conteudo = str_replace($mnemonico, $options, $this->getConteudoHtml());

            $this->setConteudoHtml($conteudo);
        }

		public function carregarSelectEtnias($etnias) {
            $this->imprimeSelect($etnias, "Etnia", "{{MNEMONICO_SELECT_ETNIA}}");
        }
        
        public function carregarSelectGeneros($generos) {
            $this->imprimeSelect($generos, "Gênero", "{{MNEMONICO_SELECT_GENERO}}");
        }
        
        public function carregarSelectEscolaridades($escolaridades) {
            $this->imprimeSelect($escolaridades, "Escolaridade", "{{MNEMONICO_SELECT_ESCOLARIDADE}}");
        }

		public function carregarOpcoesTipoUsuario() {
            $aluno = 
            $tiposUsuario = array(
                array('id'   => '7', 'nome' => 'Professor'),
                array('id'   => '8', 'nome' => 'Aluno')
            );

            $this->imprimeSelect($tiposUsuario, "Sou...", "{{MNEMONICO_SELECT_USER_TYPE}}");
		}

		public function imprimirHtml() {
			echo $this->getConteudoHtml();
		}

		public function carregarBotaoSair() {
			$botao = file_get_contents($this->getBotaoSair());
			$botao = str_replace("{{MNEMONICO_MENSAGEM_ICONE_LOGOUT}}", "Logar", $botao);
            $botao = str_replace("{{MNEMONICO_ICONE_LOGOUT_VOLTAR}}", "in", $botao);

            $textoHtml = str_replace("{{MNEMONICO_ICON_VOLTAR}}", $botao, $this->getConteudoHtml());

            $this->setConteudoHtml($textoHtml);
		}
	}
 ?>