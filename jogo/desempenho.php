<?php


require '../_app/Config.inc.php';


if ($_REQUEST['action'] == "set_dados") {

    $id_paciente = $_POST['id_paciente'];
    $id_pergunta = $_POST['id_pergunta'];
    $id_quiz = $_POST['id_quiz'];
    $op_marcada = $_POST['op_marcada'];
    $status_resposta = $_POST['status_resposta'];
    $tempo_resposta = $_POST['tempo_resposta'];
    $link = $_POST['link'];
   
    $daoDesempenho = new DaoDesempenho();
    $daoDesempenho->createDesempenho(array('id_paciente' => $id_paciente, 'id_pergunta' => $id_pergunta, 'id_quiz' => $id_quiz, 'op_marcada' => $op_marcada,  'status_resposta' => $status_resposta,  'tempo_resposta' => $tempo_resposta));
    if ($daoDesempenho->getResult()) {
        echo "Está funcionando";
    } else {
        echo "Não está funcionando";
    }
}
