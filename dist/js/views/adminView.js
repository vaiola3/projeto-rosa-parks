const abaAlunosSemAcesso = document.getElementById('AlunosSemAcessoTittle');
const abaAlunosAtivos = document.getElementById('AlunosAtivosTittle');
const abaAlunosInativosTittle = document.getElementById('AlunosInativosTittle');

const abaProfessoresSemAcesso = document.getElementById('ProfessoresSemAcessoTittle');
const abaProfessoresAtivos = document.getElementById('ProfessoresAtivosTittle');
const abaProfessoresInativosTittle = document.getElementById('ProfessoresInativosTittle');

const abaUsuariosAtivos = document.getElementById('UsuariosAtivosTittle');

const abaAulasDadas = document.getElementById('AulasDadasTittle');
const abaAulasAssistidas = document.getElementById('AulasAssistidasTittle');
const abaOpcoesRegistro = document.getElementById('OpcoesRegistroTittle');

const carregando = document.getElementById('carregando');
const conteudo = document.getElementById('conteudo');

let tabelaConteudo = null;

const alterarStatusUsuario = function (acao, id) {
  $(carregando).removeClass('hide');

  const url = 'http://'+host+'/api/usuario/'+acao+'/'+id;

  $.ajax({
    type: "POST",
    url: url,
    dataType: 'json',
    beforeSend: function (xhr) {
        xhr.setRequestHeader("Authorization", "Basic "+btoa(user+":"+pass));
    },
    success: function (retorno){
      ////  sucesso
    },
    error: function (response){
      ////  erro
    }
  });
};

const ativar = function (id) {
  alterarStatusUsuario('ativar', id);
}

const ativarProfSemAcesso = function (id) {
  ativar(id);
  listarProfessoresSemAcesso();
};

const ativarProfInativo = function (id) {
  ativar(id);
  listarProfessoresInativos();
}

const ativarAlunoSemAcesso = function (id) {
  ativar(id);
  listarAlunosSemAcesso();
};

const ativarAlunoInativo = function (id) {
  ativar(id);
  listarAlunosInativos();
}

const inativar = function (id) {
  alterarStatusUsuario('inativar', id);
};

const inativarAlunoAtivo = function (id) {
  inativar(id);
  listarAlunosAtivos();
};

const inativarProfAtivo = function (id) {
  inativar(id);
  listarProfessoresAtivos();
};

const consultarUsuarios = function (tipo, statusUsuarios) {
  $(carregando).removeClass('hide');

  const url = 'http://'+host+'/api/usuario/consultar/'+tipo+'/'+statusUsuarios;

  $.ajax({
    type: "GET",
    url: url,
    dataType: 'json',
    beforeSend: function (xhr) {
        xhr.setRequestHeader("Authorization", "Basic "+btoa(user+":"+pass));
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
    'scrollX': true,
    'scrollY': "300px",
    'paging': false,
    'dom': 'Bfrtip',
    'buttons': [
        'copy', 'excel', 'pdf', 'print'
    ]
  }).draw();
};

const listarAlunosSemAcesso = function () {
  criarTabela('tabelaAlunosSemAcesso', 'ui orange very compact table');
  consultarUsuarios('alunos', 'aguardando');
};

const listarAlunosAtivos = function () {
  criarTabela('tabelaAlunosAtivos', 'ui blue very compact table');
  consultarUsuarios('alunos', 'ativos');
};

const listarAlunosInativos = function () {
  criarTabela('tabelaAlunosInativos', 'ui red very compact table');
  consultarUsuarios('alunos', 'inativos');
}

const listarProfessoresSemAcesso = function () {
  criarTabela('tabelaProfessoresSemAcesso', 'ui pink very compact table');
  consultarUsuarios('professores', 'aguardando');
};

const listarProfessoresAtivos = function () {
  criarTabela('tabelaProfessoresAtivos', 'ui purple very compact table');
  consultarUsuarios('professores', 'ativos');
};

const listarProfessoresInativos = function () {
  criarTabela('tabelaProfessoresInativos', 'ui red very compact table');
  consultarUsuarios('professores', 'inativos');
};

abaAlunosSemAcesso.addEventListener('click', listarAlunosSemAcesso);
abaAlunosAtivos.addEventListener('click', listarAlunosAtivos);
abaAlunosInativosTittle.addEventListener('click', listarAlunosInativos);

abaProfessoresSemAcesso.addEventListener('click', listarProfessoresSemAcesso);
abaProfessoresAtivos.addEventListener('click', listarProfessoresAtivos);
abaProfessoresInativosTittle.addEventListener('click', listarProfessoresInativos);

listarAlunosSemAcesso();