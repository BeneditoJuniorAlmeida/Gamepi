<?php

$quiz = NULL;

if (isset($_SESSION['guarda_ids']) && !empty($_SESSION['guarda_ids'])) {
    $ids = explode("&", $_SESSION['guarda_ids']);

    $id_quiz = $ids[0];
    $id_paciente = $ids[1];
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Projeto Psicologia">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <title>Form adicionar recompensa</title>

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
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i></i> Adicionar Recompensa por questão</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="<?= URL_RAIZ ?>/home">Home</a></li>
                            <li><i class="icon_grid"></i>Adicionar Jogador</li>
                            <li><i class="fa fa-file-text-o"></i> Adicionar Jogador</li>
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
                                <form id="form-recompensa" class="form-validate form-horizontal" method="post">
                                    <?php
                                    $daoPacienteQuiz = new DaoPacienteQuiz();
                                    $daoPacienteQuiz->showFullPergunta($id_quiz);
                                    if ($daoPacienteQuiz->getRowCount() > 0) {
                                        $ordem = 0;

                                        foreach ($daoPacienteQuiz->getResult() as $pergunta) :
                                            $ordem++;
                                    ?>
                                            <ul>
                                                <li> <input type="hidden" name="id_quiz" id="id_quiz" value="<?= $id_quiz ? $id_quiz : ""; ?>" /></li>
                                                <li> <input type="hidden" name="id_paciente" id="id_paciente" value="<?= $id_paciente ? $id_paciente : ""; ?>" /></li>
                                            
                                                <div class="inputs row  col-lg-5">
                                                    <li><p>  <?= $ordem ?>°  Pergunta: <input type="hidden" name="id_pergunta" class="id_pergunta" id="id_pergunta<?= $ordem ?>" value="<?= $pergunta['id_pergunta'] ?>"><?= $pergunta['pergunta'] ?></p></li>
                                                </div>
                                                <li class="row">
                                                    <div class="form-group ">
                                                        <div class="col-sm-6">
                                                            <select class="form-control" id="id_recompensa<?= $ordem ?>" name="id_recompensa">
                                                                <?php
                                                                $daoPacienteQuiz = new DaoPacienteQuiz();
                                                                $daoPacienteQuiz->showFullRecompensa($id_paciente);
                                                                if ($daoPacienteQuiz->getRowCount() > 0) {
                                                                    echo '<option></option>';
                                                                    foreach ($daoPacienteQuiz->getResult() as $a) {
                                                                        echo "<option value='{$a['id_recompensa']}'>{$a['url_recompensa']}  -  {$a['descricao']}</option>";
                                                                    }
                                                                } else {
                                                                    echo "<option value=''> -- Nenhuma pergunta cadastrada -- </option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                    <?php
                                        endforeach;
                                    }
                                    ?>
                                    <div>
                                        <div class="col-lg-offset-2 col-lg-2">
                                            <button id="quest-id" class="btn btn-primary"><span class='state'>Adicionar perguntas</span></button>
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
    <?php include './inc/modal-quiz.php' ?>
</body>
<!-- container section end -->
<!-- javascripts -->
<script src=" <?= URL_RAIZ ?>/js/jquery.js"> </script>
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
        var count = <?= $ordem ?>;
        var id_quiz = $("#id_quiz").val();
        var id_paciente = $("#id_paciente").val();
        var ids_perguntas = new Array();
        var ids_recompensas = new Array();
        $("#quest-id").on("click", function() {
            $('#form-recompensa').submit(function(e) {
             
                for (var i = 1; i <= count; i++) {
                    var elem = $("#id_pergunta" + [i]).val();
                    var recom = $("#id_recompensa" + [i]).val();
                   // var recom = $("#id_recompensa option:selected").val();
                    ids_perguntas[i] = elem;
                    ids_recompensas[i] = recom;
                }
        
                e.preventDefault();
                if ($("#id_quiz").val() != "" && $("#id_paciente").val() != "" && $("#id_pergunta").val() != "" && $("#id_recompensa").val() != "") {
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

                    var form_data = new FormData();
                    form_data.append('id_quiz', id_quiz);
                    form_data.append('id_paciente', id_paciente);
                    form_data.append('id_perguntas', ids_perguntas);
                    form_data.append('id_recompensas', ids_recompensas);
                    form_data.append('action', 'CadastrarPerguntaQuiz');
                    setTimeout(function() {
                        $.ajax({
                            url: "<?= URL_RAIZ ?>/manipulacao/controle-formulario.php",
                            type: "POST",
                            contentType: false,
                            processData: false,
                            data: form_data,
                            success: function(resultado) {
                               // alert(resultado);
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
                                    $("#msgSucesso").html("Pergunta adicionado com sucesso!");
                                    $("#modalSucesso").modal("show");

                                }
                            }
                        });
                    }, 1000);
                } else {
                    $("#aviso").html("Preencha os campos solicitados!");
                    $("#modalAviso").modal("show");
                }
                return false;
            });
        });
    });

    $(".form-control").select2({
        placeholder: "Selecione uma pergunta",
        allowClear: true
    });

    $("#id_recompensa").select2({
        placeholder: "Selecione uma recompensa",
        allowClear: true
    });
</script>

</html>