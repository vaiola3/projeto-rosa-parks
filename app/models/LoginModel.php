<?php

namespace RosaParks\Models;

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
            
            $retornoQuery = $this->executarQuery($query);
            
            $quantidadeRegistros = $retornoQuery->num_rows;
            $resultado = ($quantidadeRegistros > 0);
            
            if($resultado)
            $this->configurarSessao($retornoQuery->fetch_assoc());
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