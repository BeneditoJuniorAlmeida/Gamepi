<?php

require './_app/Config.inc.php';
session_start();

if (isset($_GET['sair']) && $_GET['sair'] == 'true'):
    session_destroy();
    header("Location:" . URL . "/login");
endif;

$REQUEST_URI = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));

$URL = ($REQUEST_URI != '' ? $REQUEST_URI : 'home');

$URL = array_filter(explode('/', $URL));

$URL[0] = isset($URL[0]) ? $URL[0] : NULL;
$URL[1] = isset($URL[1]) ? $URL[1] : NULL;

if (!empty($_SESSION['logado'])):
    if (is_file('./' . $URL[0] . '.php')):
        include './' . $URL[0] . '.php';
    elseif (is_file('./nav/' . $URL[0] . '.php')):
        include './nav/' . $URL[0] . '.php';
    elseif (!empty($_SESSION['perfil'] && $_SESSION['perfil'] == 1)):
        if (is_file('./nav/nav-admin/' . $URL[0] . '.php')):
            include './nav/nav-admin/' . $URL[0] . '.php';
        endif;
    elseif (!empty($_SESSION['perfil'] && $_SESSION['perfil'] == 2)):
        if (is_file('./nav/nav-usuario/' . $URL[0] . '.php')):
            include './nav/nav-usuario/' . $URL[0] . '.php';
        endif;
        include './404.php';
    endif;
else:
    include './nav/login.php';
endif;

?>