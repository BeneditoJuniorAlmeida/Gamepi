<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="GAMEPI">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <title>Gerenciar jogo</title>

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
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i></i> Gerenciar jogo</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="<?= URL_RAIZ ?>/home">Home</a></li>
                            <li><i class="icon_grid"></i>Gerenciar jogo</li>
                            <li><i class="fa fa-file-text-o"></i>gerenciar jogo</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Gerenciar jogo
                            </header>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="quiz_id">
                                        Selecione uma pergunta
                                        <span class="obrigatorio">*</span>
                                    </label>

                                    <div class="col-sm-10">
                                        <select class="form-control" id="quiz_id" name="quiz_id" required>
                                            <?php
                                            $daoquiz = new DaoQuiz();
                                            $daoquiz->readQuiz();
                                            if ($daoquiz->getResult() > 0) {
                                                echo '<option></option>';
                                                foreach ($daoquiz->getResult() as $a) {
                                                    if ($quiz['quiz_id'] == $a['id_quiz']) {
                                                        echo "<option selected value='{$a['id_quiz']}'>{$a['cod_quiz']}</option>";
                                                    } else {
                                                        echo "<option value='{$a['id_quiz']}'>{$a['pergunta']}</option>";
                                                    }
                                                }
                                            } else {
                                                echo "<option value=''> -- Nenhum quiz cadastradas -- </option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
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
        $("#quest-quiz").on("click", function() {
            $.ajax({
                url: "<?= URL_RAIZ ?>/manipulacao/controle-formulario.php",
                type: "POST",
                data: $("#form-quiz").serialize() + "&action=gerenciarJogo",
                success: function(resultado) {
                    if (resultado == "success") {
                        document.getElementById("form-quiz").reset();
                        $("#msg").html("Quiz cadastrado com sucesso!");
                        $("#modalAlerta").modal("show");
                    } else if (resultado == "error") {
                        $("#erro").html("Não foi possível realizar esta operação!");
                        $("#modalErro").modal("show");
                    } else {
                        $("#aviso").html("Preencha o campo!");
                        $("#modalAviso").modal("show");
                    }
                }
            });
            return false;
        });
    });

    //gerar quiz
    $(document).ready(function() {
        $("#gerar-quiz").on("click", function() {
            $.ajax({
                url: "<?= URL_RAIZ ?>/manipulacao/controle-formulario.php",
                type: "POST",
                data: $("#form-cria-quiz").serialize() + "&action=gerarQuiz",
                success: function(resultado) {
                    if (resultado == "success") {
                        document.getElementById("form-cria-quiz").reset();
                        $("#msg").html("Quiz gerado com sucesso!");
                        $("#modalAlerta").modal("show");
                    } else if (resultado == "error") {
                        $("#erro").html("Não foi possível realizar esta operação!");
                        $("#modalErro").modal("show");
                    } else {
                        $("#aviso").html("Preencha o campo!");
                        $("#modalAviso").modal("show");
                    }
                }
            });
            return false;
        });
    });
</script>

</html>