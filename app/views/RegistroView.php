<?php 
	class RegistroView extends View {

		public function __construct() {
			$arquivoView = "app/views/html/registroView.html";
			$arquivoBotaoSair = "app/template/logout/buttonQuit.html";

			$textoHtml = file_get_contents($arquivoView);

			$this->setConteudoHtml($textoHtml);
			$this->setArquivoView($arquivoView);
			$this->setBotaoSair($arquivoBotaoSair);
		}

		public function carregarSelectGenero($generos) {
			$options =      "<option value=''>Gênero</option>";
            foreach($generos as $key => $value){
                $options .= "<option value='{$value["id"]}'>";
                $options .=     $value["nome"];
                $options .= "</option>";
            }

            $conteudo = str_replace( 
                "{{MNEMONICO_SELECT_GENERO}}", 
                $options, 
                $this->getConteudoHtml()
            );  ////    Select Genero

            $this->setConteudoHtml($conteudo);
		}

		public function carregarSelectEtnias($etnias) {
			$options = "";
			foreach($etnias as $key => $value){
                $options .= "<option value='{$value["id"] }'>";
                $options .=     $value["nome"];
                $options .= "</option>";
            }

            $conteudo = str_replace( 
                "{{MNEMONICO_SELECT_ETNIA}}", 
                $options, 
                $this->getConteudoHtml()
            );  ////    Select Etnia

            $this->setConteudoHtml($conteudo);
		}

		public function carregarOpcoesTipoUsuario() {
			$options  = "";
            $options .= "<option value=''>Sou um...</option>";
            $options .= "<option value='7'>Professor</option>";
            $options .= "<option value='8'>Aluno</option>";

            $conteudo = str_replace( 
            	"{{MNEMONICO_SELECT_USER_TYPE}}", 
            	$options,
            	$this->getConteudoHtml()
            );  ////    Select Tipo Usuario

            $this->setConteudoHtml($conteudo);
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