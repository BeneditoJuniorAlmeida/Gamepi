<?php
$quiz = NULL;
if (!empty($URL[1]) && is_numeric($URL[1])) :
    /* Recuperando o id do quiz */
    $daoQuiz = new DaoQuiz();
    $daoQuiz->showQuiz($URL[1]);
    $quiz = $daoQuiz->getResult();
    if ($quiz) :
        $aux = true;
    else :
        header('location:' . URL_RAIZ . '/404');
    endif;
else :
    $aux = false;
endif;
?>

<?php
$geraQuiz = NULL;
if (!empty($URL[1]) && is_numeric($URL[1])) :
    /* Recuperando o id do quiz */
    $daoGeraQuiz = new DaoGeraQuiz();
    $daoGeraQuiz->showGeraQuiz($URL[1]);
    $daoGeraQuiz = $daoGeraQuiz->getResult();
    if ($geraQuiz) :
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
    <meta name="description" content="Projeto Psicologia">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <title>Form Quiz</title>

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
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i></i> Formulário Adicionar pergunta ao quiz ouvinte</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="<?= URL_RAIZ ?>/home">Home</a></li>
                            <li><i class="fa fa-gamepad"></i>Quiz</li>
                            <li><i class="fa fa-file-text-o"></i>Formulário Adicionar Pergunta Quiz Ouvinte</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Formulário Quiz
                            </header>

                            <div class="panel-body">
                                <!-- Formulario cad-quiz-->
                                <form id="form-seleciona-quiz" class="form-validate form-horizontal" method="post">
                                    <!-- <input type="hidden" name="id" id="id" value="<?= $quiz['id_quiz'] ? $quiz['id_quiz'] : ""; ?>" /> -->

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="quiz_id">
                                            Selecione um quiz
                                            <span class="obrigatorio">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <select class="form-control" id="quiz_id" name="quiz_id">
                                                <?php
                                                $daogQuiz = new DaoGeraQuiz();
                                                $daogQuiz->readGeraQuiz();
                                                if ($daogQuiz->getResult() > 0) {
                                                    echo '<option></option>';
                                                    foreach ($daogQuiz->getResult() as $a) {
                                                        echo "<option value='{$a['id_quiz']}'>{$a['cod_quiz']}</option>";
                                                    }
                                                } else {
                                                    echo "<option value=''> -- Nenhum quiz cadastradas -- </option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button id="seleciona-quiz" class="btn btn-primary"><span class='state'>Próximo</span></button>
                                        </div>
                                    </div>
                                </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<!-- jquery ui -->
<script src="<?= URL_RAIZ ?>/js/jquery-ui-1.9.2.custom.min.js"></script>
<!--custom tagsinput-->
<script src="<?= URL_RAIZ ?>/js/jquery.tagsinput.js"></script>
<!--custom switch-->
<script src="<?= URL_RAIZ ?>/js/bootstrap-switch.js"></script>
<!-- custome script for all page -->
<script src="<?= URL_RAIZ ?>/js/scripts.js"></script>
<script src="<?= URL_RAIZ ?>/manipulacao/controler-js/refresh-atualizar.js"></script>
<!--ajax-->
<script>
    $(document).ready(function() {
        //gerar quiz
        var working = false;
        $("#seleciona-quiz").on("click", function() {
            $('#form-seleciona-quiz').submit(function(e) {
                e.preventDefault();
                if ($("#quiz_id").val() != "") {
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
                    $.ajax({
                        url: "<?= URL_RAIZ ?>/manipulacao/controle-formulario.php",
                        type: "POST",
                        data: $("#form-seleciona-quiz").serialize() + "&action=testeSelecionaQuiz",
                        success: function(resultado) {
                            if (resultado == "error") {
                                $this.find('button').removeAttr("disabled");
                                $this.removeClass('ok loading');
                                working = false;
                                spinner.removeClass('spinner');
                                $state.html('Cadastrar');
                                spinner.removeClass('spinner');
                                $("#erro").html("Não foi possível realizar esta operação!");
                                $("#modalErro").modal("show");
                            } else {
                                location.href = "<?= URL_RAIZ ?>/add-pergunta-quiz/" + resultado;
                            }
                        }
                    });
                } else {
                    $("#aviso").html("Preencha o campo!");
                    $("#modalAviso").modal("show");
                }
            });
        });

        $("#quest-quiz").on("click", function() {
            $('#form-quiz').submit(function(e) {
                e.preventDefault();
                var valor = $("input[name='aponta_ajuda']:checked").val();
                if (valor == 1) {
                    if ($("#pergunta_id").val() != "" && $("#quiz_id").val() != "" && $("#tempo_resposta").val() != "") {
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
                                data: $("#form-quiz").serialize() + "&action=cadastrarQuiz",
                                success: function(resultado) {
                                    if (resultado == "error") {
                                        $this.find('button').removeAttr("disabled");
                                        $this.removeClass('ok loading');
                                        working = false;
                                        spinner.removeClass('spinner');
                                        $state.html('Cadastrar');
                                        spinner.removeClass('spinner');
                                        $("#erro").html("Não foi possível realizar esta operação!");
                                        $("#modalErro").modal("show");
                                    } else if (resultado == "success") {
                                        $this.find('button').removeAttr("disabled");
                                        $this.removeClass('ok loading');
                                        working = false;
                                        spinner.removeClass('spinner');
                                        $state.html('Cadastrar');
                                        spinner.removeClass('spinner');
                                        $("#msgSucesso").html("Pergunta cadastrada com sucesso!");
                                        $("#modalSucesso").modal("show");
                                    }
                                }
                            });
                        }, 2000);
                    } else {
                        $("#aviso").html("Preencha os campos solicitados!");
                        $("#modalAviso").modal("show");
                    }
                } else {
                    if ($("#pergunta_id").val() != "" && $("#quiz_id").val() != "" && valor != 1) {
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
                                data: $("#form-quiz").serialize() + "&action=cadastrarQuiz",
                                success: function(resultado) {
                                    if (resultado == "error") {
                                        $this.find('button').removeAttr("disabled");
                                        $this.removeClass('ok loading');
                                        working = false;
                                        spinner.removeClass('spinner');
                                        $state.html('Cadastrar');
                                        spinner.removeClass('spinner');
                                        $("#erro").html("Não foi possível realizar esta operação!");
                                        $("#modalErro").modal("show");
                                    } else if (resultado == "success") {
                                        $this.find('button').removeAttr("disabled");
                                        $this.removeClass('ok loading');
                                        working = false;
                                        spinner.removeClass('spinner');
                                        $state.html('Cadastrar');
                                        spinner.removeClass('spinner');
                                        $("#msgSucesso").html("Pergunta cadastrada com sucesso!");
                                        $("#modalSucesso").modal("show");
                                    }
                                }
                            });
                        }, 2000);
                    } else {
                        $("#aviso").html("Preencha os campos solicitados!");
                        $("#modalAviso").modal("show");
                    }
                }
            });
        });

    });

    $("#quiz_id").select2({
        placeholder: "Selecione uma opção",
        allowClear: true
    });
    $("#tempo_resposta").select2({
        placeholder: "Selecione uma opção",
        allowClear: true
    });
</script>

</html>