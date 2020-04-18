const abaUsuariosSemAcesso = document.getElementById('UsuariosSemAcessoTittle');
const abaUsuariosAtivos = document.getElementById('UsuariosAtivosTittle');
const abaAulasDadas = document.getElementById('AulasDadasTittle');
const abaAulasAssistidas = document.getElementById('AulasAssistidasTittle');
const abaOpcoesRegistro = document.getElementById('OpcoesRegistroTittle');

const conteudoUsuariosSemAcesso = document.getElementById('UsuariosSemAcesso');
const conteudoUsuariosAtivos = document.getElementById('UsuariosAtivos');
const conteudoAulasDadas = document.getElementById('AulasDadas');
const conteudoAulasAssistidas = document.getElementById('AulasAssistidas');
const conteudoOpcoesRegistro = document.getElementById('OpcoesRegistro');

let conteudoAtual = null;

const mostrarConteudo = function (novoConteudo) {
    if(conteudoAtual)
        $(conteudoAtual).addClass('hide');

    $(novoConteudo).removeClass('hide');

    conteudoAtual = novoConteudo;
};

const mostrarUsuariosSemAcesso = function () { mostrarConteudo(conteudoUsuariosSemAcesso); }
const mostrarUsuariosAtivos = function () { mostrarConteudo(conteudoUsuariosAtivos) };
const mostrarAulasDadas = function () { mostrarConteudo(conteudoAulasDadas); }
const mostrarAulasAssistidas = function () { mostrarConteudo(conteudoAulasAssistidas); }
const mostrarOpcoesRegistro = function () { mostrarConteudo(conteudoOpcoesRegistro); }

abaUsuariosSemAcesso.addEventListener('click', mostrarUsuariosSemAcesso);
abaUsuariosAtivos.addEventListener('click', mostrarUsuariosAtivos);
// abaAulasDadas.addEventListener('click', mostrarAulasDadas);
// abaAulasAssistidas.addEventListener('click', mostrarAulasAssistidas);
// abaOpcoesRegistro.addEventListener('click', mostrarOpcoesRegistro);

mostrarUsuariosSemAcesso();

// $('#TableUsuariosAtivos').DataTable( {
//     dom: 'Bfrtip',
//         buttons: [
//             'copy', 'excel', 'pdf', 'print'
//         ]
// } );