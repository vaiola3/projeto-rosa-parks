const inputEmail 			= document.getElementById('EmailAdress');
const inputView  			= document.getElementById('CurrentView');
const inputNome  			= document.getElementById('NomeCompleto');
const inputCep   			= document.getElementById('CEP');
const inputLogradouro 		= document.getElementById('Logradouro');
const inputNumero 			= document.getElementById('Numero');
const inputComplemento 		= document.getElementById('Complemento');
const inputBairro 			= document.getElementById('Bairro');
const inputCidade 			= document.getElementById('Cidade');
const inputEscolaMedio  	= document.getElementById('EscolaEnsinoMedio');
const inputCpf          	= document.getElementById('CPF');
const inputDataNascimento	= document.getElementById('DataNascimento');
const inputTelefone 		= document.getElementById('UsuarioTelefone')
const inputEscolaridade 	= document.getElementById('UsuarioEscolaridade');
const inputSenha 			= document.getElementById('UserPassword');
const inputResenha 			= document.getElementById('ReUserPassword');

const selectEtnia 			= document.getElementById('UsuarioEtnia');
const selectGenero 			= document.getElementById('UsuarioGenero');
const selectTipoUsuario 	= document.getElementById('TipoUsuario');
const selectDisciplinas 	= document.getElementById('Disciplinas');

const fieldDisciplinas  	= document.getElementById('FieldDisciplinas');
const fieldEscolaMedio  	= document.getElementById('FieldEscEnsinoMedio');

const botaoEnviar 			= document.getElementById('botaoEnviar');

const validarEnderecoEmail = function () {

	inputEmail.value = valueParaCaixaBaixa(inputEmail);
	const enderecoEmail = inputEmail.value;

	if(enderecoEmail != ""){
		const url = 'http://' + host + '/api/registro/consultar/email/' + enderecoEmail;

		$.ajax({
			type: "GET",
			url: url,
			dataType: 'json',
			beforeSend: function (xhr) {
			   xhr.setRequestHeader("Authorization", "Basic " + btoa(user + ":" + pass));
			},
			success: function (retorno){
				if (!retorno.valido)
					window.alert( "Email inválido, por gentileza tentar outro." );
			},
			error: function (response){
			   ////	error
			}
		});
	}

};

const validarNomeCompleto = function () {
	inputNome.value = valueParaCaixaAlta(inputNome);
};

const validarCep = function () {
	const numeroCep = inputCep.value;
	consultarCep(numeroCep);
};

const validarLogradouro = function () {
	inputLogradouro.value = valueParaCaixaAlta(inputLogradouro);
};

const validarComplemento = function () {
	inputComplemento.value = valueParaCaixaAlta(inputComplemento);
};

const validarBairro = function () {
	inputBairro.value = valueParaCaixaAlta(inputBairro);
};

const validarCidade = function () {
	inputCidade.value = valueParaCaixaAlta(inputCidade);
};

const validarTipoUsuario = function () {
	const tipoUsuario = selectTipoUsuario.value;
	if(tipoUsuario == 7){
		$(fieldDisciplinas).removeClass('hide');
		$(fieldEscolaMedio).addClass('hide');
	} else {
		$(fieldDisciplinas).addClass('hide');
		$(fieldEscolaMedio).removeClass('hide');
	}
};

const validarEscolaEnsinoMedio = function () {
	inputEscolaMedio.value = valueParaCaixaAlta(inputEscolaMedio);

};

inputNome.addEventListener('change', validarNomeCompleto);
inputCep.addEventListener('change', validarCep);
inputLogradouro.addEventListener('change', validarLogradouro);
inputComplemento.addEventListener('change', validarComplemento);
inputBairro.addEventListener('change', validarBairro);
inputCidade.addEventListener('change', validarCidade);
inputEmail.addEventListener('change', validarEnderecoEmail);
inputEscolaMedio.addEventListener('change', validarEscolaEnsinoMedio);

selectTipoUsuario.addEventListener('change', validarTipoUsuario);

