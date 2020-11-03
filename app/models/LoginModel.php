<?php

namespace RosaParks\Models;

class LoginModel extends Model {
    public function validaLogin($param_email, $param_senha) {
        $resultado = false;
        
        if($param_email && $param_senha){
            $conexao = $this->abrirConexao();
            
            $email = $conexao->escape_string($param_email);
            $senha = $conexao->escape_string($param_senha);
            $senha = md5($senha);
            
            $query = "SELECT * FROM cadastros_usuarios ".
            "WHERE (email = '{$email}') ".
            "AND (senha = '{$senha}');";
            
            $retorno_query = $this->executarQuery($query);

            $qtde_registros = $retorno_query->num_rows;
            $resultado = ($qtde_registros > 0);
            
            if ($resultado) 
                $this->configurarSessao($retorno_query->fetch_assoc());
        }
        
        return $resultado;
    }
    
    private function configurarSessao($dadosUsuario) {
        forEach($dadosUsuario as $key => $value)
        $_SESSION[$key] = $value;
        
        $tipoUsuario = $this
        ->consultarCadastrosGeraisPorID($_SESSION['id_tipo_usuario'])
        ->fetch_assoc();
        
        $_SESSION['tipo_usuario'] = $tipoUsuario['nome'];
    }
}

?>