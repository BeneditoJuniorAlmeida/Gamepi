<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="GAMEPI">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <title>Desempenho</title>

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
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i></i> Desempenho</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="<?= URL_RAIZ ?>/home">Home</a></li>
                            <li><i class="fa bar-chart"></i>Desempenho</li>

                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Desempenho
                            </header>
                            <div class="panel-body">
                                <!-- Formulario  gerar-quiz-->
                                <form id="form-get-dados"  class="form-validate form-horizontal" method="post">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="id_quiz">
                                            Selecione um quiz
                                            <span class="obrigatorio">*</span>
                                        </label>
                                        <div class="col-sm-3">
                                            <select class="form-control" id="id_quiz" name="id_quiz">
                                                <?php

                                                if (isset($_SESSION['nome']) && !empty($_SESSION['nome'])) {
                                                    $info = explode("&", $_SESSION['nome']);
                                                }

                                                $daoQuiz = new DaoGeraQuiz();
                                                $daoQuiz->ShowQuizPorEquipe($info[2]);
                                                if ($daoQuiz->getResult() > 0) {
                                                    echo '<option></option>';
                                                    foreach ($daoQuiz->getResult() as $a) {
                                                        echo "<option value='{$a['id_quiz']}'>{$a['cod_quiz']}</option>";
                                                    }
                                                } else {
                                                    echo "<option value=''> -- sem quiz cadastrado -- </option>";
                                                }
                                                ?>
                                            </select>
                                        </div>


                                        </br> </br></br>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button id='get-dados' class='btn btn-primary'><span class='state'>Buscar dados</span></button>
                                            </div>
                                        </div>

                                </form>

                            </div>
                        </section>
                    </div>
                </div>



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
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- js do grafico-->

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
<<script>
    $(document).ready(function() {
        //gerar quiz
        var working = false;
        $("#get-dados").on("click", function() {
      
            $('#form-get-dados').submit(function(e) {
                
                e.preventDefault();
                if ($("#id_quiz").val() != "") {
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
                        url: "<?= URL_RAIZ ?>/manipulacao/controle-select.php",
                        type: "POST",
                        data: $("#form-get-dados").serialize() + "&action=testeSelecionaQuiz",
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
                                location.href = "<?= URL_RAIZ ?>/tabelaExcel/" + resultado;
                            }
                        }
                    });
                } else {
                    $("#aviso").html("Preencha o campo!");
                    $("#modalAviso").modal("show");
                }
            });
        });

      

    });

    $("#id_quiz").select2({
        placeholder: "Selecione uma opção",
        allowClear: true
    });
   
</script>


</html>