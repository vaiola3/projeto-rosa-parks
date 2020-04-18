<?php

    class AdminController extends Controller {
        public function __construct() {
			$this->setModel(new AdminModel);
			$this->setTwig(Twig::getInstancia());
        }

        public function start() {
			$this->imprimirTela();
        }

        public function imprimirTela() {
            $model = $this->getModel();

            $usuariosSemAcesso = [
                'USUARIOS_SEM_ACESSO'
            ];

            $usuariosAtivos = [
                'USUARIOS_ATIVOS'
            ];

            $aulasDadas = [
                'AULAS_DADAS'
            ];

            $aulasAssistidas = [
                'AULAS_ASSISTIDAS'
            ];

            $opcoesRegistro = [
                'OPCOES_REGISTRO'
            ];
            
            $args = [
                'NOME_USUARIO'        => 'NOME_USUARIO',
                'USUARIOS_SEM_ACESSO' => $usuariosSemAcesso,
                'USUARIOS_ATIVOS'     => $usuariosAtivos,
                'AULAS_DADAS'         => $aulasDadas,
                'AULAS_ASSISTIDAS'    => $aulasAssistidas,
                'OPCOES_REGISTRO'     => $opcoesRegistro,
				'iconeLogout' 	      => 'out',
				'mensagemLogout'      => 'Sair'
			];

			$this->imprimirConteudo('adminView.html', $args);
		}
    }

 ?>