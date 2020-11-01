<?php 

namespace RosaParks\Models;

use RosaParks\Config\Conexao;

class RegistroModel extends Model {
	
	public function validaEnderecoEmail($email) {
		$conexao = $this->getConexao();
		$emailValidado = $conexao->escape_string($email);
		$query = "SELECT id FROM cadastros_usuarios WHERE (email = '{$emailValidado}')";
		
		$retorno = $conexao->query($query);
		$existeRegistro = false;
		
		if(isset($retorno) && ($retorno->num_rows > 0))
		$existeRegistro = true;
		
		return $existeRegistro; 
	}
	
	public function buscarPor($tipoRegistro) {
		$resultado = $this->consultarTiposCadastrosPorNome($tipoRegistro);
		$row = $resultado->fetch_assoc();
		$registros = $this->consultarCadastrosGeraisPorTipo($row['id']);
		return $registros;
	}
	
	public function consultarTiposUsuarioCadastrados() {
		$tiposUsuario = array(
			array('id'   => '7', 'nome' => 'Professor'),
			array('id'   => '8', 'nome' => 'Aluno')
		);
		return $tiposUsuario;
	}
	
	public function consultarEtniasCadastradas() {
		return $this->buscarPor('etnia');
	}
	
	public function consultarGenerosCadastrados() {
		return $this->buscarPor('genero');
	}
	
	public function consultarEscolaridadesCadastradas() {
		return $this->buscarPor('escolaridade');
	}
	
	public function consultarDisciplinasCadastradas() {
		return $this->buscarPor('disciplina');
	}
}
?>