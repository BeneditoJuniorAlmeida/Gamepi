<?php

if (!empty($URL[1]) && is_numeric($URL[1])) :
    /* Recuperando o id do quiz */
    $daogQuiz = new DaoGeraQuiz();
    $daogQuiz->showGeraQuiz($URL[1]);
    $quiz = $daogQuiz->getResult();

else :
    header('location:' . URL_RAIZ . '/404');
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
    <link href="<?= URL_RAIZ ?>/css/checkbox.css" rel="stylesheet">
    <link href="<?= URL_RAIZ ?>/css/style-responsive.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />




    <style>
        td {
            position: relative;
        }

        .form-control {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            resize: none;

            /* for column with internal spacing */
            width: 85%;
            height: 85%;
            padding: 0.3rem;
            margin: 0.2rem 0.5rem;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <!-- container section start -->
    <section id="container">
        <!--header-->
        <?php include './inc/header.php' ?>
        <!--sidebar-->
        <?php include './inc/sidebar.php' ?>
        <!--main-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i></i> Formulário Adicionar Pergunta ao Quiz</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="<?= URL_RAIZ ?>/home">Home</a></li>
                            <li><i class="fa fa-gamepad"></i> Quiz </li>
                            <li><i class="fa fa-file-text-o"></i>Formulário Adicionar Pergunta ao Quiz</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Formulário Quiz
                            </header>
                            <div class="main form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text">

                            </div>

                            <div class="main form-group input-group">


                            </div>
                            <div class="panel-body">
                                <!-- Formulario cad-quiz-->
                                <form id="form-add-pergunta-quiz" class="form-validate form-horizontal" method="post">


                                    <input type="hidden" name="id_quiz" id="id_quiz" value="<?= $quiz['id_quiz'] ?>" />


                                    <div id="pergunta_id" class="form-group">


                                        <label class="col-sm-2 control-label" for="pergunta_id">
                                            Selecione uma pergunta
                                            <span class="obrigatorio">*</span>
                                        </label>

                                        <div class='row'>
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="pull-right pull-right-pro"></label>
                                            </div>
                                            <div class='col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                                                <div class='bt-df-checkbox pull-left'>

                                                    <?php

                                                    if (isset($_SESSION['nome']) && !empty($_SESSION['nome'])) {
                                                        $info = explode("&", $_SESSION['nome']);
                                                    }
                                                    $valorSelect = 0;
                                                    $usuario_equipe = new DaoAddEquipe();
                                                    $usuario_equipe->showAddEquipe($info[2]);
                                                    $id_equipe = $usuario_equipe->getResult()['tb_equipe_id_equipe'];

                                                    $daopergunta = new DaoPergunta();
                                                    if ($valorSelect == 0) {
                                                        $daopergunta->showPerguntaUsuarioEquipe(array('id_usuario' => $info[2], 'tb_equipe_id_equipe' => $id_equipe));
                                                    } else if ($valorSelect == 1) {
                                                        $daopergunta->showPerguntaUsuarioEquipeMaiorData(array('id_usuario' => $info[2], 'tb_equipe_id_equipe' => $id_equipe));
                                                    } else if ($valorSelect == 2) {
                                                        $daopergunta->showPerguntaUsuarioEquipeMenoraData(array('id_usuario' => $info[2], 'tb_equipe_id_equipe' => $id_equipe));
                                                    }

                                                    if ($daopergunta->getResult() > 0) {
                                                        foreach ($daopergunta->getResult() as $a) {
                                                    ?>
                                                            <div class='row'>
                                                                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                                                    <div class='i-checks pull-left' id='row'>

                                                                        <?php if ($a['aponta_ajuda']  == 0) { ?>
                                                                            <?php if ($a['op_correta']  == 0) { ?>
                                                                                <div id="verificaCheck">
                                                                                    <label class="container">
                                                                                        <input type="checkbox" id="idCheck<?= $a['id_pergunta'] ?>" value="<?= $a['id_pergunta'] ?>"> <?= $a['pergunta'] ?> - Sem ajuda - Opção correta: A
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                    <!--<input class="inputOrdem" placeholder="Adicione a ordem aqui" rows="5" id="ordem<?= $a['id_pergunta'] ?>"> -->
                                                                                </div>
                                                                            <?php } ?>
                                                                            <?php if ($a['op_correta']  == 1) { ?>
                                                                                <div id="verificaCheck">
                                                                                    <label class="container">
                                                                                        <input type="checkbox" id="idCheck<?= $a['id_pergunta'] ?>" value="<?= $a['id_pergunta'] ?>"> <?= $a['pergunta'] ?> - Sem ajuda - Opção correta: B
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                    <!--<input class="inputOrdem" placeholder="Adicione a ordem aqui" rows="5" id="ordem<?= $a['id_pergunta'] ?>"> -->
                                                                                </div>
                                                                            <?php } ?>
                                                                            <?php if ($a['op_correta']  == 2) { ?>
                                                                                <div id="verificaCheck">
                                                                                    <label class="container">
                                                                                        <input type="checkbox" id="idCheck<?= $a['id_pergunta'] ?>" value="<?= $a['id_pergunta'] ?>"> <?= $a['pergunta'] ?> - Sem ajuda - Opção correta: C
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                    <!--<input class="inputOrdem" placeholder="Adicione a ordem aqui" rows="5" id="ordem<?= $a['id_pergunta'] ?>"> -->
                                                                                </div>
                                                                        <?php }
                                                                        } ?>
                                                                        <?php if ($a['aponta_ajuda'] == 1) { ?>
                                                                            <?php if ($a['op_correta']  == 0 && $a['tempo_ajuda'] == 3) { ?>
                                                                                <div id="verificaCheck">
                                                                                    <label class="container">
                                                                                        <input type='checkbox' id="idCheck<?= $a['id_pergunta'] ?>" value="<?= $a['id_pergunta']  ?>"> <?= $a['pergunta'] ?> - Com ajuda - Opção correta: A - Tempo: Baixo
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                    <!--<input class="inputOrdem" placeholder="Adicione a ordem aqui" rows="5" id="ordem<?= $a['id_pergunta'] ?>"> -->
                                                                                </div>
                                                                            <?php } ?>
                                                                            <?php if ($a['op_correta']  == 0 && $a['tempo_ajuda'] == 5) { ?>
                                                                                <div id="verificaCheck">
                                                                                    <label class="container">
                                                                                        <input type='checkbox' id="idCheck<?= $a['id_pergunta'] ?>" value="<?= $a['id_pergunta'] ?>"> <?= $a['pergunta'] ?> - Com ajuda - Opção correta: A - Tempo: Médio
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                    <!--<input class="inputOrdem" placeholder="Adicione a ordem aqui" rows="5" id="ordem<?= $a['id_pergunta'] ?>"> -->
                                                                                </div>
                                                                            <?php } ?>
                                                                            <?php if ($a['op_correta']  == 0 && $a['tempo_ajuda'] == 7) { ?>
                                                                                <div id="verificaCheck">
                                                                                    <label class="container">
                                                                                        <input type='checkbox' id="idCheck<?= $a['id_pergunta'] ?>" value="<?= $a['id_pergunta'] ?>"> <?= $a['pergunta'] ?> - Com ajuda - Opção correta: A - Tempo: Alto
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                    <!--<input class="inputOrdem" placeholder="Adicione a ordem aqui" rows="5" id="ordem<?= $a['id_pergunta'] ?>"> -->
                                                                                </div>
                                                                            <?php } ?>
                                                                            <?php if ($a['op_correta']  == 1 && $a['tempo_ajuda'] == 3) { ?>
                                                                                <div id="verificaCheck">
                                                                                    <label class="container">
                                                                                        <input type='checkbox' id="idCheck<?= $a['id_pergunta'] ?>" value="<?= $a['id_pergunta'] ?>"> <?= $a['pergunta'] ?> - Com ajuda - Opção correta: B - Tempo: Baixo
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                    <!--<input class="inputOrdem" placeholder="Adicione a ordem aqui" rows="5" id="ordem<?= $a['id_pergunta'] ?>"> -->
                                                                                </div>
                                                                            <?php } ?>
                                                                            <?php if ($a['op_correta']  == 1 && $a['tempo_ajuda'] == 5) { ?>
                                                                                <div id="verificaCheck">
                                                                                    <label class="container">
                                                                                        <input type='checkbox' id="idCheck<?= $a['id_pergunta'] ?>" value="<?= $a['id_pergunta'] ?>"> <?= $a['pergunta'] ?> - Com ajuda - Opção correta: B - Tempo: Médio
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                    <!--<input class="inputOrdem" placeholder="Adicione a ordem aqui" rows="5" id="ordem<?= $a['id_pergunta'] ?>"> -->
                                                                                </div>
                                                                            <?php } ?>
                                                                            <?php if ($a['op_correta']  == 1 && $a['tempo_ajuda'] == 7) { ?>
                                                                                <div id="verificaCheck">
                                                                                    <label class="container" id="verificaCheck">
                                                                                        <input type='checkbox' id="idCheck<?= $a['id_pergunta'] ?>" value="<?= $a['id_pergunta'] ?>"> <?= $a['pergunta'] ?> - Com ajuda - Opção correta: B - Tempo: Alto
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                    <!--<input class="inputOrdem" placeholder="Adicione a ordem aqui" rows="5" id="ordem<?= $a['id_pergunta'] ?>"> -->
                                                                                </div>
                                                                            <?php } ?>
                                                                            <?php if ($a['op_correta']  == 2 && $a['tempo_ajuda'] == 3) { ?>
                                                                                <div id="verificaCheck">
                                                                                    <label class="container" id="verificaCheck">
                                                                                        <input type='checkbox' id="idCheck<?= $a['id_pergunta'] ?>" value="<?= $a['id_pergunta'] ?>"> <?= $a['pergunta'] ?> - Com ajuda - Opção correta: C - Tempo: Baixo
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                    <!--<input class="inputOrdem" placeholder="Adicione a ordem aqui" rows="5" id="ordem<?= $a['id_pergunta'] ?>"> -->
                                                                                </div>
                                                                            <?php } ?>
                                                                            <?php if ($a['op_correta']  == 2 && $a['tempo_ajuda'] == 5) { ?>
                                                                                <div id="verificaCheck">
                                                                                    <label class="container" id="verificaCheck">
                                                                                        <input type='checkbox' id="idCheck<?= $a['id_pergunta'] ?>" value="<?= $a['id_pergunta'] ?>"> <?= $a['pergunta'] ?> - Com ajuda - Opção correta: C - Tempo: Médio
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                    <!--<input class="inputOrdem" placeholder="Adicione a ordem aqui" rows="5" id="ordem<?= $a['id_pergunta'] ?>"> -->
                                                                                </div>
                                                                            <?php } ?>
                                                                            <?php if ($a['op_correta']  == 2 && $a['tempo_ajuda'] == 7) { ?>
                                                                                <div id="verificaCheck">
                                                                                    <label class="container" id="verificaCheck">
                                                                                        <input type='checkbox' id="idCheck<?= $a['id_pergunta'] ?>" value="<?= $a['id_pergunta'] ?>"> <?= $a['pergunta'] ?> - Com ajuda - Opção correta: C - Tempo: Alto
                                                                                        <span class="checkmark"></span>

                                                                                    </label>
                                                                                    <!--<input class="inputOrdem" placeholder="Adicione a ordem aqui" rows="5" id="ordem<?= $a['id_pergunta'] ?>"> -->
                                                                                </div>
                                                                            <?php } ?>
                                                                        <?php } ?>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                    <?php
                                                        }
                                                    } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="col-lg-offset-2 col-lg-2">
                                            <button id="add-pergunta-quiz" class="btn btn-primary"><span class='state'>Adicionar perguntas</span></button>
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
<!--<script src="<?= URL_RAIZ ?>/js/function.js"></script>-->
<script src="<?= URL_RAIZ ?>/manipulacao/controler-js/refresh-atualizar.js"></script>
<!--ajax-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>



<script>
    //var input = $(".inputOrdem");
    // input.hide();
    //var valorOrdem = new Array();

    $(document).ready(function() {
        var working = false;
        $("#add-pergunta-quiz").on("click", function() {
            /*   for (var i = 0; i < valorOrdem.length; i++) {
                   var elem = document.getElementById(valorOrdem[i]).value;

                   valorOrdem[i] = elem;
               }*/

            var id_quiz = <?= $URL[1] ?>;
            var checkeds_questao = new Array();
            $("input[type='checkbox']:checked").each(function() {
                checkeds_questao.push($(this).val());

            });
            if (checkeds_questao.length > 0) {
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
                form_data.append('ids_perguntas', checkeds_questao);
                form_data.append('id_quiz', id_quiz);
                //form_data.append('ordem', valorOrdem);
                form_data.append('action', 'cadastrarQuiz');

                setTimeout(function() {
                    $.ajax({
                        url: "<?= URL_RAIZ ?>/manipulacao/controle-formulario.php",
                        type: "POST",
                        contentType: false,
                        processData: false,
                        data: form_data,
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

    var checkbox = $("#verificaCheck input[type='checkbox']");

    var temp_ids = new Array();

    checkbox.change(function(event) {
        var checkbox = event.target;
        var input = $("#ordem" + $(this).val());
        if (checkbox.checked) {
            temp_ids.push($(this).val());
            console.log(temp_ids);
        } else {
            var index = temp_ids.indexOf($(this).val());
           
            if (index > -1) {
                temp_ids.splice(index, 1);               
            }
            console.log(temp_ids);
        }
    });



    $('input#txt_consulta').quicksearch('form#form-add-pergunta-quiz div#row  div#verificaCheck');
</script>

</html>