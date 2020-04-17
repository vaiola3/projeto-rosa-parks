<?php

    class LoginModel extends Model {
        public function validaLogin($argEmail, $argSenha) {
            $resultado = false;

            if($argEmail && $argSenha){
                $conexao = $this->abrirConexao();

                $email = $conexao->escape_string($argEmail);
                $senha = $conexao->escape_string($argSenha);
                $senha = md5($senha);

                $query = "SELECT * FROM cadastros_usuarios ".
                         "WHERE (email = '{$email}') ".
                         "AND (senha = '{$senha}');";

                $quantidadeRegistros = $this->executarQuery($query)->num_rows;
                $resultado = ($quantidadeRegistros > 0);
            }

            return $resultado;
        }
    }

 ?>