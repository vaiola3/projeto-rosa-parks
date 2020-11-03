<?php

namespace RosaParksAPI\Models;

class UsuarioModel extends Model {
    
    public function ativarUsuario($id) {
        $textoRevisado = $this->escaparString($id);
        $query = "UPDATE cadastros_usuarios SET id_status = 18 WHERE id = {$textoRevisado}";
        return $this->executarQuery($query);
    }
    
    public function inativarUsuario($id) {
        $textoRevisado = $this->escaparString($id);
        $query = "UPDATE cadastros_usuarios SET id_status = 19 WHERE id = {$textoRevisado}";
        return $this->executarQuery($query);
    }
    
    public function consultarProfessoresAguardandoAtivacao() {
        $usuariosRegistrados = $this->consultarUsuariosRegistrados();
        $titulos = $this->carregarTitulos([
            'Professor', 
            'ID', 
            'Nome Completo', 
            'Nascimento', 
            'Ano', 
            'Email', 
            'Whatsapp'
        ]);
            
        $payload = [];
            
        while($item = $usuariosRegistrados->fetch_assoc()){
            if($item['status'] == 'Aguardando Confirmação' && $item['tipo_usuario'] == 'Professor'){
                $botao = "<a ".
                "class='ui green mini button' ".
                "id='btnAtivar' ".
                "onclick='ativarProfSemAcesso({$item['id']});'>".
                "Ativar".
                "</a>";
                
                $conteudo = [$botao];
                $conteudo[] = $item['id'];
                $conteudo[] = $item['nome'];
                $conteudo[] = $item['data_nascimento'];
                $conteudo[] = $item['ano_matricula'];
                $conteudo[] = $item['email'];
                $conteudo[] = $item['whatsapp'];
                
                $payload[] = $conteudo;
            }
        }
            
        return [
            'titulosColunas' => $titulos,
            'payload' => $payload
        ];
    }
        
    public function consultarProfessoresAtivos() {
        $usuariosRegistrados = $this->consultarUsuariosRegistrados();
        $titulos = $this->carregarTitulos([
            'Professor', 
            'ID', 
            'Nome Completo', 
            'Nascimento', 
            'Ano', 
            'Email', 
            'Whatsapp'
        ]);
                
        $payload = [];
            
        while($item = $usuariosRegistrados->fetch_assoc()){
            if($item['status'] == 'Ativo' && $item['tipo_usuario'] == 'Professor'){
                $botao = "<a ".
                "class='ui red mini button' ".
                "id='btnInativar' ".
                "onclick='inativarProfAtivo({$item['id']});'>".
                "Inativar".
                "</a>";
                $conteudo = [$botao];
                $conteudo[] = $item['id'];
                $conteudo[] = $item['nome'];
                $conteudo[] = $item['data_nascimento'];
                $conteudo[] = $item['ano_matricula'];
                $conteudo[] = $item['email'];
                $conteudo[] = $item['whatsapp'];
                
                $payload[] = $conteudo;
            }
        }
                
        return [
            'titulosColunas' => $titulos,
            'payload' => $payload
        ];
    }
            
    public function consultarProfessoresInativos() {
        $usuariosRegistrados = $this->consultarUsuariosRegistrados();
        $titulos = $this->carregarTitulos([
            'Aluno', 
            'ID', 
            'Nome Completo', 
            'Whatsapp',
            'Nascimento', 
            'Ano', 
            'Email', 
            'Escola', 
        ]);
                    
        $payload = [];
        
        while($item = $usuariosRegistrados->fetch_assoc()){
            if($item['status'] == 'Inativo' && $item['tipo_usuario'] == 'Professor'){
                $botao = "<a ".
                "class='ui green mini button' ".
                "id='btnInativar' ".
                "onclick='ativarProfInativo({$item['id']});'>".
                "Ativar".
                "</a>";
                $conteudo = [$botao];
                $conteudo[] = $item['id'];
                $conteudo[] = $item['nome'];
                $conteudo[] = $item['whatsapp'];
                $conteudo[] = $item['data_nascimento'];
                $conteudo[] = $item['ano_matricula'];
                $conteudo[] = $item['email'];
                $conteudo[] = $item['escola_ensino_medio'];
                
                $payload[] = $conteudo;
            }
        }
                    
        return [
            'titulosColunas' => $titulos,
            'payload' => $payload
        ];
    }
                
