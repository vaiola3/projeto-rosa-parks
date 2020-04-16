const botaoSair          = document.getElementById('botaoSair');
const inputLogoutSession = document.getElementById('LogOutSession');
const formView           = document.getElementById('FormView');

const logOut = function () {
    inputLogoutSession.value = 'true';
    $(formView).submit();
};

botaoSair.addEventListener('click', logOut);

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