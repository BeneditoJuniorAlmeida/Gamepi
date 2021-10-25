/*---- voltar para página home ----*/
var url = $('#btn-update').attr('data-url');
$("#confirmeAtua").on("click", function () {
    window.location.href = url;
});

// var url = $('#quest-ids').attr('data-url');
// $("#btn-modal-quiz").on("click", function () {
//     window.location.href = url;
// });

$('#sucesso').click(function(){
    location.reload();
});

$('#btn-modal-quiz').click(function () {
    location.reload();
});

/* Relacionado ao o file de apostila*/
$('#sim').on("click", function () {
    document.getElementById('tempo').style.display = 'block';
//    document.getElementById('file-input').innerHTML = block
});

$('#nao').on("click", function () {
    document.getElementById('tempo').style.display = 'none';
});

function desabilitarBotaoCadastro(x) {
    x.prop('disabled', false);
    x.html('Cadastrar');
}



