<?php
$paciente = NULL;
if (!empty($URL[1]) && is_numeric($URL[1])) :
    /* Recuperando o id da questão */
    $daoPaciente = new DaoPaciente();
    $daoPaciente->showPaciente($URL[1]);
    $paciente = $daoPaciente->getResult();
    if ($paciente) :
        $aux = true;
    else :
        header('location:' . URL_RAIZ . '/404');
    endif;
else :
    $aux = false;
endif;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Questoes Exatas">

    <title>Cadastro de paciente</title>

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
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i></i> Formulário Paciente</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="<?= URL_RAIZ ?>/home">Home</a></li>
                            <li><i class="icon_document_alt"></i>Paciente</li>
                            <li><i class="fa fa-file-text-o"></i>Formulário Paciente</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Novo paciente
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form id="cad-paciente" class="form-validate form-horizontal" method="post">
                                        <input type="hidden" name="id" id="id" value="<?= $paciente['id_paciente'] ? $paciente['id_paciente'] : ""; ?>" />
                                        <div class="form-group ">
                                            <label for="nome" class="control-label col-lg-2" for="nome">
                                                Nome <span class="obrigatorio">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="text" name="nome" id="nome" class="form-control" value="<?= $paciente['nome'] ? $paciente['nome'] : ""; ?>" placeholder="Nome da paciente" />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="data_nasc" class="control-label col-lg-2" for="data_nasc">
                                                Data de nascimento
                                                <span class="obrigatorio">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="date" name="data_nasc" id="data_nasc" class="form-control" value="<?= $paciente['data_nasc'] ? $paciente['data_nasc'] : ""; ?>" placeholder="Data de nascimento">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="nome_respon" class="control-label col-lg-2" for="nome_respon">
                                                Nome do responsável
                                                <span class="obrigatorio">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="text" name="nome_respon" id="nome_respon" class="form-control" value="<?= $paciente['nome_respon'] ? $paciente['nome_respon'] : ""; ?>" placeholder="Nome do responsavel">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="contato" class="control-label col-lg-2" for="contato">
                                                Contato
                                                <span class="obrigatorio">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="text" name="contato" id="contato" class="form-control" value="<?= $paciente['contato'] ? $paciente['contato'] : ""; ?>" placeholder="Adicione seu numero de contato">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="email" class="control-label col-lg-2" for="email">
                                                E-mail
                                                <span class="obrigatorio">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="text" name="email" id="email" class="form-control" value="<?= $paciente['email'] ? $paciente['email'] : ""; ?>" placeholder="Adicione seu e-mail aqui">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="senha" class="control-label col-lg-2" for="senha">
                                                Senha
                                                <span class="obrigatorio">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="password" name="senha" id="senha" class="form-control" value="<?= $paciente['senha'] ? $paciente['senha'] : ""; ?>" placeholder="Adicione uma senha para fazer login no aplicativo !">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="diagnostico" class="control-label col-lg-2" for="diagnostico">
                                                Diagnostico
                                                <span class="obrigatorio">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control " id="diagnostico" name="diagnostico" value="<?= $paciente['diagnostico'] ? $paciente['diagnostico'] : ""; ?>" placeholder="Diagnostico do paciente" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <?php
                                                if ($paciente) {
                                                    echo "<button id='btn-update' class='btn btn-primary' data-url='" . URL . "/novo-paciente'><span class='state'>Atualizar</span></button>";
                                                } else {
                                                    echo "<button id='quest-paciente' class='btn btn-primary'><span class='state'>Cadastrar</span></button>";
                                                } ?>
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
    <!-- modais de resultados -->
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

<script type="text/javascript">
    $(document).ready(function() {
        var working = false;
        $("#quest-paciente").on("click", function() {
            $('#cad-paciente').submit(function(e) {
                e.preventDefault();
                if ($('#nome').val() !== '' && $('#data_nasc').val() !== '' && $('#nome_respon').val() !== '' && $('#contato').val() !== '' && $('#email').val() !== '' && $('#senha').val() !== '' && $('#diagnostico').val() !== '') {
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
                            data: $("#cad-paciente").serialize() + "&action=cadastrarPaciente",
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
                                    $("#msgSucesso").html("Paciente cadastrado com sucesso!");
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



        $("#btn-update").on("click", function() {
            $('#cad-paciente').submit(function(e) {
                e.preventDefault();
                if ($('#nome').val() !== '' && $('#data_nasc').val() !== '' && $('#nome_respon').val() !== '' && $('#contato').val() !== '' && $('#email').val() !== '' && $('#senha').val() !== '' && $('#diagnostico').val() !== '') {
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
                            url: "<?= URL_RAIZ ?>/manipulacao/controle-atualizar.php",
                            type: "POST",
                            data: $("#cad-paciente").serialize() + "&action=updatePaciente",
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
                                    $("#msgAtua").html("Paciente atualizada com sucesso!");
                                    $("#modalAlertaAtua").modal("show");
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