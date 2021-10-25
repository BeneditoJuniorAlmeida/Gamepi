<?php

ini_set('post_max_size', '8M');
ini_set('upload_max_filesize', '8M');

require("../_app/Config.inc.php");

session_start();

if (isset($_SESSION['nome']) && !empty($_SESSION['nome'])) {
    $info = explode("&", $_SESSION['nome']);
}


/* ------------------Recuperando dados do ajax--------------- */
//$selecao = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
/* ------------------ Verificando qual formulário foi enviado ------------------- */

//$teste = "{$_FILES['audio']['name']}";

/* ------------------ Recuperando dados do formulário disciplina --------------- */

$pergunta = $_POST['pergunta'];
$desc = $_POST['descricao'];
$info[2];
$a = $_POST['op_a'];
$b = $_POST['op_b'];
$c = $_POST['op_c'];
$opCorreta = $_POST['op_correta'];
$aponta_ajuda = $_POST['aponta_ajuda'];
$tempo_ajuda = $_POST['tempo_resposta'];
$tato_ouvinte = 0;

$usuario_equipe = new DaoUsuario();
$usuario_equipe->showIdEquipe($info[2]);
$id_equipe = $usuario_equipe->getResult()[0]['id_equipe'];
$Daopergunta = new DaoPergunta();
$Daopergunta->showPerguntaIgual(array("pergunta" => $pergunta));

if ((isset($_FILES['aud_ajuda']) && $_FILES['aud_ajuda']['size'] > 0)) :
    $path = "../upload/pergunta";
    $upload_audio = new Upload($path);
    $upload_audio->Media($_FILES['aud_ajuda'],  md5($_POST['pergunta'] . date('Y/m/d H:m:s')), null, 40);
    $url_ajuda = $upload_audio->getResult();