    public function consultarAlunosAguardandoAtivacao() {
        $usuariosRegistrados = $this->consultarUsuariosRegistrados();
        $titulos = $this->carregarTitulos([
            'Aluno', 
            'ID', 
            'Nome Completo', 
            'Whatsapp',
            'Nascimento', 
            'Ano', 
            'Email', 
            'Escola', 
        ]);
                        
        $payload = [];
        
        while($item = $usuariosRegistrados->fetch_assoc()){
            if($item['status'] == 'Aguardando Confirmação' && $item['tipo_usuario'] == 'Aluno'){
                $botao = "<a ".
                "class='ui green mini button' ".
                "id='btnAtivar' ".
                "onclick='ativarAlunoSemAcesso({$item['id']});'>".
                "Ativar".
                "</a>";
                $conteudo = [$botao];
                $conteudo[] = $item['id'];
                $conteudo[] = $item['nome'];
                $conteudo[] = $item['whatsapp'];
                $conteudo[] = $item['data_nascimento'];
                $conteudo[] = $item['ano_matricula'];
                $conteudo[] = $item['email'];
                $conteudo[] = $item['escola_ensino_medio'];
                
                $payload[] = $conteudo;
            }
        }
                        
        return [
            'titulosColunas' => $titulos,
            'payload' => $payload
        ];
    }
                    
    public function consultarAlunosAtivos() {
        $usuariosRegistrados = $this->consultarUsuariosRegistrados();
        $titulos = $this->carregarTitulos([
            'Aluno', 
            'ID', 
            'Nome Completo', 
            'Whatsapp',
            'Nascimento', 
            'Ano', 
            'Email', 
            'Escola', 
            ]);
            
        $payload = [];
        
        while($item = $usuariosRegistrados->fetch_assoc()){
            if($item['status'] == 'Ativo' && $item['tipo_usuario'] == 'Aluno'){
                $botao = "<a ".
                "class='ui red mini button' ".
                "id='btnInativar' ".
                "onclick='inativarAlunoAtivo({$item['id']});'>".
                "Inativar".
                "</a>";
                $conteudo = [$botao];
                $conteudo[] = $item['id'];
                $conteudo[] = $item['nome'];
                $conteudo[] = $item['whatsapp'];
                $conteudo[] = $item['data_nascimento'];
                $conteudo[] = $item['ano_matricula'];
                $conteudo[] = $item['email'];
                $conteudo[] = $item['escola_ensino_medio'];
                
                $payload[] = $conteudo;
            }
        }
        
        return [
            'titulosColunas' => $titulos,
            'payload' => $payload
        ];
    }
                        
    public function consultarAlunosInativos() {
        $usuariosRegistrados = $this->consultarUsuariosRegistrados();
        $titulos = $this->carregarTitulos([
            'Aluno', 
            'ID', 
            'Nome Completo', 
            'Whatsapp',
            'Nascimento', 
            'Ano', 
            'Email', 
            'Escola', 
        ]);
            
        $payload = [];
        
        while($item = $usuariosRegistrados->fetch_assoc()){
            if($item['status'] == 'Inativo' && $item['tipo_usuario'] == 'Aluno'){
                $botao = "<a ".
                "class='ui green mini button' ".
                "id='btnInativar' ".
                "onclick='ativarAlunoInativo({$item['id']});'>".
                "Ativar".
                "</a>";
                $conteudo = [$botao];
                $conteudo[] = $item['id'];
                $conteudo[] = $item['nome'];
                $conteudo[] = $item['whatsapp'];
                $conteudo[] = $item['data_nascimento'];
                $conteudo[] = $item['ano_matricula'];
                $conteudo[] = $item['email'];
                $conteudo[] = $item['escola_ensino_medio'];
                
                $payload[] = $conteudo;
            }
        }
        
        return [
            'titulosColunas' => $titulos,
            'payload' => $payload
        ];
    }

    private function carregarTitulos($nomes) {
        $titulos = [
            'Aluno'         => ['title' => 'Aluno'],
            'Professor'     => ['title' => 'Professor'],
            'ID'            => ['title' => 'ID'],
            'Status'        => ['title' => 'Status'],
            'Nome Completo' => ['title' => 'Nome Completo'],
            'CPF'           => ['title' => 'CPF'],
            'Nascimento'    => ['title' => 'Nascimento'],
            'Ano'           => ['title' => 'Ano'],
            'Etnia'         => ['title' => 'Etnia'],
            'Gênero'        => ['title' => 'Gênero'],
            'Escolaridade'  => ['title' => 'Escolaridade'],
            'CEP'           => ['title' => 'CEP'],
            'Logradouro'    => ['title' => 'Logradouro'],
            'No'            => ['title' => 'No'],
            'Complemento'   => ['title' => 'Complemento'],
            'Bairro'        => ['title' => 'Bairro'],
            'Cidade'        => ['title' => 'Cidade'],
            'Email'         => ['title' => 'Email'],
            'Tipo'          => ['title' => 'Tipo'],
            'Escola'        => ['title' => 'Escola'],
            'Whatsapp'      => ['title' => 'Whatsapp']
        ];
        
        $titulosCarregados = [];
        
        foreach ($nomes as $item) {
            $titulosCarregados[] = $titulos[$item];
        }
        
        return $titulosCarregados;
    }
                            
    private function consultarUsuariosRegistrados() {
        $query = file_get_contents("models/querys/UsuariosRegistradosQuery.sql");
        return $this->executarQuery($query);
    }
                            
    private function escaparString($texto) {
        $conexao = $this->abrirConexao();
        return $conexao->real_escape_string($texto);
    }
    
}
                        
?>