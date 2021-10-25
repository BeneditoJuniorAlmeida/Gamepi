<?php

require("../_app/Config.inc.php");
/* ------------------Recuperando dados do ajax--------------- */
$selecao = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
/* ------------------ Verificando qual formulário foi enviado ------------------- */
session_start();

switch ($selecao) {
    case 'validarLogin':
        /* ------------------ Recuperando dados do formulário disciplina --------------- */
        $user = $_POST['user'];
        $senha = $_POST['pass'];
        /* ------------------ enviando para o banco --------------- */
        $usuario = new DaoUsuario();
        $usuario->validarUsuario(array('nome' => $user, 'senha' => $senha));
        if ($usuario->getResult()) {
            $_SESSION['logado'] = true;
            $_SESSION['perfil'] = $usuario->getResult()[0]['tipo_usuario'];
            $_SESSION['nome'] = $usuario->getResult()[0]['nome'] . "&" . $usuario->getResult()[0]['email'] . "&" . $usuario->getResult()[0]['id_usuario'];
            echo TAG_SUCCESS;
        } else {
            echo TAG_ERROR;
        }
        break;
}
