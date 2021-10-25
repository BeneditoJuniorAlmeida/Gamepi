<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Projeto Psicologia">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <title>Form Pergunta Tato</title>

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
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i></i> Formulário de Pergunta Para Estimulo Tato</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="<?= URL_RAIZ ?>/home">Home</a></li>
                            <li><i class="fa fa-question"></i>Pergunta</li>
                            <li><i class="fa fa-file-text-o"></i>Formulário Pergunta</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Formulário Pergunta Estimulo Tato
                            </header>
                            <div class="panel-body">
                                <form id="form-ouvinte" method="post" class="form-horizontal">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="pergunta">
                                            Pergunta em texto
                                            <span class="obrigatorio">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="pergunta" id="pergunta" class="form-control" placeholder="Adicione a pergunta aqui">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="aud_pergunta">
                                            Pergunta em audio
                                            <span class="obrigatorio">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <label>Selecione um audio: <input type='file' name='aud_pergunta' id='aud_pergunta' /></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="aud_ajuda">
                                            Ajuda em audio                                          
                                        </label>
                                        <div class="col-sm-10">
                                            <label>Selecione um audio: <input type='file' name='aud_ajuda' id='aud_ajuda' /></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="descricao">
                                            Resposta esperada do paciente
                                            <span class="obrigatorio">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição da pergunta">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="opcao">
                                            Opção a ser apresentada
                                            <span class="obrigatorio">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="opcao" name="opcao">
                                                <?php
                                                $terceiro_uso = 1;
                                                if (isset($_SESSION['nome']) && !empty($_SESSION['nome'])) {
                                                    $info = explode("&", $_SESSION['nome']);
                                                }

                                                $daoImagem = new DaoImagem();
                                                $daoImagem->showImagemUsuario(array('terceiros_uso' => $terceiro_uso, 'id_usuario' => $info[2]));
                                                if ($daoImagem->getResult() > 0) {
                                                    echo '<option></option>';
                                                    foreach ($daoImagem->getResult() as $a) {
                                                        echo "<option value='{$a['id_imagem']}'>{$a['nome']}</option>";
                                                    }
                                                } else {
                                                    echo "<option value=''> -- sem imagens cadastradas -- </option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button id="btn-pergunta-ouvinte" class="btn btn-primary"><span class='state'>Cadastrar</span></button>
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
    $(document).ready(function() {
        $("#btn-pergunta-ouvinte").on("click", function() {
            var pergunta = $('#pergunta').val();
            var aud_pergunta = $('#aud_pergunta').prop('files')[0];
            var aud_ajuda = $('#aud_ajuda').prop('files')[0];
            var descricao = $('#descricao').val();
            var opcao = $('#opcao').val();
            var ouvinte = 1;

            if (pergunta != "" && aud_pergunta != undefined && descricao != "" && opcao != "") {
                var botao = $("#btn-pergunta-ouvinte");
                botao.prop('disabled', true);
                $('.state').empty().html('<img class="spiner" src="<?= URL_RAIZ ?>/img/snake_5.gif"/> Aguarde...');
                var form_data = new FormData();
                form_data.append('pergunta', pergunta);
                form_data.append('aud_pergunta', aud_pergunta);
                form_data.append('aud_ajuda', aud_ajuda);
                form_data.append('descricao', descricao);
                form_data.append('opcao', opcao);
                form_data.append('ouvinte', ouvinte);
                setTimeout(function() {
                    $.ajax({
                        url: "<?= URL_RAIZ ?>/manipulacao/controle-ouvinte.php",
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        data: form_data,
                        success: function(resultado) {                           
                           if (resultado == "error") {
                                desabilitarBotaoCadastro(botao);
                                $("#erro").html("Não foi possível realizar esta operação!");
                                $("#modalErro").modal("show");
                            } else if (resultado == "success") {
                                desabilitarBotaoCadastro(botao);
                                $("#msgSucesso").html("Pergunta estimulo de ouvinte cadastrada com sucesso!");
                                $("#modalSucesso").modal("show");
                            }
                        }
                    });
                }, 2000);
            } else {
                $("#aviso").html("Preencha os campos requisitados!");
                $("#modalAviso").modal("show");
            }
            return false;
        });
    });

    $("#opcao").select2({
        placeholder: "Selecione uma opção",
        allowClear: true

    });
</script>

</html>