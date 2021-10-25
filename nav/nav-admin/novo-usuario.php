<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Questoes Exatas">

    <title>Form Usuário</title>

    <link href="<?= URL_RAIZ ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?= URL_RAIZ ?>/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?= URL_RAIZ ?>/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?= URL_RAIZ ?>/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= URL_RAIZ ?>/css/daterangepicker.css" rel="stylesheet" />
    <link href="<?= URL_RAIZ ?>/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="<?= URL_RAIZ ?>/css/bootstrap-colorpicker.css" rel="stylesheet" />
    <link rel="icon" href="<?= URL_RAIZ ?>/img/icons/gemepiicon02.png">
    <!-- Custom styles -->
    <link href="<?= URL_RAIZ ?>/css/style.css" rel="stylesheet">
    <link href="<?= URL_RAIZ ?>/css/style-responsive.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <!-- container section start -->
    <section id="container" class="">
        <!--header-->
        <?php include './inc/header.php' ?>
        <!--sidebar-->
        <?php include './inc/sidebar.php' ?>
        <!--main-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="icon_profile"></i></i> Novo usuário</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="<?= URL_RAIZ ?>/home">Home</a></li>
                            <li><i class="fa fa-users"></i>Usuários</li>
                            <li><i class="icon_profile"></i>Novo usuário</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Novo usuário
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form id="cad-usuario" class="form-validate form-horizontal" method="get">
                                        <div class="form-group ">
                                            <label for="nome" class="control-label col-lg-2" for="nome">
                                                Nome <span class="obrigatorio">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome de usuário" />
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="email" class="control-label col-lg-2" for="email">
                                                E-mail
                                                <span class="obrigatorio">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="email" class="form-control " id="email" name="email" placeholder="E-mail" />
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="senha" class="control-label col-lg-2" for="senha">
                                                Senha
                                                <span class="obrigatorio">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="password" class="form-control " id="senha" name="senha" placeholder="Senha" maxlength="8" size="8" />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="funcao" class="control-label col-lg-2" for="funcao">
                                                Função do usuário
                                                <span class="obrigatorio">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control " id="funcao" name="funcao" placeholder="Função do usuário" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nivel" class="control-label col-lg-2" for="nivel">
                                                Nivel
                                                <span class="obrigatorio">*</span>
                                            </label>
                                            <div class="col-sm-10">
                                                <select id="nivel" name="nivel" class="form-control" required>;
                                                    <?php
                                                    $daoNivel = new DaoNivel();
                                                    $daoNivel->readNivel();
                                                    if ($daoNivel->getResult() > 0) {
                                                        echo '<option></option>';
                                                        foreach ($daoNivel->getResult() as $nivel) {
                                                            echo "<option value='{$nivel['id_tipo_usuario']}'>{$nivel['permissao']}</option>";
                                                        }
                                                    } else {
                                                        echo "<option value=''> -- sem niveis cadastrados -- </option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button id="quest-usuario" class="btn btn-primary"><span class='state'>Cadastrar</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </section>
    </section>
    <!-- modal resultado -->
    <?php include './inc/modal-confirme.php' ?>
    <?php include './inc/modal-sucesso.php' ?>
    <?php include './inc/modal-confirme-atualizar.php' ?>
    <?php include './inc/modal-perfil.php' ?>
    <?php include './inc/modal-aviso.php' ?>
    <?php include './inc/modal-erro.php' ?>
</body>
<!-- container section end -->
<!-- javascripts -->
<script src="<?= URL_RAIZ ?>/js/jquery.js"></script>
<script src="<?= URL_RAIZ ?>/js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="<?= URL_RAIZ ?>/js/jquery.scrollTo.min.js"></script>
<script src="<?= URL_RAIZ ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- jquery ui -->
<script src="<?= URL_RAIZ ?>/js/jquery-ui-1.9.2.custom.min.js"></script>
<!--custom tagsinput-->
<script src="<?= URL_RAIZ ?>/js/jquery.tagsinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<!--custom switch-->
<script src="<?= URL_RAIZ ?>/js/bootstrap-switch.js"></script>
<!-- custome script for all page -->
<script src="<?= URL_RAIZ ?>/js/scripts.js"></script>
<!-- Custom select -->
<script src="<?= URL_RAIZ ?>/manipulacao/controler-js/form.js"></script>
<script src="<?= URL_RAIZ ?>/js/bootstrap-switch.js"></script>
<script src="<?= URL_RAIZ ?>/manipulacao/controler-js/refresh-atualizar.js"></script>
<!--ajax-->
<script type="text/javascript">
    $(document).ready(function() {
        var working = false;
        $("#quest-usuario").on("click", function() {
            $('#cad-usuario').submit(function(e) {
                e.preventDefault();
                if ($('#nome').val() !== '' && $('#email').val() !== '' && $('#senha').val() !== '' && $('#funcao').val() !== '' && $('#nivel').val() !== '') {
                    if (working)
                        return;
                    working = true;
                    var $this = $(this);
                    $this.find('button').attr("disabled", "disabled");
                    $state = $this.find('button > .state');
                    var spinner = $this.find('button > i');
                    spinner.addClass('spinner');
                    $this.addClass('loading');
                    $state.html('<img class="spiner" src="<?= URL_RAIZ ?>/img/snake_5.gif"/> Aguarde...');
                    setTimeout(function() {
                        $.ajax({
                            url: "<?= URL_RAIZ ?>/manipulacao/controle-formulario.php",
                            type: "POST",
                            data: $("#cad-usuario").serialize() + "&action=cadastrarUsuario",
                            success: function(resultado) {
                                if (resultado == "error") {
                                    $this.find('button').removeAttr("disabled");
                                    $this.removeClass('ok loading');
                                    working = false;
                                    spinner.removeClass('spinner');
                                    $state.html('Cadastrar');
                                    spinner.removeClass('spinner');
                                    $('#erro').html("Não foi possível realizar esta operação!");
                                    $("#modalErro").modal("show");
                                } else if (resultado == "success") {
                                    $this.find('button').removeAttr("disabled");
                                    $this.removeClass('ok loading');
                                    working = false;
                                    spinner.removeClass('spinner');
                                    $state.html('Cadastrar');
                                    spinner.removeClass('spinner');
                                    $("#msgSucesso").html("Usuário cadastrado com sucesso!");
                                    $("#modalSucesso").modal("show");
                                }
                            }
                        });
                    }, 2000);
                } else {
                    $("#aviso").html("Preencha todos os campos!");
                    $("#modalAviso").modal("show");
                }
            });
        });
    });
</script>

</html>