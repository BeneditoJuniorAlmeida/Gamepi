<?php

require("../_app/Config.inc.php");
/* ------------------Recuperando dados do ajax--------------- */
// inclusao manual de bibliotecas | sem autoload
include "../phpMailer/class.phpmailer.php";
include "../phpMailer/class.smtp.php";

$selecao = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
//$selecao = $_POST['action'];
/* ------------------ Verificando qual formulário foi enviado ------------------- */
//echo $selecao;
//exit();
switch ($selecao) {
    case 'recuperarSenha':
        if (isset($_POST['email']) && $_POST['email'] != '') {
            $adm = new DaoUsuario();
            $adm->verificarEmail($_POST['email']);

            if ($adm->getResult()) {
                // informacoes do destinatario
                $usuario_email = $adm->getResult()[0]['email'];
                $chaveAcesso = md5($adm->getResult()[0]['id_usuario'] . $adm->getResult()[0]['senha']);

                // informacoes do remetente
                $ADM = EMAIL_SYSTEM;
                $PASS = PASSWORD_EMAIL_SYSTEM;

                // configuracao do envio de email
                $email = new PHPMailer();
                $email->isSendmail();
                $email->CharSet = 'UTF-8';
                $email->IsSMTP();
                $email->Host = "smtp.gmail.com";
                $email->Port = 465;
                $email->SMTPAuth = true;
                $email->Username = $ADM;
                $email->Password = $PASS;
                $email->SMTPSecure = "ssl";

                $email->SetFrom($ADM, NAME_SYSTEM);
                $email->AddAddress($usuario_email, "Usuário (a)");

                $email->IsHTML();
                $email->Subject = "Redefinir senha";
                $email->Body = 'Caro usuário (a),<br>Recebemos seu pedido de redefinição de senha e para isto disponibilizamos o seguinte link:  <a href="' . URL . '/redefinir-senha.php?chave=' . $chaveAcesso . '">RECUPERAR SENHA</a><br><br>Atenciosamente, Equipe Labex!';

                if ($email->Send()) {
                    echo TAG_SUCCESS_EMAIL;
                } else {
                    echo TAG_ERROR_EMAIL;
                }
            } else {
                echo TAG_ERROR_EMAIL;
            }
        } else {
            echo TAG_MESSAGE;
        }
        break;
}


