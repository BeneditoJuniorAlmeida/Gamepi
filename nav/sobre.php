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
                        <h3 class="page-header"><i class="icon_info_alt"></i> Sobre</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="<?= URL_RAIZ ?>/home">Home</a></li>
                            <li><i class="icon_info_alt"></i>Sobre</li>
                        </ol>
                    </div>
                </div>

                <section class="about-area section-padding-80">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <img class="displayed" src="<?= URL_RAIZ ?>/img/icons/logingemepi02.png" /><br />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                                <p class="text-center">Equipe de desenvolvimento: </p>
                                <p class="text-center">Benedito Júnior Almeida Leão </p>
                                <p class="text-center">Laciene Alves Melo </p>
                                <p class="text-center">Igor de Pinho Garcia </p>
                                <p class="text-center">Fabricio de Souza Farias </p>
                                <p class="text-center"> Copyright &copy; - <?= date('Y') ?> </p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <img class="displayed" src="<?= URL_RAIZ ?>/img/icons/labex.png" />
                            </div>
                        </div>



                    </div>
                </section>
            </section>
        </section>
        <!--modal-->
        <?php include './inc/modal-perfil.php' ?>
    </section>
    <!-- javascripts -->
    <script src="<?= URL_RAIZ ?>/js/jquery.js"></script>
    <script src="<?= URL_RAIZ ?>/js/jquery-ui-1.10.4.min.js"></script>
    <script src="<?= URL_RAIZ ?>/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="<?= URL_RAIZ ?>/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <!--custome script for all page-->
    <script src="<?= URL_RAIZ ?>/js/scripts.js"></script>
    <script src="<?= URL_RAIZ ?>/js/jquery.scrollTo.min.js"></script>
    <script src="<?= URL_RAIZ ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script>
        //custom select box
        $(function() {
            $('select.styled').customSelect();
        });
    </script>
</body>

</html>