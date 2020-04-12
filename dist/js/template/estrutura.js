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

function logOut(){
    $( "#LogOutSession" ).val( "true" );
    $( "#FormView" ).submit();
}

$('input[type=text]').val (function () {
    return this.value.toUpperCase();
})