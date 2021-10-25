<?php

require("../_app/Config.inc.php");
/* ------------------Recuperando dados do ajax--------------- */
$selecao = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
/* ------------------ Verificando qual formulário foi enviado ------------------- */
session_start();

switch ($selecao) {
    case 'confirmacaoNovaSenha':
        $chaveAcesso = $_POST['chave']; // recupera o valor da chave

        $email = $_POST['email'];
        $novaSenha = $_POST['senha'];
        $confirmaSenha = $_POST['confirma-senha'];

        if ($novaSenha == $confirmaSenha) {
            $adm = new DaoUsuario();
            $usuarioID = $adm->validarChaveSeguranca($email, $chaveAcesso);

            if ($usuarioID['id_usuario']) {

                // modifica nova senha para o padrao aceito no banco -> criptografia
                $senhacript = md5($novaSenha);

                // update senha
                $update = array("id_usuario" => $usuarioID['id_usuario'], "senha" => $senhacript);
                $adm->updateUsuario($update);

                // realiza login
                $login = array("nome" => $usuarioID['nome'], "senha" => $novaSenha);
                $adm->validarUsuario($login);

                if ($adm->getResult()) {
                    $_SESSION['logado'] = true;
                    $_SESSION['perfil'] = $adm->getResult()[0]['tipo_usuario'];
                    $_SESSION['nome'] = $usuarioID['nome'] . "&" . $adm->getResult()[0]['email'] . "&" . $adm->getResult()[0]['id_usuario'];
                    echo TAG_SUCCESS;
                }
            } else {
                echo TAG_ERROR;
            }
        } else {
            echo TAG_ACTION;
        }
        break;
}
