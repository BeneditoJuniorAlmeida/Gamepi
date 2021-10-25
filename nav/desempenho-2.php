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
                                <form id="form-get-dados" class="form-validate form-horizontal" method="post">

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
                                                var_dump($daoQuiz->getResult());
                                                if ($daoQuiz->getResult() > 0) {
                                                    echo $info[2];
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

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="id_paciente">
                                                Selecione um paciente
                                                <span class="obrigatorio">*</span>
                                            </label>
                                            <div class="col-sm-3">
                                                <select class="form-control" id="id_paciente" name="id_paciente">

                                                </select>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button id='get-dados' class='btn btn-primary'><span class='state'>Gerar gráfico</span></button>
                                            </div>
                                        </div>

                                </form></br>

                                <!-- Formulario  gerar-grafico-->
                                <form id="form-grafico" class="form-validate form-horizontal" method="post">

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <div id="grafico" style="width:100%; height:450px;"></div>
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
<script>
    $(document).ready(function() {
        var working = false;
        $("#get-dados").on("click", function() {
            $('#form-get-dados').submit(function(e) {
                e.preventDefault();
                if ($('#id_quiz').val() !== '' && $('#id_paciente').val() !== '') {
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
                            url: "<?= URL_RAIZ ?>/manipulacao/controle-select.php",
                            type: "POST",
                            data: $("#form-get-dados").serialize() + "&action=getGrafico2",
                            success: function(resultado) {
                                console.log(resultado);
                                //result = JSON.parse(resultado);
                             //  dadosGrafico(result);

                               /* if (result.tag == "error") {
                                    $this.find('button').removeAttr("disabled");
                                    $this.removeClass('ok loading');
                                    working = false;
                                    spinner.removeClass('spinner');
                                    $state.html('Gerar gráfico');
                                    spinner.removeClass('spinner');
                                    $("#erro").html("Não foi possível realizar esta operação!");
                                    $("#modalErro").modal("show");
                                } else if (result.tag == "success") {
                                    $this.find('button').removeAttr("disabled");
                                    $this.removeClass('ok loading');
                                    working = false;
                                    spinner.removeClass('spinner');
                                    $state.html('Gerar gráfico');
                                    spinner.removeClass('spinner');
                                    $("#msgSucesso").html("Gráfico gerado com sucesso !");

                                }*/
                            }
                        });
                    }, 2000);
                } else {
                    $("#aviso").html("Preencha o campo!");
                    $("#modalAviso").modal("show");
                }
            });
        });
    });



    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('select[id="id_quiz"]').onchange = selecionarClasse;
    }, false);

    function selecionarClasse(event) {
        var id_quiz = document.getElementById("id_quiz").value;
        $.ajax({
            url: "<?= URL_RAIZ ?>/manipulacao/controle-select.php",
            type: "POST",
            data: "id_quiz=" + id_quiz + "&action=filtrar_paciente",
            success: function(resultado) {
               // console.log(resultado);
               aux = resultado;
                if (aux != "neutro") {                 
                    var pacientes = aux.split("|");
                    pacientes.forEach(interacao);
                    document.getElementById("id_paciente").disabled = false;
                } else if( aux == "neutro") {
                    $("#id_paciente option").remove();
                    document.getElementById("id_paciente").disabled = true;
                }
            }
        });
    }

    function interacao(item, index, arr) {
        console.log(item, index, arr);
       // $("#id_paciente option").remove();
        var dados = arr[index].split("&");
        //console.log(dados);
        const select = document.getElementById("id_paciente");
        $(select).append($('<option>', {
            value: dados[0],
            text: dados[1]
        }));
    }

    $("#id_quiz").select2({
        placeholder: "Selecione uma opção",
        allowClear: true
    });

    $("#id_paciente").select2({
        placeholder: "Selecione uma opção",
        allowClear: true
    });
</script>

<script>
    function dadosGrafico(result) {
        console.log(result.mediaGeral);
        Highcharts.chart('grafico', {

            title: {
                text: 'Titulo'
            },

            subtitle: {
                text: 'subtitulo'
            },

            yAxis: {
                title: {
                    text: 'Acertos perguntas/quiz'
                }
            },

            xAxis: {
                accessibility: {
                    rangeDescription: 'Range: 2010 to 2017'
                }
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 0
                }
            },

            series: [{
                name: 'Média do Paciente',
                data: result.mediaGeral
            }, {
                name: 'Média Geral',
                data: result.mediaPaciente

            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    }
</script>

</html>