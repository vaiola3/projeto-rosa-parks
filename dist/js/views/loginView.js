const btnNovoUsuario = document.getElementById('btnNovoUsuario');

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