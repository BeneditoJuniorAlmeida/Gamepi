<?php
$add = NULL;
if (!empty($URL[1]) && is_numeric($URL[1])) :
    /* Recuperando o id do quiz */
    $daoAddEquipe = new DaoEquipe();
    $daoAddEquipe->showEquipe($URL[1]);
    $add = $daoAddEquipe->getResult();
    if ($add) :
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
    <meta name="description" content="GAMEPI">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <title>Gerencia de integrantes</title>

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
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i></i> Remover integrante da equipe</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="<?= URL_RAIZ ?>/home">Home</a></li>
                            <li><i class="fa fa-file-text-o"></i>Remover integrante da equipe</li>
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
                                                        <th> Nome do usuário </th>
                                                        <th> E-mail</th>
                                                        <th> Função </th>
                                                        <th> Opção</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody" data-url="<?= URL_RAIZ ?>/form-controle-grupo">
                                                    <?php
                                                    $daoequipe = new DaoEquipe();
                                                    $daoequipe->showUsuarioEquipe($URL[1]);
                                                    if ($daoequipe->getRowCount() > 0) {
                                                        foreach ($daoequipe->getResult() as $equipe) :
                                                            ?>
                                                            <tr>
                                                                <td class="jus" data-id="<?= $equipe['id_usuario']; ?>"> <?= $equipe['nome'] ?></td>

                                                                <td class="jus"> <?= $equipe['email'] ?></td>

                                                                <td class="mod"> <?= $equipe['funcao'] ?></td>

                                                                <td class="mod">
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
    <?php include './inc/modal-assunto.php' ?>
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
        /*--- Apagar Integrante equipe ------*/
        $("#btn-verificar").on("click", function() {
            $("#modalValidacao").modal("toggle");
            $.ajax({
                url: "<?= URL_RAIZ ?>/manipulacao/controle-apagar.php",
                type: "POST",
                data: $("#form-validar").serialize() + "&action=validarRemoveUsuarioEquipe",
                success: function(resultado) {
                   
                     if (resultado == "success") {
                        $("#msg").html("Integrante removido com sucesso!");
                        $("#modalAlerta").modal("show");
                    } else if (resultado == "error") {
                     $("#erro").html("Não foi possível realizar esta operação!");
                         $("#modalErro").modal("show");
                     } else if (resultado == "acao") {
                         $("#erro").html("Usuário inválido!");
                         $("#modalErro").modal("show");
                     }
                }
            });
            return false;
        });
    });
</script>

</html>