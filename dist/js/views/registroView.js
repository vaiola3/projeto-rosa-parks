const inputEmail 		= document.getElementById('EmailAdress');
const inputView  		= document.getElementById('CurrentView');
const inputNome  		= document.getElementById('NomeCompleto');
const inputCep   		= document.getElementById('CEP');
const inputLogradouro 	= document.getElementById('Logradouro');
const inputComplemento 	= document.getElementById('Complemento');
const inputBairro 		= document.getElementById('Bairro');
const inputCidade 		= document.getElementById('Cidade');
const inputEscolaMedio  = document.getElementById('InputEscEnsinoMedio');

const selectTipoUsuario = document.getElementById('TipoUsuario');
const selectDisicplinas = document.getElementById('SelectDisciplina');

const botaoEnviar 		= document.getElementById('botaoEnviar');

const validarEnderecoEmail = function () {
	formatToLowerCase(inputEmail);
	const enderecoEmail = inputEmail.value;
	const viewAtual = inputView.value.trim();

	const pEmail = '&EmailAdress=' + enderecoEmail;
	const pMetodo = '&Method=CheckThisEmail';
	const pView = '&CurrentView=' + viewAtual;

	if(enderecoEmail != ""){
		const url = 'http://' + host + '/?RequestFromAjax=true' + pEmail + pMetodo + pView;

		$.get(url, function (data) {
			const retorno = JSON.parse(eval(data));

			console.log(retorno);
			if (!retorno.valido){
				window.alert( "Email já cadastrado anteriormente." );
			}
		});
	}

};

const validarNomeCompleto = function () {
	inputNome.value = valueParaCaixaAlta(inputNome);
};

const validarCep = function () {
	const numeroCep = inputCep.value;
	consultaCep(numeroCep);
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
		$(selectDisicplinas).removeClass('hide');
		$(inputEscolaMedio).addClass('hide');
	} else {
		$(selectDisicplinas).addClass('hide');
		$(inputEscolaMedio).removeClass('hide');
	}
};

inputNome.addEventListener('change', validarNomeCompleto);
inputCep.addEventListener('change', validarCep);
inputLogradouro.addEventListener('change', validarLogradouro);
inputComplemento.addEventListener('change', validarComplemento);
inputBairro.addEventListener('change', validarBairro);
inputCidade.addEventListener('change', validarCidade);
inputEmail.addEventListener('change', validarEnderecoEmail);

botaoEnviar.addEventListener('click', validarFormulario);

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

function appendMessageInputVazio( sNomeCampo, sMensagemErro ){
	if ( (sMensagemErro == "") )
		sMensagemErro += ("Campo " + sNomeCampo + " deve ser preenchido.");
	else
		sMensagemErro += ("\nCampo " + sNomeCampo + " deve ser preenchido.");
	return sMensagemErro;
}

function formatDate( sDate ) {

	var aDate = sDate.split( "/" );

	var day = aDate[0];
	var year = aDate[2];
	var month = aDate[1];

    return [year, month, day].join('-');
}

