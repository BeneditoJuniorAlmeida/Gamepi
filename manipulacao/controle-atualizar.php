<?php

require("../_app/Config.inc.php");
/* ------------------Recuperando dados do ajax--------------- */
$selecao = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
/* ------------------ Verificando qual formulário foi enviado ------------------- */
session_start();

if (isset($_SESSION['nome']) && !empty($_SESSION['nome'])) {
    $info = explode("&", $_SESSION['nome']);
}


switch ($selecao) {
// update paciente 
    case 'updatePaciente':
            /* ------------------ Recuperando dados do formulário disciplina --------------- */
            $id_recebido = $_POST['id'];
            $nome = $_POST['nome'];
            $data_nasc = $_POST['data_nasc'];
            $nome_respon = $_POST['nome_respon'];
            $contato = $_POST['contato'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $diagnostico = $_POST['diagnostico'];

            $daoPaciente = new DaoPaciente();
            $daoPaciente->updatePaciente(array('id_paciente' => $id_recebido, 'nome' => $nome, 'data_nasc' => $data_nasc, 'nome_respon' => $nome_respon, 'contato' => $contato, 'email' => $email, 'senha' => $senha, 'diagnostico' => $diagnostico ));
            if ($daoPaciente->getResult()) {
                echo TAG_SUCCESS;
            } else {
                echo TAG_ERROR;
            }
        break;
}
