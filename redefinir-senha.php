<?php require("./_app/Config.inc.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <!-- font icon -->
    <link href="<?= URL_RAIZ ?>/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?= URL_RAIZ ?>/css/font-awesome.css" rel="stylesheet" />
    <!-- faveicon -->
    <link rel="icon" href="<?= URL_RAIZ ?>/img/icons/icone_exatas.png">
    <!-- Bootstrap CSS -->
    <link href="<?= URL_RAIZ ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?= URL_RAIZ ?>/css/bootstrap-theme.css" rel="stylesheet">
    <link href="<?= URL_RAIZ ?>/css/redefinir-senha.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="row">
            <img class="img-responsive" src="<?= URL_RAIZ ?>/img/icons/logingemepi02.png" width="300" />
            <form id="l-user" class="login" method="post">
                <p class="title">Redefinir Senha</p>
                <input type="hidden" id="chave" name="chave" value="<?php echo $_GET['chave']; ?>" />
                <input type="email" name="email" id="email" placeholder="email" />
                <i class="fa fa-envelope"></i>
                <input type="password" name="senha" id="senha" placeholder="Nova senha" maxlength="8" size="8" />
                <i class="fa fa-key"></i>
                <input type="password" name="confirma-senha" id="confirma-senha" placeholder="Confirma senha" maxlength="8" size="8" />
                <i class="fa fa-key"></i>
                <button>
                    <i></i>
                    <span class="state">Redefinir</span>
                </button>
            </form>
        </div>
    </div>

    <!------------- MODAL ------------------->
    <?php include './inc/modal-recuperar-senha.php' ?>
    <?php include './inc/modal-sucesso.php' ?>
    <?php include './inc/modal-aviso.php' ?>
    <?php include './inc/modal-erro.php' ?>
</body>
<!-- javascripts -->
<script src="<?= URL_RAIZ ?>/js/jquery.js"></script>
<script src="<?= URL_RAIZ ?>/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var working = false;
        $('#l-user').submit(function(e) {
            e.preventDefault();
            if ($('#email').val() !== '' && $('#senha').val() !== '' && $('#confirma-senha').val() !== '') {
                if (working)
                    return;
                working = true;
                var $this = $(this);
                $this.find('button').attr("disabled", "disabled");
                $state = $this.find('button > .state');
                var spinner = $this.find('button > i');
                spinner.addClass('spinner');
                $this.addClass('loading');
                $state.html('Validando');
                setTimeout(function() {
                    $.ajax({
                        type: 'POST',
                        url: "<?= URL_RAIZ ?>/manipulacao/alterar-senha.php",
                        data: $("#l-user").serialize() + "&action=confirmacaoNovaSenha",
                        success: function(resultado) {
                            if (resultado == "error") {
                                $this.find('button').removeAttr("disabled");
                                $this.removeClass('ok loading');
                                working = false;
                                spinner.removeClass('spinner');
                                $state.html('Entrar');
                                spinner.removeClass('spinner');
                                $('#email').val("");
                                $('#senha').val("");
                                $('#confirma-senha').val("");
                                $('#erro').html("Não foi possível realizar esta operação!");
                                $("#modalErro").modal("show");
                            } else if (resultado == "success") {
                                working = false;
                                window.location.href = "<?= URL_RAIZ ?>/home";
                            }
                        }
                    });
                }, 2000);
            } else {
                $("#aviso").html("Preencha os campos solicitados!");
                $("#modalAviso").modal("show");
            }
        });
    });
</script>

</html>