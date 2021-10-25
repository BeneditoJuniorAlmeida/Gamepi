<?php

if (!empty($URL[1]) && is_numeric($URL[1])) :
    $id = $URL[1];

else :
    header('location:' . URL_RAIZ . '/404');
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
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i></i> Gerar arquivo excel</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="<?= URL_RAIZ ?>/home">Home</a></li>
                            <li><i class="fa bar-chart"></i>Desempenho</li>

                        </ol>
                    </div>
                </div>


                <table id="tabela" class="table table-hover table-striped" data-url="<?= URL_RAIZ ?>/resources/dataTables_traducao.txt">
                    <thead id="thead" data-url="<?= URL_RAIZ ?>/manipulacao/controle-formulario.php">
                        <tr>
                            <th> Status reposta</th>
                            <th> Pergunta</th>
                            <th> Código do quiz</th>
                            <th> Data</th>
                            <th> Nome</th>
                        </tr>
                    </thead>
                    <tbody id="tbody" data-url="<?= URL_RAIZ ?>/excelDesempenho">
                        <?php

                        $daoDados = new DaoGeraGrafico();

                        $daoDados->dadosExcel(array('id_quiz' => $id));
                        if ($daoDados->getRowCount() > 0) {
                            foreach ($daoDados->getResult() as $dados) :
                        ?>
                                <tr>
                                    <td class="jus" data-id="<?= $dados['id_desempenho']; ?>"> <?= $dados['status_resposta'] ?></td>
                                    <td class="jus"> <?= $dados['pergunta'] ?> </td>
                                    <td class="jus"> <?= $dados['cod_quiz'] ?> </td>
                                    <td class="jus"> <?= $dados['data_desem'] ?> </td>
                                    <td class="jus"> <?= $dados['nome'] ?> </td>

                                </tr>


                        <?php
                            endforeach;
                        }

                        ?>

                    </tbody>


                </table>
                <tr class="jus">
                    <a href="<?= URL_RAIZ ?>/planilha/<?=$id?>"><button type='button' class='btn btn-primary'>Gerar Excel</button></a>

                </tr>

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
<!-- dataTable-->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- Funões da página -->
<script src="<?= URL_RAIZ ?>/manipulacao/controler-js/view.js"></script>
<script src="<?= URL_RAIZ ?>/manipulacao/controler-js/tabela-refrash.js"></script>
<script src="<?= URL_RAIZ ?>/manipulacao/controler-js/refresh-atualizar.js"></script>
<!--ajax-->


</html>