const valueParaCaixaAlta = function (input) {
	let textoCaixaAlta = input.value.toUpperCase().trim();
	textoCaixaAlta = textoCaixaAlta.replace(/"/g, "");
	textoCaixaAlta = textoCaixaAlta.replace(/'/g, "");
	return textoCaixaAlta;
}

const valueParaCaixaBaixa = function (input) {
	let textoCaixaBaixa = input.value.toLowerCase().trim();
	textoCaixaBaixa = textoCaixaBaixa.replace(/"/g, "");
	textoCaixaBaixa = textoCaixaBaixa.replace(/'/g, "");
	return textoCaixaBaixa;
};

function campoNaoPreenchido( titulo, mensagem ){
	if ( (mensagem == "") )
		mensagem += ("Campo " + titulo + " deve ser preenchido.");
	else
		mensagem += ("\nCampo " + titulo + " deve ser preenchido.");
	return mensagem;
}

function formatarData( data ) {

	const arrayData = data.split( "/" );

	const dia = arrayData[0];
	const ano = arrayData[2];
	const mes = arrayData[1];

    return [ano, mes, dia].join('-');
}

const criptografar = function (texto) {
	let textoCriptografado = "";

	if(texto)
		textoCriptografado = md5(texto);

	return textoCriptografado;
};

const validarFormulario = function (){

	const senha = criptografar(inputSenha.value.trim());
	const resenha = criptografar(inputResenha.value.trim());

	const dadosNovoUsuario = {
		'nomeCompleto': {
			'titulo': 'Nome Completo',
			'value': inputNome.value.trim()
		},
		'cpf': {
			'titulo': 'CPF',
			'value': inputCpf.value.trim()
		},
		'dataNascimento': {
			'titulo': 'Data Nascimento',
			'value': formatarData(inputDataNascimento.value.trim())
		},
		'etnia': {
			'titulo': 'Etnia',
			'value': selectEtnia.value.trim()
		},
		'genero': {
			'titulo': 'Gênero',
			'value': selectGenero.value.trim()
		},
		'telefone': {
			'titulo': 'Telefone',
			'value': inputTelefone.value.trim()
		},
		'escolaridade': {
			'titulo': 'Escolaridade',
			'value': inputEscolaridade.value.trim()
		},
		'cep': {
			'titulo': 'CEP',
			'value': inputCep.value.trim()
		},
		'logradouro': {
			'titulo': 'Logradouro',
			'value': inputLogradouro.value.trim()
		},
		'numero': {
			'titulo': 'Whatsapp',
			'value': inputNumero.value.trim()
		},
		'complemento': {
			'titulo': 'Complemento',
			'value': inputComplemento.value.trim()
		},
		'bairro': {
			'titulo': 'Bairro',
			'value': inputBairro.value.trim()
		},
		'cidade': {
			'titulo': 'Cidade',
			'value': inputCidade.value.trim()
		},
		'email': {
			'titulo': 'Endereço Email',
			'value': inputEmail.value.trim()
		},
		'tipoUsuario': {
			'titulo': 'Tipo Usuario',
			'value': selectTipoUsuario.value.trim()
		},
		'disciplinas': {
			'titulo': 'Disciplinas',
			'value': $(selectDisciplinas).val()
		},
		'escolaMedio': {
			'titulo': 'Escola Ensino Médio',
			'value': inputEscolaMedio.value.trim()
		},
		'senha': {
			'titulo': 'Campo Senha',
			'value': senha
		},
		'resenha': {
			'titulo': 'Campo Confirmação Senha',
			'value': resenha
		}
	};

	let mensagemErro = "";

	forEach(dadosNovoUsuario, function (elemento, prop) {
		if(elemento.value == "")
			mensagemErro = campoNaoPreenchido(elemento.titulo, mensagemErro);
	})

	if(!mensagemErro){
		if(dadosNovoUsuario.cpf.value.length != 14)
			mensagemErro += "\nFavor revisar o campo CPF.";
		
		if(dadosNovoUsuario.cep.value.length != 9)
			mensagemErro += "\nFavor revisar o campo CEP.";

		if(dadosNovoUsuario.email.value.indexOf('@') == -1)
			mensagemErro += "\nFavor revisar o campo E-Mail.";

		if(senha != resenha)
			mensagemErro += "\nAs senhas não conferem.";
	}

	const dadosParaRetorno = {
		'mensagemErro': mensagemErro,
		'dadosNovoUsuario': dadosNovoUsuario
	}

	return dadosParaRetorno;
}

function consultarCep(numeroCep){
	const url = 'https://viacep.com.br/ws/' + numeroCep + '/json/';
	$.get(url, function (data) {
		const retorno = eval(data);
		inputLogradouro.value = retorno.logradouro.toUpperCase();
		inputBairro.value = retorno.bairro.toUpperCase();
		inputCidade.value = retorno.localidade.toUpperCase();
	});
}

$(inputNumero).mask( "99999999" );
$(inputCep).mask( "99999-999" );
$(inputCpf).mask( "999.999.999-99" );
$(inputTelefone).mask( "(99) 9 9999-9999" );

$(inputDataNascimento).mask( "99/99/9999" );

$( "#CalendarioDataNascimento" ).calendar( {
	type: "date",
	monthFirst: false,
	formatter: {
		type: "date",
		date: function (date, settings) {
			if (!date) return '';
			var day = date.getDate();
			day = ("00" + day).slice( -2 );
			var month = date.getMonth() + 1;
			month = ("00" + month).slice( -2 );
			var year = date.getFullYear();
			return day + '/' + month + '/' + year;
		}
	}
} );

const prepararDados = function (dadosNovoUsuario) {
	const dadosParaEnvio = {
		'nomeCompleto': dadosNovoUsuario.nomeCompleto.value,
		'cpf': dadosNovoUsuario.cpf.value,
		'dataNascimento': dadosNovoUsuario.dataNascimento.value,
		'etnia': dadosNovoUsuario.etnia.value,
		'genero': dadosNovoUsuario.genero.value,
		'telefone': dadosNovoUsuario.telefone.value,
		'escolaridade': dadosNovoUsuario.escolaridade.value,
		'cep': dadosNovoUsuario.cep.value,
		'logradouro': dadosNovoUsuario.logradouro.value,
		'numero': dadosNovoUsuario.numero.value,
		'complemento': dadosNovoUsuario.complemento.value,
		'bairro': dadosNovoUsuario.bairro.value,
		'cidade': dadosNovoUsuario.cidade.value,
		'email': dadosNovoUsuario.email.value,
		'tipoUsuario': dadosNovoUsuario.tipoUsuario.value,
		'disciplinas': dadosNovoUsuario.disciplinas.value,
		'escolaMedio': dadosNovoUsuario.escolaMedio.value,
		'senha': dadosNovoUsuario.senha.value,
		'resenha': dadosNovoUsuario.resenha.value
	};

	return dadosParaEnvio;
}

const enviarDados = function (dadosNovoUsuario) {
	const url = 'http://' + host + '/api/registro/cadastrar';

	$.ajax({
		type: "POST",
		url: url,
		dataType: 'json',
		data: prepararDados(dadosNovoUsuario),
		beforeSend: function (xhr) {
			xhr.setRequestHeader("Authorization", "Basic " + btoa(user + ":" + pass));
		},
		success: function (retorno){
			window.alert(retorno.mensagem);
			$(formView).submit();
		},
		error: function (response){
			////	error
		}
	});
};

const concluirCadastro = function () {
	const validacao = validarFormulario();

	if(validacao.mensagemErro > "")
		alert(validacao.mensagemErro);
	else 
		enviarDados(validacao.dadosNovoUsuario);
};

botaoEnviar.addEventListener('click', concluirCadastro);

function simulaFormPreenchido(){
	$( "#NomeCompleto" ).val( "JOAO TESTE" );
	$( "#CPF" ).val( "999.999.999-99" );
	$( "#DataNascimento" ).val( "01/01/1997" );
	$( "#UsuarioEtnia" ).val( 11 );
	$( "#UsuarioGenero" ).val( 13 );
	$( "#UsuarioTelefone" ).val( "(99) 9 9999-9999" );
	$( "#UsuarioEscolaridade" ).val( 17 );
	$( "#CEP" ).val( "99999-999" );
	$( "#Logradouro" ).val( "RUA TESTE" );
	$( "#Numero" ).val( 99 );
	$( "#Complemento" ).val( "APTO TESTE" );
	$( "#Bairro" ).val( "BAIRRO TESTE" );
	$( "#Cidade" ).val( "CIDADE TESTE" );
	$( "#EmailAdress" ).val( "email@email.com" );
	$( "#TipoUsuario" ).val( 7 );
	$( "#Disciplinas" ).val( [1, 2, 3 ] );
	$( "#EscolaEnsinoMedio" ).val( "EMEIEF" );
}////simulaFormPreenchido();