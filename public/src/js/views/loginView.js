const btnNovoUsuario = document.getElementById('btnNovoUsuario');
const nomeAutor   = document.getElementById('nomeAutor');

btnNovoUsuario.addEventListener('click', function (evento) {
	criarNovoRegistro();
})

function criarNovoRegistro(){
	$('#getNewRegister').val('true');
   	$('#FormView').submit();
}

function loginWithUserTest(){
	$('#EmailUsuario').val('email@email.com');
	$('#SenhaUsuario').val('123');
}	////loginWithUserTest();

nomeAutor.addEventListener('click', function () {
    window.open("https://github.com/vaiola3/projeto-rosa-parks",'_blank');
});