function validarFormulario(){

	var sNomeCompleto 	= $( "#NomeCompleto" ).val().trim();
	var sCPF 			= $( "#CPF" ).val();
	var sDataNascimento = $( "#DataNascimento" ).val();
	var sEtnia 			= $( "#UsuarioEtnia" ).val();
	var sGenero 		= $( "#UsuarioGenero" ).val();
	var sUserTelefone	= $( "#UsuarioTelefone" ).val();
	var sEscolaridade 	= $( "#UsuarioEscolaridade" ).val();
	var sCEP 			= $( "#CEP" ).val();
	var sLogradouro 	= $( "#Logradouro" ).val().trim();
	var sNumero 		= $( "#Numero" ).val().trim();
	var sComplemento 	= $( "#Complemento" ).val().trim();
	var sBairro 		= $( "#Bairro" ).val().trim();
	var sCidade 		= $( "#Cidade" ).val().trim();
	var sEmailAdress 	= $( "#EmailAdress" ).val().trim();
	var sTipoUsuario 	= $( "#TipoUsuario" ).val();
	var sDisciplinas 	= $( "#Disciplinas" ).val();
	var sEscEnsinoMedio = $( "#EscolaEnsinoMedio" ).val().trim();
	var sUserPassword   = $( "#UserPassword" ).val().trim();
	var sReUserPassword = $( "#ReUserPassword" ).val().trim();

	var sMensagemErro = "";

	if ( (sNomeCompleto == "") || (sNomeCompleto == null) )
		sMensagemErro = appendMessageInputVazio( "NOME COMPLETO", sMensagemErro );
	if ( (sCPF == "") || (sCPF == null) )
		sMensagemErro = appendMessageInputVazio( "CPF", sMensagemErro );
	if ( (sDataNascimento == "") || (sDataNascimento == null) )
		sMensagemErro = appendMessageInputVazio( "DATA NASCIMENTO", sMensagemErro );
	if ( (sEtnia == "") || (sEtnia == null) )
		sMensagemErro = appendMessageInputVazio( "ETNIA", sMensagemErro );
	if ( (sGenero == "") || (sGenero == null) )
		sMensagemErro = appendMessageInputVazio( "GÊNERO", sMensagemErro );
	if ( (sUserTelefone == "") || (sUserTelefone == null) )
		sMensagemErro = appendMessageInputVazio( "WHATSAPP", sMensagemErro );
	if ( (sEscolaridade == "") || (sEscolaridade == null) )
		sMensagemErro = appendMessageInputVazio( "ESCOLARIDADE", sMensagemErro );

	if ( (sCEP == "") || (sCEP == null) )
		sMensagemErro = appendMessageInputVazio( "CEP", sMensagemErro );
	if ( (sLogradouro == "") || (sLogradouro == null) )
		sMensagemErro = appendMessageInputVazio( "LOGRADOURO", sMensagemErro );
	if ( (sNumero == "") || (sNumero == null) )
		sMensagemErro = appendMessageInputVazio( "NÚMERO", sMensagemErro );
	if ( (sBairro == "") || (sBairro == null) )
		sMensagemErro = appendMessageInputVazio( "BAIRRO", sMensagemErro );
	if ( (sCidade == "") || (sCidade == null) )
		sMensagemErro = appendMessageInputVazio( "CIDADE", sMensagemErro );

	if ( (sEmailAdress == "") || (sEmailAdress == null) )
		sMensagemErro = appendMessageInputVazio( "ENDEREÇO EMAIL", sMensagemErro );

	if ( (sTipoUsuario == "") || (sTipoUsuario == null) )
		sMensagemErro = appendMessageInputVazio( "TIPO DE CADASTRO", sMensagemErro );
	if ( (sTipoUsuario == "P") && ((sDisciplinas == "") || (sDisciplinas == null)) )
		sMensagemErro = appendMessageInputVazio( "DISCIPLINAS", sMensagemErro );
	if ( (sTipoUsuario == "A") && ((sEscEnsinoMedio == "") || (sEscEnsinoMedio == null)) )
		sMensagemErro = appendMessageInputVazio( "ESCOLA FORMAÇÃO ENSINO MÉDIO", sMensagemErro );

	if ( (sUserPassword == "") || (sUserPassword == null) )
		sMensagemErro = appendMessageInputVazio( "SENHA", sMensagemErro );

	sUserPassword   = md5( $( "#UserPassword" ).val().trim() );
	sReUserPassword = md5( $( "#ReUserPassword" ).val().trim() );

	var formPreenchido = (sMensagemErro == "");

	if ( ((sCPF != "") && (sCPF != null)) && (sCPF.length != 14)  )
		if ( formPreenchido )
			sMensagemErro += "\nFavor revisar o campo CPF.";

	if ( ((sCEP != "") && (sCEP != null)) && (sCEP.length != 9)  )
		if ( formPreenchido )
			sMensagemErro += "\nFavor revisar o campo CEP.";

	if ( sEmailAdress.indexOf( "@" ) == -1 )
		if ( formPreenchido )
			sMensagemErro += "\nFavor revisar o campo E-Mail.";

	if ( sUserPassword != sReUserPassword )
		if ( formPreenchido )
			sMensagemErro += "\nAs senhas não conferem.";

	if ( sMensagemErro != "" ){
		window.alert( sMensagemErro );
	}
	else{
		$( "#DataNascimento" ).val( formatDate( sDataNascimento ) );
		$( "#UserPassword" ).val( sUserPassword );
		$( "#ReUserPassword" ).val( sReUserPassword );
		$( "#NewRegisterForm" ).val( "true" );
		$( "#FormView" ).submit();
	}
}

function consultaCep(numeroCep){
	const url = 'https://viacep.com.br/ws/' + numeroCep + '/json/';
	$.get(url, function (data) {
		const retorno = eval(data);
		inputLogradouro.value = retorno.logradouro.toUpperCase();
		inputBairro.value = retorno.bairro.toUpperCase();
		inputCidade.value = retorno.localidade.toUpperCase();
	});
}

$( "#Numero" ).mask( "99999999" );
$( "#CEP" ).mask( "99999-999" );
$( "#CPF" ).mask( "999.999.999-99" );
$( "#UsuarioTelefone" ).mask( "(99) 9 9999-9999" );

$( "#DataNascimento" ).mask( "99/99/9999" );

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