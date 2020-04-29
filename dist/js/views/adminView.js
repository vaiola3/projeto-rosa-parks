const abaAlunosSemAcesso = document.getElementById('AlunosSemAcessoTittle');
const abaProfessoresSemAcesso = document.getElementById('ProfessoresSemAcessoTittle');
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

const consultarUsuarios = function (tipo, statusUsuarios) {
    $(carregando).removeClass('hide');

    const url = 'http://' + host + '/api/usuario/consultar/' + tipo + '/' + statusUsuarios;

    $.ajax({
        type: "GET",
        url: url,
        dataType: 'json',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Authorization", "Basic " + btoa(user + ":" + pass));
        },
        success: function (retorno){
            mostrarConteudo(retorno.titulosColunas, retorno.payload);
            $(carregando).addClass('hide');
        },
        error: function (response){
            $(carregando).addClass('hide');
            ////    error
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

const listarAlunosSemAcesso = function () {
    criarTabela('tabelaAlunosSemAcesso', 'ui orange very compact table');
    consultarUsuarios('alunos', 'aguardando');
}

const listarProfessoresSemAcesso = function () {
    criarTabela('tabelaProfessoresSemAcesso', 'ui pink very compact table');
    consultarUsuarios('professores', 'aguardando');
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

abaAlunosSemAcesso.addEventListener('click', listarAlunosSemAcesso);
abaProfessoresSemAcesso.addEventListener('click', listarProfessoresSemAcesso)
abaUsuariosAtivos.addEventListener('click', listarUsuariosAtivos);
// abaAulasDadas.addEventListener('click', mostrarAulasDadas);
// abaAulasAssistidas.addEventListener('click', mostrarAulasAssistidas);
// abaOpcoesRegistro.addEventListener('click', mostrarOpcoesRegistro);

listarAlunosSemAcesso();