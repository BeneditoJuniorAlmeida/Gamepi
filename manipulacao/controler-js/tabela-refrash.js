
/*---- recupera id para excluir ----*/
$(document).ready(function () { // Excluir
    var url = $('#tbody').attr('data-url');
    $("#confirme").on("click", function () {
        window.location.href = url;
    });   
});

$(document).ready(function () { // Excluir
    var url = $('#tbody').attr('data-url');
    $("#confirmeStatus").on("click", function () {
        window.location.href = url;
    });   
});


