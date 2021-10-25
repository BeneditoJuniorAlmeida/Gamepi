<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Projeto Psicologia">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <title>Form Imagem</title>

    <link href="<?= URL_RAIZ ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?= URL_RAIZ ?>/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?= URL_RAIZ ?>/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?= URL_RAIZ ?>/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= URL_RAIZ ?>/css/daterangepicker.css" rel="stylesheet" />
    <link href="<?= URL_RAIZ ?>/css/bootstrap-datepicker.css" rel="stylesheet" />
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
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i></i> Formulário de Imagem</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="<?= URL_RAIZ ?>/home">Home</a></li>
                            <li><i class="fa fa-image  "></i>Imagem</li>
                            <li><i class="fa fa-file-text-o"></i>Formulário Imagem</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Formulário Imagem
                            </header>
                            <div class="panel-body">
                                <form id="form-img" method="post" class="form-horizontal">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="nome_imagem">
                                            Nome da imagem
                                            <span class="obrigatorio">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nome_imagem" id="nome_imagem" class="form-control" placeholder="Nome da imagem">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="imagem">
                                            Imagem
                                            <span class="obrigatorio">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <label>Selecione uma imagem: <input type='file' name='imagem' id='imagem' /></label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="descricao">
                                            Descrição da imagem
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição opcional">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Outros usuarios podem utilizar está imagem ?</label>
                                        <span class="obrigatorio">*</span>
                                        <div class="col-sm-10">
                                            <label for="sim"><input type="radio" name="terceiros_uso" id="sim" value="1" checked /> Sim </label> &nbsp; &nbsp;
                                            <label for="nao"><input type="radio" name="terceiros_uso" id="nao" value="0" /> Não </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="fonte">
                                            Fonte da imagem
                                            <span class="obrigatorio">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="fonte" id="fonte" class="form-control" placeholder="Fonte da imagem (opcional)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button id='btn-img' class='btn btn-primary'><span class='state'>Cadastrar</span></button>
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
    <!-- modais de resultados -->
    <?php include './inc/modal-confirme.php' ?>
    <?php include './inc/modal-sucesso.php' ?>
    <?php include './inc/modal-confirme-atualizar.php' ?>
    <?php include './inc/modal-perfil.php' ?>
    <?php include './inc/modal-aviso.php' ?>
    <?php include './inc/modal-erro.php' ?>
</body>
<!-- javascripts -->
<script src="<?= URL_RAIZ ?>/js/jquery.js"></script>
<script src="<?= URL_RAIZ ?>/js/bootstrap.min.js"></script>
<!-- custome script for all page -->
<script src="<?= URL_RAIZ ?>/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<!-- Aciona os itens do menu -->
<script src="<?= URL_RAIZ ?>/js/jquery.scrollTo.min.js"></script>
<script src="<?= URL_RAIZ ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- jquery ui -->
<script src="<?= URL_RAIZ ?>/js/jquery-ui-1.9.2.custom.min.js"></script>
<!--custom tagsinput-->
<script src="<?= URL_RAIZ ?>/js/jquery.tagsinput.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="<?= URL_RAIZ ?>/js/form-component.js"></script>
<!-- TyniMCE -->
<script src="tinymce/tinymce.min.js"></script>
<!-- Custom select -->
<script src="<?= URL_RAIZ ?>/manipulacao/controler-js/form.js"></script>
<script src="<?= URL_RAIZ ?>/js/bootstrap-switch.js"></script>

<script src="<?= URL_RAIZ ?>/manipulacao/controler-js/refresh-atualizar.js"></script>
<script type="text/javascript">
    /*Recuperando dados do formulario*/
    var working = false;
    $("#btn-img").on("click", function() {
        $('#form-img').submit(function(e) {
            e.preventDefault();
            var name = $('#nome_imagem').val();
            var imagem = $('#imagem').prop('files')[0];
            var descricao = $('#descricao').val();
            var selected = $("input[type='radio'][name='terceiros_uso']:checked");
            var selectedValue = selected.attr("value");
            var fonte = $('#fonte').val();
            if (name != "" && imagem != undefined  && fonte != "") {
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
                form_data.append('nome_imagem', name);
                form_data.append('imagem', imagem);
                form_data.append('descricao', descricao);
                form_data.append('selected', selectedValue);
                form_data.append('fonte', fonte);
                setTimeout(function() {
                    $.ajax({
                        url: "<?= URL_RAIZ ?>/manipulacao/controle-imagem.php",
                        type: 'POST',
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
                                $("#msgSucesso").html("Imagem cadastrada com sucesso!");
                                $("#modalSucesso").modal("show");
                            }
                        }
                    });
                }, 2000);
            } else {
                $("#aviso").html("Preencha os campos requisitados!");
                $("#modalAviso").modal("show");
            }
        });
    });
</script>

</html>