<?php

date_default_timezone_set('America/Sao_Paulo');


// CONFIGRAÇÕES DO LOCAL ####################
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBSA', 'gamepi');

// CONFIGRAÇÕES DO SITE ####################
//define('HOST', 'localhost');
//define('USER', 'benedito');
//define('PASS', 'ben10');
//define('DBSA', 'gamepi');

define('TAG_SUCCESS', 'success');
define('TAG_ERROR', 'error');
define('TAG_MESSAGE', 'message');
define('TAG_SUBMIT', 'submit');
define('TAG_ACTION', 'acao');
define('TAG_EXIST', 'exist');
define('TAG_OTHER_USER', 'other');
define('TAG_SUCCESS_EMAIL', 'enviado');
define('TAG_ERROR_EMAIL', 'errorEmail');
define('TAG_EMAIl_SEM_CADASTRO', 'naoExisteEmail');
    
define('URL', 'http://localhost/gamepi');
//define('URL', 'http://projetoslabex.com.br/gamepi');
define('URL_RAIZ','/gamepi');
define('URL_ADMIN', URL.'/admin/');
define('URL_USUARIO', URL.'/usuario/');

define('URL_LOGO', URL . "resources/imgs/Logo1.png");
define('URL_QRCODE', URL . "bibliotecas/qr_code/php/qr_img.php?");
define('NAME_SYSTEM', 'Gamepi');
define('TITLE_COMPANY', 'Labex - Laboratório de programação extrema');
define('EMAIL_SYSTEM', 'painelgamepisuporte@gmail.com');
define('PASSWORD_EMAIL_SYSTEM', 'alfabetasigmapi2gamepi');

// AUTO LOAD DE CLASSES ####################
//function __autoload($Class) {
function customAutoloader($Class) {
    $cDir = ['Conn', 'Dao', 'Entidades', 'Helpers'];
    $iDir = null;

    foreach ($cDir as $dirName):
        if (!$iDir && file_exists(__DIR__ . DIRECTORY_SEPARATOR . "{$dirName}" . DIRECTORY_SEPARATOR . "{$Class}.class.php") && !is_dir(__DIR__ . DIRECTORY_SEPARATOR . "{$dirName}" . DIRECTORY_SEPARATOR . "{$Class}.class.php")):

            include_once (__DIR__ . DIRECTORY_SEPARATOR . "{$dirName}" . DIRECTORY_SEPARATOR . "{$Class}.class.php");

            $iDir = true;

        endif;
    endforeach;

    if (!$iDir):
        trigger_error("Não foi possível incluir {$Class}.class.php", E_USER_ERROR);
        die;
    endif;
}

spl_autoload_register("customAutoloader");

?>
