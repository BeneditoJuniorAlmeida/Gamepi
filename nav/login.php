<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamepi Login</title>
    <!-- font icon -->
    <link href="<?= URL_RAIZ ?>/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?= URL_RAIZ ?>/css/font-awesome.css" rel="stylesheet" />
    <!-- faveicon -->
    <link rel="icon" href="<?= URL_RAIZ ?>/img/icons/gemepiicon02.png">
    <!-- Bootstrap CSS -->
    <link href="<?= URL_RAIZ ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= URL_RAIZ ?>/css/bootstrap-theme.css" rel="stylesheet">
    <link href="<?= URL_RAIZ ?>/css/login.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="row">
            <img class="img-responsive" src="<?= URL_RAIZ ?>/img/icons/logingemepi02.png" width="300" />
            <form id="l-user" class="login" method="post">
                <p class="title">Login</p>
                <div class="alert-msg"></div>
                <input type="text" name="user" placeholder="Usuário" />
                <i class="fa fa-user"></i>
                <input type="password" name="pass" placeholder="Senha" maxlength="8" size="8" />
                <i class="fa fa-key"></i>
                <div class="mais-infor">
                    <a href="#recuperarSenha" data-toggle="modal">Esqueceu a senha?</a>
                </div>
                <button>
                    <i></i>
                    <span class="state">Entrar</span>
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
            if ($('input[name="user"]').val() !== '' && $('input[name="pass"]').val() !== '') {
                if (working)
                    return;
                working = true;
                var $this = $(this);
                $this.find('button').attr("disabled", "disabled");
                $state = $this.find('button > .state');
                var spinner = $this.find('button > i');
                spinner.addClass('spinner');
                $this.addClass('loading');
                $state.html('Autenticando');
                setTimeout(function() {
                    $.ajax({
                        type: 'POST',
                        url: '<?= URL_RAIZ ?>/manipulacao/controle-login.php',
                        data: $("#l-user").serialize() + "&action=validarLogin",
                        success: function(resultado) {
                            if (resultado == "error") {
                                $this.find('button').removeAttr("disabled");
                                $this.removeClass('ok loading');
                                working = false;
                                spinner.removeClass('spinner');
                                $state.html('Entrar');
                                spinner.removeClass('spinner');
                                $('input[name="user"]').val("");
                                $('input[name="pass"]').val("");
                                $('.msg').empty();
                                $('.alert-msg').append('<b class="msg" >* Login Incorreto!</b>');
                            } else {
                                working = false;
                                window.location.href = "<?= URL_RAIZ ?>/home";
                            }
                        }
                    });
                }, 2000);
            } else {
                $('.msg').empty();
                $('.alert-msg').append('<b class="msg">Por favor, Informe seu Usuário e Senha!</b>');
                $('.login .title').css("margin-bottom", "0");
            }
        });

        $("#btn-redefinir").on("click", function() {
            $("#recuperarSenha").modal("toggle");
            $.ajax({
                url: "<?= URL_RAIZ ?>/manipulacao/controle-redefinir-senha.php",
                type: "POST",
                data: $("#form-redefinir").serialize() + "&action=recuperarSenha",
                success: function(resultado) {
                    if (resultado == "enviado") {
                        $("#msgSucesso").html("Por favor, verifique seu e-mail.");
                        $("#modalSucesso").modal("show");
                    } else if (resultado == "errorEmail") {
                        $("#erro").html("Não foi possível realizar este procedimento!<br>Contate a equipe de desenvolvimento!");
                        $("#modalErro").modal("show");
                    } else if (resultado == "naoExisteEmail") {
                        $("#modalErro").modal("show");
                    } else if (resultado == "message") {
                        $("#aviso").html("Preencha todos os campos!");
                        $("#modalAviso").modal("show");
                    }
                }
            });
            return false;
        });
    });
</script>

</html>