endif;
foreach ($Daopergunta->getResult() as $a) {
    if ($a['pergunta'] == $pergunta) {
        echo TAG_EXIST;
    }
}
if (empty($Daopergunta->getResult())) {

    if ($aponta_ajuda == 0 && $opCorreta == 0) {
        $aponta_ajuda = 0;
        $tempo_ajuda = 0;
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $a, 'id_imagem_op_b' => $b, 'id_imagem_op_c' => $c, 'op_correta' => 0, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => $tempo_ajuda, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));

        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $b, 'id_imagem_op_b' => $c, 'id_imagem_op_c' => $a, 'op_correta' => 2, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => $tempo_ajuda, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));

        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $c, 'id_imagem_op_b' => $a, 'id_imagem_op_c' => $b, 'op_correta' => 1, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => $tempo_ajuda, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
    }
    //parte 2 ok
    if ($aponta_ajuda == 0 && $opCorreta == 1) {
        $aponta_ajuda = 0;
        $tempo_ajuda = 0;
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $a, 'id_imagem_op_b' => $b, 'id_imagem_op_c' => $c, 'op_correta' => 1, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => $tempo_ajuda, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));

        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $b, 'id_imagem_op_b' => $c, 'id_imagem_op_c' => $a, 'op_correta' => 0, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => $tempo_ajuda, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));

        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $c, 'id_imagem_op_b' => $a, 'id_imagem_op_c' => $b, 'op_correta' => 2, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => $tempo_ajuda, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
    }

    //parte 3 ok
    if ($aponta_ajuda == 0 && $opCorreta == 2) {
        $aponta_ajuda = 0;
        $tempo_ajuda = 0;
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $a, 'id_imagem_op_b' => $b, 'id_imagem_op_c' => $c, 'op_correta' => 2, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => $tempo_ajuda, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));

        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $b, 'id_imagem_op_b' => $c, 'id_imagem_op_c' => $a, 'op_correta' => 1, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => $tempo_ajuda, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));

        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $c, 'id_imagem_op_b' => $a, 'id_imagem_op_c' => $b, 'op_correta' => 0, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => $tempo_ajuda, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
    }
    //////////////////////////////////////// #############################

    if ($aponta_ajuda == 1 && $opCorreta == 0) {

        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $a, 'id_imagem_op_b' => $b, 'id_imagem_op_c' => $c, 'op_correta' => 0, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 3, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $a, 'id_imagem_op_b' => $b, 'id_imagem_op_c' => $c, 'op_correta' => 0, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 5, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $a, 'id_imagem_op_b' => $b, 'id_imagem_op_c' => $c, 'op_correta' => 0, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 7, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        ////////---------------------------------------------------------
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $b, 'id_imagem_op_b' => $c, 'id_imagem_op_c' => $a, 'op_correta' => 2, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 3, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $b, 'id_imagem_op_b' => $c, 'id_imagem_op_c' => $a, 'op_correta' => 2, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 5, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $b, 'id_imagem_op_b' => $c, 'id_imagem_op_c' => $a, 'op_correta' => 2, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 7, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        ///////// -----------------------------------------
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $c, 'id_imagem_op_b' => $a, 'id_imagem_op_c' => $b, 'op_correta' => 1, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 3, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $c, 'id_imagem_op_b' => $a, 'id_imagem_op_c' => $b, 'op_correta' => 1, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 5, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $c, 'id_imagem_op_b' => $a, 'id_imagem_op_c' => $b, 'op_correta' => 1, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 7, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
    }

    //////////////////////////////////////// #############################
    if ($aponta_ajuda == 1 && $opCorreta == 1) {

        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $a, 'id_imagem_op_b' => $b, 'id_imagem_op_c' => $c, 'op_correta' => 1, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 3, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $a, 'id_imagem_op_b' => $b, 'id_imagem_op_c' => $c, 'op_correta' => 1, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 5, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $a, 'id_imagem_op_b' => $b, 'id_imagem_op_c' => $c, 'op_correta' => 1, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 7, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        ///////----------------------------------------------------------------
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $b, 'id_imagem_op_b' => $c, 'id_imagem_op_c' => $a, 'op_correta' => 0, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 3, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $b, 'id_imagem_op_b' => $c, 'id_imagem_op_c' => $a, 'op_correta' => 0, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 5, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $b, 'id_imagem_op_b' => $c, 'id_imagem_op_c' => $a, 'op_correta' => 0, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 7, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        ///////----------------------------------------------------------------
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $c, 'id_imagem_op_b' => $a, 'id_imagem_op_c' => $b, 'op_correta' => 2, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 3, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $c, 'id_imagem_op_b' => $a, 'id_imagem_op_c' => $b, 'op_correta' => 2, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 5, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $c, 'id_imagem_op_b' => $a, 'id_imagem_op_c' => $b, 'op_correta' => 2, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 7, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
    }

    //////////////////////////////////////// #############################
    if ($aponta_ajuda == 1 && $opCorreta == 2) {

        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $a, 'id_imagem_op_b' => $b, 'id_imagem_op_c' => $c, 'op_correta' => 2, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 3, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $a, 'id_imagem_op_b' => $b, 'id_imagem_op_c' => $c, 'op_correta' => 2, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 5, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));

        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $a, 'id_imagem_op_b' => $b, 'id_imagem_op_c' => $c, 'op_correta' => 2, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 7, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));

        //--------------------------------------------------
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $b, 'id_imagem_op_b' => $c, 'id_imagem_op_c' => $a, 'op_correta' => 1, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 3, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $b, 'id_imagem_op_b' => $c, 'id_imagem_op_c' => $a, 'op_correta' => 1, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 5, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $b, 'id_imagem_op_b' => $c, 'id_imagem_op_c' => $a, 'op_correta' => 1, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 7, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        //--------------------------------------------------
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $c, 'id_imagem_op_b' => $a, 'id_imagem_op_c' => $b, 'op_correta' => 0, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 3, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $c, 'id_imagem_op_b' => $a, 'id_imagem_op_c' => $b, 'op_correta' => 0, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 5, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
        $Daopergunta->createPergunta(array(
            'pergunta' => $pergunta, 'descricao_resposta' => $desc, 'id_usuario' => $info[2],
            'id_imagem_op_a' => $c, 'id_imagem_op_b' => $a, 'id_imagem_op_c' => $b, 'op_correta' => 0, 'tato_ou_ouvinte' => $tato_ouvinte,
            'aponta_ajuda' => $aponta_ajuda, 'tempo_ajuda' => 7, 'url_audio' => $url_ajuda, 'tb_equipe_id_equipe' => $id_equipe
        ));
    }

    if ($Daopergunta->getResult()) {

        echo TAG_SUCCESS;
    } else {

        echo TAG_ERROR;
    }
}
