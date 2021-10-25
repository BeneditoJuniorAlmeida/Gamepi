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

/* ------------------ Recuperando dados do formulário disciplina --------------- */

$Dados['nome'] = $_POST['nome_imagem'];
$Dados['descricao'] = $_POST['descricao'];
$Dados['id_usuario'] = $info[2];
$Dados['terceiros_uso'] = $_POST['selected'];
$Dados['fonte'] = $_POST['fonte'];

if ((isset($_FILES['imagem']) && $_FILES['imagem']['size'] > 0)) :
    $path = "../upload/";
    $upload_imagem = new Upload($path);
    $upload_imagem->Image($_FILES['imagem'], md5($_POST['nome_imagem'] . date('Y/m/d H:m:s')), null, 20);
    $Dados['url_imagem'] = $upload_imagem->getResult();
endif;


if ($upload_imagem->getResult()) :
    $imagem = new DaoImagem();
    $imagem->createImagem($Dados);
    if ($imagem->getResult()) :
        echo TAG_SUCCESS;
    else :
        echo TAG_ERROR;
    endif;
else :
    echo TAG_ERROR;
endif;
