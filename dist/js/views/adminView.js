const abaUsuariosSemAcesso = document.getElementById('UsuariosSemAcessoTittle');
const abaUsuariosAtivos = document.getElementById('UsuariosAtivosTittle');
const abaAulasDadas = document.getElementById('AulasDadasTittle');
const abaAulasAssistidas = document.getElementById('AulasAssistidasTittle');
const abaOpcoesRegistro = document.getElementById('OpcoesRegistroTittle');

const carregando = document.getElementById('carregando');
const conteudo = document.getElementById('conteudo');

let tabelaConteudo = null;

const ativar = function (id) {
    alert('ativar' + id);
};

const consultarServidor = function (dadosParaConsulta) {
    $(carregando).removeClass('hide');
    const url = 'http://' + host + '/api/admin/consultar';
	$.ajax({
		type: "POST",
		url: url,
		dataType: 'json',
		data: dadosParaConsulta,
		beforeSend: function (xhr) {
			xhr.setRequestHeader("Authorization", "Basic " + btoa(user + ":" + pass));
		},
		success: function (retorno){
            mostrarConteudo(retorno.titulosColunas, retorno.payload);
            $(carregando).addClass('hide');
        },
		error: function (response){
            $(carregando).addClass('hide');
			////	error
		}
	});
};

const criarTabela = function (nomeTabela, classes) {
    if(tabelaConteudo)
        $(tabelaConteudo).remove();
        
    tabelaConteudo = document.createElement('table');
    $(tabelaConteudo).attr('id', nomeTabela);
    $(tabelaConteudo).addClass(classes);
};

const mostrarConteudo = function (titulosColunas, payload) {
    conteudo.innerHTML = "";
    conteudo.appendChild(tabelaConteudo);
    $(tabelaConteudo).DataTable({
        'columns': titulosColunas,
        'data': payload,
        'scrollX':        true,
        'scrollY':        "300px",
        'paging':         false
    }).draw();
};

const listarUsuariosSemAcesso = function () {
    criarTabela('usuariosSemAcesso', 'ui orange very compact table');
    consultarServidor({'operacao': 'consultarUsuariosSemAcesso'});
}

const listarUsuariosAtivos = function () {
    criarTabela('usuariosAtivos', 'ui purple very compact celled table');
    mostrarConteudo(
        [
            {'title': 'amor é fogo que arde sem se ver'}
        ],
        [
            ['cccc'], 
            ['dddd']
        ]
    );
}

abaUsuariosSemAcesso.addEventListener('click', listarUsuariosSemAcesso);
abaUsuariosAtivos.addEventListener('click', listarUsuariosAtivos);
// abaAulasDadas.addEventListener('click', mostrarAulasDadas);
// abaAulasAssistidas.addEventListener('click', mostrarAulasAssistidas);
// abaOpcoesRegistro.addEventListener('click', mostrarOpcoesRegistro);

listarUsuariosSemAcesso();