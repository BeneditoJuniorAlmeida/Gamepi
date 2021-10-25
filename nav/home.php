<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <title>Home</title>

    <!-- Bootstrap CSS -->
    <link href="<?= URL_RAIZ ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?= URL_RAIZ ?>/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?= URL_RAIZ ?>/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?= URL_RAIZ ?>/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="icon" href="<?= URL_RAIZ ?>/img/icons/gemepiicon02.png">
    <!-- Custom styles -->
    <link href="<?= URL_RAIZ ?>/css/widgets.css" rel="stylesheet">
    <link href="<?= URL_RAIZ ?>/css/dashboard.css" rel="stylesheet">
    <link href="<?= URL_RAIZ ?>/css/style.css" rel="stylesheet">
    <link href="<?= URL_RAIZ ?>/css/style-responsive.css" rel="stylesheet" />
    <link href="<?= URL_RAIZ ?>/css/xcharts.min.css" rel=" stylesheet">
    <link href="<?= URL_RAIZ ?>/css/jquery-ui-1.10.4.min.css" rel="stylesheet">


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
                <!--overview start-->

                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="<?= URL_RAIZ ?>/home">Home</a></li>
                            <li><i class="fa fa-laptop"></i>Dashboard</li>
                        </ol>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <div class="card-box bg-blue">
                                <div class="inner">
                                    <h3> </h3>
                                    <p>Desempenho</p>
                                    <br><br><br>
                                </div>
                                <div class="icon">

                                </div>
                                <a href="<?= URL_RAIZ ?>/desempenho" class="card-box-footer">Desempenho estimulo <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">
                            <div class="card-box bg-green">
                                <div class="inner">
                                    <h3> </h3>
                                    <p> Gerar excel</p>
                                    <br><br><br>
                                </div>
                                <div class="icon">
                                </div>
                                <a href="<?= URL_RAIZ ?>/excelDesempenho" class="card-box-footer">Dados desempenho <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!--  <div class="form-group">
                        <div class="col-sm-4">
                            <div class="card-box bg-cinza">
                                <div class="inner">
                                    <h3> </h3>
                                    <p> Desempenho </p>
                                    <br><br><br>
                                </div>
                                <div class="icon">

                                </div>
                                <a href="<?= URL_RAIZ ?>/desempenho-2" class="card-box-footer">Desempenho estimulo <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>-->


                </div>
            </section>


        </section>
        <!--modal-->
        <?php include './inc/modal-perfil.php' ?>
    </section>
    <!-- javascripts -->
    <script src="<?= URL_RAIZ ?>/js/jquery.js"></script>
    <script src="<?= URL_RAIZ ?>/js/jquery-2.2.4.min.js"></script>
    <script src="<?= URL_RAIZ ?>/js/jquery.matchHeight.min.js"></script>
    <!-- bootstrap -->
    <script src="<?= URL_RAIZ ?>/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <!--custome script for all page-->
    <script src="<?= URL_RAIZ ?>/js/scripts.js"></script>
    <script src="<?= URL_RAIZ ?>/js/jquery.scrollTo.min.js"></script>
    <script src="<?= URL_RAIZ ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?= URL_RAIZ ?>/js/main.js"></script>
    <!--custome script for all page-->
    <script>
        //custom select box
        $(function() {
            $('select.styled').customSelect();
        });
    </script>
</body>

</html>