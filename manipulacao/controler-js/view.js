/* ----- exibe o data table e traduz a tabela -----*/
$(document).ready(function () {
    /*Tabelas Gerais*/
    var url = $('#tabela').attr('data-url');
    $('#tabela').DataTable({
        "oLanguage": {
            "sUrl": url
        }
    });

    /*Tabelas para 2 páginas de navegão*/
    var url2 = $('#tabela-analise').attr('data-url');
    $('#tabela-analise').DataTable({
        "oLanguage": {
            "sUrl": url2
        }
    });

    /* ----------- Processo para deletar um dado --------*/
    /*----- chamar modal 1 (modal-apagar.php)------*/
    $(".btn-danger").on("click", function () {
        $("#alert").html("Tem certeza que deseja apagar?");
        $("#modalApagar").modal("show");
    });


    /* ----ao clicar em sim modal-validação é chamado-------*/
    /*----- chamar modal 2 ------*/
    $("#valida").on("click", function () {
        $("#modalValidacao").modal("show");
   });
});

/*---- recupera id para excluir e envia para o formulario do modal de validação ----*/
$(document).ready(function () {
    $(document).on('click', '.btn-danger', function () {
        var id_excluir = $(this).closest('tr').find('td[data-id]').attr('data-id');
        $('#id').val(id_excluir);
    });
});









