const botaoSair   = document.getElementById('botaoSair');
const inputLogout = document.getElementById('LogOutSession');
const formView    = document.getElementById('FormView');
const logoUneafro = document.getElementById('logoUneafro');
const nomeAutor   = document.getElementById('nomeAutor');

const sair = function () {
    inputLogout.value = 'true';
    $(formView).submit();
};

if(botaoSair)
    botaoSair.addEventListener('click', sair);

$('.ui.dropdown').dropdown();
$('.tabular.menu .item').tab();

$('.ui.menu .ui.dropdown').dropdown({
    on: 'hover'
});

$('.ui.modal')
    .modal( {
        blurring: true
     })
;

$('.ui.menu a.item').on('click', function() {   
    $(this)
        .addClass('active')
        .siblings()
        .removeClass('active'); 
})

$('input[type=text]').val (function () {
    return this.value.toUpperCase();
})

logoUneafro.addEventListener('click', function () {
    window.open("https://uneafrobrasil.org/",'_blank');
});

nomeAutor.addEventListener('click', function () {
    window.open("https://github.com/vaiola3/projeto-rosa-parks",'_blank');
});