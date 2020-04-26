<?php

    class AdminModel extends Model {

        public function consultarUsuariosSemAcesso() {
            $usuariosRegistrados = $this->listarUsuariosRegistrados();

            $titulos = [
                ['title' => ''],
                ['title' => 'ID'],
                ['title' => 'Status'],
                ['title' => 'Nome Completo'],
                ['title' => 'CPF'],
                ['title' => 'Nascimento'],
                ['title' => 'Ano'],
                ['title' => 'Etnia'],
                ['title' => 'Gênero'],
                ['title' => 'Escolaridade'],
                ['title' => 'CEP'],
                ['title' => 'Logradouro'],
                ['title' => 'No'],
                ['title' => 'Complemento'],
                ['title' => 'Bairro'],
                ['title' => 'Cidade'],
                ['title' => 'Email'],
                ['title' => 'Tipo'],
                ['title' => 'Escola'],
                ['title' => 'Whatsapp']
            ];

            $payload = [];

            while($item = $usuariosRegistrados->fetch_assoc()){
                if($item['status'] == 'Aguardando Confirmação'){
                    $botao = "<a ".
                                "class='ui green mini button' ".
                                "id='btnAtivar' ".
                                "onclick='ativar({$item['id']});'>".
                                "Ativar".
                            "</a>";
                    $conteudo = [$botao];
                    foreach($item as $key => $value){ 
                        $conteudo[] = $value;
                    }
                    $payload[] = $conteudo;
                }
            }

            return [
                'titulosColunas' => $titulos,
                'payload' => $payload
            ];
        }

        private function listarUsuariosRegistrados() {
            $query = file_get_contents("models/querys/UsuariosRegistradosQuery.sql");
            return $this->executarQuery($query);
        }

        private function escaparString($texto) {
            $conexao = $this->abrirConexao();
            return $conexao->real_escape_string($texto);
        }

    }

 ?>