<?php

    class RegistroModel extends Model {
        public function existeEmail($argEmail) {
            $resultado = false;
            if($argEmail){
                $conexao = $this->abrirConexao();

                $email = $conexao->escape_string($argEmail);

                $query = "SELECT id FROM cadastros_usuarios ".
                         "WHERE (email = '{$email}');";

                $quantidadeRegistros = $this->executarQuery($query)->num_rows;
                $resultado = ($quantidadeRegistros > 0);
            }
            return $resultado;
        }

        public function cadastrarNovoUsuario($dados) {
            $conexao = $this->abrirConexao();

            $cadastroRealizadoComSucesso = false;

            $colunas  = "";                           $valores  = "";
            $colunas .= "`id`, ";                     $valores .= "NULL, ";
            $colunas .= "`nome`, ";                   $valores .= "'{$dados['nomeCompleto']}', ";
            $colunas .= "`cpf`, ";                    $valores .= "'{$dados['cpf']}', ";
            $colunas .= "`data_nascimento`, ";        $valores .= "'{$dados['dataNascimento']}', ";
            $colunas .= "`ano_matricula`, ";          $valores .= date('Y').", ";
            $colunas .= "`id_etnia`, ";               $valores .= "'{$dados['etnia']}', ";
            $colunas .= "`id_genero`, ";              $valores .= "'{$dados['genero']}', ";
            $colunas .= "`id_escolaridade`, ";        $valores .= "'{$dados['escolaridade']}', ";
            $colunas .= "`cep`, ";                    $valores .= "'{$dados['cep']}', ";
            $colunas .= "`logradouro`, ";             $valores .= "'{$dados['logradouro']}', ";
            $colunas .= "`numero`, ";                 $valores .= "'{$dados['numero']}', ";
            $colunas .= "`complemento`, ";            $valores .= "'{$dados['complemento']}', ";
            $colunas .= "`bairro`, ";                 $valores .= "'{$dados['bairro']}', ";
            $colunas .= "`cidade`, ";                 $valores .= "'{$dados['cidade']}', ";
            $colunas .= "`email`, ";                  $valores .= "'{$dados['email']}', ";
            $colunas .= "`id_tipo_usuario`, ";        $valores .= "'{$dados['tipoUsuario']}', ";
            $colunas .= "`escola_ensino_medio`, ";    $valores .= "'{$dados['escolaMedio']}', ";
            $colunas .= "`senha`, ";                  $valores .= "'{$dados['senha']}', ";
            $colunas .= "`whatsapp`, ";               $valores .= "'{$dados['telefone']}', ";
            $colunas .= "`id_status`, ";              $valores .= "20, ";
            $colunas .= "`data_cadastro`";            $valores .= "'".date('Y-m-d H:i:s')."'";

            $query = "INSERT INTO cadastros_usuarios ($colunas) VALUES ($valores);";

            $conexao->query($query);

            return $conexao->affected_rows;
        }

        private function escaparString($texto) {

            $conexao = $this->abrirConexao();

            return $conexao->real_escape_string($texto);
        }

    }

 ?>