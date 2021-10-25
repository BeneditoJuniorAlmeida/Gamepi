<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Questoes Exatas">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <title>pergunta tato</title>

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
    <!-- dataTable-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />

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
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i></i>Perguta Tato</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="<?= URL_RAIZ ?>/home">Home</a></li>
                            <li><i class="fa fa-ey "></i>Ver Conteúdo</li>
                            <li><i class="fa fa-image"></i>Pergunta tato</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="row">
                                <?php include './inc/admin/perfil-pergunta.php' ?>
                                <!--main-->
                            </div>

                            <div class="panel-body">
                                <div class="tab-content">
                                    <div id="pageImagem" class="tab-pane active">
                                        <div class="profile-activity">
                                            <!--  questões cadastradas-->
                                            <table id="tabela" class="table table-hover table-striped" data-url="<?= URL_RAIZ ?>/resources/dataTables_traducao.txt">
                                                <thead id="thead" data-url="<?= URL_RAIZ ?>/manipulacao/controle-formulario.php">
                                                    <tr>
                                                        <th> Pergunta</th>
                                                       
                                                        <th> Opções</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody" data-url="<?= URL_RAIZ ?>/pergunta-tato">
                                                    <?php

                                                    if (isset($_SESSION['nome']) && !empty($_SESSION['nome'])) {
                                                        $info = explode("&", $_SESSION['nome']);
                                                    }

                                                    $usuario_equipe = new DaoAddEquipe();
                                                    $usuario_equipe->showAddEquipe($info[2]);
                                                    $id_equipe = $usuario_equipe->getResult()['tb_equipe_id_equipe'];

                                                    $valor_tato  = 0;

                                                    $daopergunta = new DaoPergunta();
                                                    $daopergunta->showPerguntaUsuarioEquipe(array('id_usuario' => $info[2], 'tb_equipe_id_equipe' => $id_equipe, 'tato_ou_ouvinte' => $valor_tato));
                                                    if ($daopergunta->getRowCount() > 0) {
                                                        foreach ($daopergunta->getResult() as $pergunta) :
                                                            ?>
                                                            <tr>
                                                                <td class="mod" data-id="<?= $pergunta['id_pergunta']; ?>"> <?= $pergunta['pergunta'] ?></td>
                                                              

                                                                <td class="mod">
                                                                    <a><i class="fa fa-eye btn btn-secundare"></i></a>
                                                                    <a><i class="icon_trash_alt btn btn-danger"></i></a>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                        endforeach;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
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
    <?php include './inc/modal-apagar.php' ?>
    <?php include './inc/modal-validacao.php' ?>
    <?php include './inc/modal-confirme.php' ?>
    <?php include './inc/modal-questao.php' ?>
    <?php include './inc/modal-perfil.php' ?>
    <?php include './inc/modal-status.php' ?>
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
<!--custom switch-->
<script src="<?= URL_RAIZ ?>/js/bootstrap-switch.js"></script>
<!-- custome script for all page -->
<script src="<?= URL_RAIZ ?>/js/scripts.js"></script>
<!-- dataTable-->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- Funões da página -->
<script src="<?= URL_RAIZ ?>/manipulacao/controler-js/view.js"></script>
<script src="<?= URL_RAIZ ?>/manipulacao/controler-js/tabela-refrash.js"></script>
<!--ajax-->
<script>
    $(document).ready(function() {
        /*--- Apagar imagem ------*/
        $("#btn-verificar").on("click", function() {
            $("#modalValidacao").modal("toggle");
            $.ajax({
                url: "<?= URL_RAIZ ?>/manipulacao/controle-apagar.php",
                type: "POST",
                data: $("#form-validar").serialize() + "&action=validarPergunta",
                success: function(resultado) {
                    if (resultado == "success") {
                        $("#msg").html("Pergunta excluida com sucesso!");
                        $("#modalAlerta").modal("show");
                    } else if (resultado == "error") {
                        $("#erro").html("Não foi possível realizar esta operação!");
                        $("#modalErro").modal("show");
                    } else if (resultado == "message") {
                        $("#aviso").html("Preencha todos os campos!");
                        $("#modalAviso").modal("show");
                    } else if (resultado == "acao") {
                        $("#erro").html("Usuário inválido!");
                        $("#modalErro").modal("show");
                    }  else if (resultado == "other") {
                        $("#aviso").html("Esta pergunta pertence a outro usuário!");
                        $("#modalAviso").modal("show");
                    } else {
                        $("#aviso").html("Você não pode excluir uma pergunta vinculado a uma quiz!");
                        $("#modalAviso").modal("show");
                    }
                }
            });
            return false;
        });

        /*--- visualizar informações da questão ------*/
        $(document).on('click', '.fa-eye', function() {
            var id_recuperado = $(this).closest('tr').find('td[data-id]').attr('data-id');
            $.ajax({
                url: "<?= URL_RAIZ ?>/manipulacao/controle-formulario.php",
                type: "POST",
                data: "id=" + id_recuperado + "&action=viewPerguntaTato",
                success: function(resultado) {
                    if (resultado) {
                        var retorno = resultado.split("&");
                        $("#msg-quest").html(retorno);
                        $("#modalAlertaQuest").modal("show");
                    } else {
                        $("#erro").html("Não é possivel exibir a pergunta requisitada!");
                        $("#modalErro").modal("show");
                    }
                }
            });
        });

    });
</script>

</html>