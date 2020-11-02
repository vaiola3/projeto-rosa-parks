<?php

namespace RosaParksAPI\Controllers;

use RosaParksAPI\Models\UsuarioModel;

class UsuarioController extends Controller {
    
    public function __construct() {
        $this->setModel(new UsuarioModel);
    }
    
    public function consultar($tipo, $status) {
        $resultado = null;
        
        if($tipo == 'alunos'){
            $resultado = $this->consultarAlunos($status);
        }
        
        if($tipo == 'professores'){
            $resultado = $this->consultarProfessores($status);
        }
        
        return $resultado;
    }
    
    public function atualizarStatus($acao, $id) {
        $model = $this->getModel();
        $resultado = null;
        
        if($acao == 'ativar'){
            $resultado = $model->ativarUsuario($id);
        }
        
        if($acao == 'inativar'){
            $resultado = $model->inativarUsuario($id);
        }
        
        return $resultado;
    }
    
    private function consultarAlunos($status) {
        $model = $this->getModel();
        $listagem = null;
        
        if($status == 'aguardando'){
            $listagem = $model->consultarAlunosAguardandoAtivacao();
        }
        
        if($status == 'ativos'){
            $listagem = $model->consultarAlunosAtivos();
        }
        
        if($status == 'inativos'){
            $listagem = $model->consultarAlunosInativos();
        }
        
        return $listagem;
    }
    
    private function consultarProfessores($status) {
        $model = $this->getModel();
        $listagem = null;
        
        if($status == 'aguardando'){
            $listagem = $model->consultarProfessoresAguardandoAtivacao();
        }
        
        if($status == 'ativos'){
            $listagem = $model->consultarProfessoresAtivos();
        }
        
        if($status == 'inativos'){
            $listagem = $model->consultarProfessoresInativos();
        }
        
        return $listagem;
    }
    
    private function validarParametros($parametros) {
        $erro = false;
        foreach($parametros as $key => $value){
            if($value == ''){
                $erro = true;
            }
        }
        return $erro;
    }
    
}

?>