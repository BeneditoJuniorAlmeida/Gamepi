<?php

ini_set('post_max_size', '8M');
ini_set('upload_max_filesize', '8M');

require("../_app/Config.inc.php");

session_start();


if (isset($_SESSION['nome']) && !empty($_SESSION['nome'])) {
    $info = explode("&", $_SESSION['nome']);
}

/* ------------------ Verificando qual formulário foi enviado ------------------- */

//$teste = "{$_FILES['audio']['name']}";

/* ------------------ Recuperando dados do formulário pergunta-tato --------------- */

$Dados['pergunta'] = $_POST['pergunta'];
$Dados['descricao_resposta'] = trim(strtolower($_POST['descricao']));
$Dados['id_usuario'] = $info[2];
$Dados['id_imagem_op_a'] = $_POST['opcao'];
$Dados['tato_ou_ouvinte'] = $_POST['ouvinte'];


if ((isset($_FILES['aud_pergunta']) && $_FILES['aud_pergunta']['size'] > 0)) :
    $path = "../upload/pergunta";
    $upload_audio = new Upload($path);
    $upload_audio->Media($_FILES['aud_pergunta'],  md5($_POST['pergunta'] . date('Y/m/d H:m:s')));
    $Dados['url_pergunta'] = $upload_audio->getResult(); 
endif;


if ((isset($_FILES['aud_ajuda']) && $_FILES['aud_ajuda']['size'] > 0)) :
    $path = "../upload/pergunta";
    $upload_audio = new Upload($path);
    $upload_audio->Media($_FILES['aud_ajuda'],  md5($_FILES['aud_ajuda']["size"] . date('Y/m/d H:m:s')));
    $Dados['url_audio'] = $upload_audio->getResult(); 
endif;


$pergunta = new DaoPergunta();
$pergunta->createPergunta($Dados);
if ($pergunta->getResult()) :
    echo TAG_SUCCESS;
else :  
    echo TAG_ERROR;
endif;
