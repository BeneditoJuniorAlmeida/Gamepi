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
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i></i> Formulário de pergunta para estimulo de tato</h3>
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
                                Formulário Pergunta
                            </header>
                            <div class="panel-body">
                                <form id="form-quest" method="post" class="form-horizontal">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="pergunta">
                                            Pergunta
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
                                        <label class="col-sm-2 control-label" for="descricao">
                                            Descrição da reposta
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição da pergunta">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="img_a">
                                            Opção A
                                            <span class="obrigatorio">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="img_a" name="img_a">
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
                                        <label class="col-sm-2 control-label" for="img_b">
                                            Opção B
                                            <span class="obrigatorio">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="img_b" name="img_b">
                                                <?php
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
                                        <label class="col-sm-2 control-label" for="img_c">
                                            Opção C
                                            <span class="obrigatorio">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="img_c" name="img_c">
                                                <?php
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
                                        <label class="col-sm-2 control-label" for="op_correta">
                                            Opção correta
                                            <span class="obrigatorio">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="op_correta" name="op_correta">
                                                <option></option>
                                                <option value="0">A</option>
                                                <option value="1">B</option>
                                                <option value="2">C</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Apontar ajuda ?</label>
                                        <div class="col-sm-10">
                                            <label for="sim"><input type="radio" name="aponta_ajuda" id="sim" value="1" checked /> Sim </label> &nbsp; &nbsp;
                                            <label for="nao"><input type="radio" name="aponta_ajuda" id="nao" value="0" /> Não </label>
                                        </div>
                                    </div>

                                    <div id="tempo" class="form-group">
                                        <label class="col-sm-2 control-label" for="tempo_resposta">
                                            Tempo de ajuda(somente se a opção anteror for sim)
                                            <span class="obrigatorio">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="tempo_resposta" name="tempo_resposta">
                                                <option></option>
                                                <option value="3">Baixo</option>
                                                <option value="5">Médio</option>
                                                <option value="7">Longo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input hidden="true" name="tato" id="tato" value="1">
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button id='btn-pergunta' class='btn btn-primary'><span class='state'>Cadastrar</span></button>
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

<script>
    $(document).ready(function() {
        //gerar quiz  
        $("#btn-pergunta").on("click", function() {

            var pergunta = $('#pergunta').val();
            var aud_ajuda = $('#aud_pergunta').prop('files')[0];
            var descricao = $('#descricao').val();
            var op_a = $('#img_a').val();
            var op_b = $('#img_b').val();
            var op_c = $('#img_c').val();
            var op_correta = $('#op_correta').val();
            var tempo_resposta = $('#tempo_resposta').val();
            var tato = 0;

            var valor = $("input[name='aponta_ajuda']:checked").val();
            if (valor == 1) {
                if (pergunta != "" && aud_ajuda != undefined && descricao != "" && op_a != "" && op_b != "" && op_c != "" && op_correta != "" && tempo_resposta != "") {
                    var botao = $("#btn-pergunta");
                    botao.prop('disabled', true);
                    $('.state').empty().html('<img class="spiner" src="<?= URL_RAIZ ?>/img/snake_5.gif"/> Aguarde...');
                    var form_data = new FormData();
                    form_data.append('pergunta', pergunta);
                    form_data.append('aud_ajuda', aud_ajuda);
                    form_data.append('descricao', descricao);
                    form_data.append('op_a', op_a);
                    form_data.append('op_b', op_b);
                    form_data.append('op_c', op_c);
                    form_data.append('op_correta', op_correta);
                    form_data.append('tempo_resposta', tempo_resposta);
                    form_data.append('aponta_ajuda', 1);
                    form_data.append('ouvinte', tato);

                    setTimeout(function() {
                        $.ajax({
                            url: "<?= URL_RAIZ ?>/manipulacao/controle-pergunta.php",
                            type: 'POST',
                            contentType: false,
                            processData: false,
                            data: form_data,
                            success: function(resultado) {
                                if (resultado == "error") {
                                    desabilitarBotaoCadastro(botao);
                                    $("#erro").html("Não foi possível realizar esta operação!");
                                    $("#modalErro").modal("show");
                                } else if (resultado == "exist") {
                                    desabilitarBotaoCadastro(botao);
                                    $("#aviso").html("Está pergunta já foi adicionada!");
                                    $("#modalAviso").modal("show");
                                } else{
                                    desabilitarBotaoCadastro(botao);
                                    $("#msgSucesso").html("Pergunta adicionado com sucesso!");
                                    $("#modalSucesso").modal("show");
                                }
                            }
                        });
                    }, 2000);
                } else {
                    $("#aviso").html("Preencha os campos requisitados!");
                    $("#modalAviso").modal("show");
                }
            } else if (valor == 0) {
                if (pergunta != "" && aud_ajuda != undefined && descricao != "" && op_a != "" && op_b != "" && op_c != "" && op_correta != "") {
                    var botao = $("#btn-pergunta");
                    botao.prop('disabled', true);
                    $('.state').empty().html('<img class="spiner" src="<?= URL_RAIZ ?>/img/snake_5.gif"/> Aguarde...');
                    var form_data = new FormData();
                    form_data.append('pergunta', pergunta);
                    form_data.append('aud_ajuda', aud_ajuda);
                    form_data.append('descricao', descricao);
                    form_data.append('op_a', op_a);
                    form_data.append('op_b', op_b);
                    form_data.append('op_c', op_c);
                    form_data.append('op_correta', op_correta);
                    form_data.append('tempo_resposta', tempo_resposta);
                    form_data.append('aponta_ajuda', 0);
                    form_data.append('ouvinte', tato);
                    setTimeout(function() {
                        $.ajax({
                            url: "<?= URL_RAIZ ?>/manipulacao/controle-pergunta.php",
                            type: 'POST',
                            contentType: false,
                            processData: false,
                            data: form_data,
                            success: function(resultado) {                              
                                if (resultado == "error") {
                                    desabilitarBotaoCadastro(botao);
                                    $("#erro").html("Não foi possível realizar esta operação!");
                                    $("#modalErro").modal("show");
                                } else if (resultado == "exist") {
                                    desabilitarBotaoCadastro(botao);
                                    $("#aviso").html("Está pergunta já foi adicionada!");
                                    $("#modalAviso").modal("show");
                                } else{
                                    desabilitarBotaoCadastro(botao);
                                    $("#msgSucesso").html("Pergunta adicionado com sucesso!");
                                    $("#modalSucesso").modal("show");
                                }
                            }
                        });
                    }, 2000);
                } else {

                    $("#aviso").html("Preencha os campos requisitados!");
                    $("#modalAviso").modal("show");
                }
            }

            return false;
        });
    });

    $("#pergunta_id").select2({
        placeholder: "Selecione uma assunto",
        allowClear: true
    });
    $("#img_a").select2({
        placeholder: "Selecione uma opção",
        allowClear: true
    });
    $("#img_b").select2({
        placeholder: "Selecione uma opção",
        allowClear: true
    });
    $("#img_c").select2({
        placeholder: "Selecione uma opção",
        allowClear: true
    });
    $("#op_correta").select2({
        placeholder: "Selecione uma opção",
        allowClear: true
    });

    $("#tempo_resposta").select2({
        placeholder: "Selecione uma opção",
        allowClear: true
    });
</script>

</html>