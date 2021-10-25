<?php

require("../_app/Config.inc.php");
/* ------------------Recuperando dados do ajax--------------- */
$selecao = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
/* ------------------ Verificando qual formulário foi enviado ------------------- */
session_start();

if (isset($_SESSION['nome']) && !empty($_SESSION['nome'])) {
    $info = explode("&", $_SESSION['nome']);
}

/* ---- verificar se o perfil de usuário é de administrador --- */
if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 1) {
    $status = 1;
} else {
    $status = 0;
}


switch ($selecao) {

    case 'filtrar_paciente':

        if (isset($_POST['id_quiz']) && $_POST['id_quiz'] != "") {

            $pacienteFilter = new DaoGeraQuiz();
            $pacienteFilter->showPacienteQuiz($_POST['id_quiz']);

            if ($pacienteFilter->getResult() != null) {
                foreach ($pacienteFilter->getResult() as $elemento) {

                    $paciente[] = $elemento['id_paciente'] . "&" . $elemento['nome'];
                }
                $busca_paciente = implode("|", $paciente);
                echo $busca_paciente;
            } else {
                echo "neutro";
            }
        }
        break;

    case 'getGrafico':
        /* ------------------ Recuperando dados do formulário disciplina --------------- */
        $id_quiz = $_POST['id_quiz'];
        $id_paciente = $_POST['id_paciente'];


        //variaveis para gerar estatisca
        $AcertoGeral = 0;
        $ErroGeral = 0;
        $mediaGeral = 0;

        $AcertoPaciente = 0;
        $ErroPaciente = 0;
        $mediaPaciente = 0;

        $daoPaciente = new DaoGeraGrafico();
        $daoPaciente->Grafico(array('id_quiz' => $id_quiz, 'id_paciente' => $id_paciente));

        if ($daoPaciente->getResult()) {

            foreach ($daoPaciente->getResult() as $g) {

                if ($g['id_paciente'] == $id_paciente && $g['status_resposta'] == 1) {
                    $AcertoPaciente++;
                } else if ($g['id_paciente'] == $id_paciente && $g['status_resposta'] == 0) {
                    $ErroPaciente++;
                }


                if ($g['id_paciente'] != $id_paciente && $g['status_resposta'] == 1) {
                    $AcertoGeral++;
                } else if ($g['status_resposta'] == 0) {
                    $ErroGeral++;
                }
            }

            if ($AcertoPaciente != 0) {
                $mediaPaciente = 100 * ($AcertoPaciente / ($AcertoPaciente + $ErroPaciente));
                $mediaGeral = 100 * ($AcertoGeral / ($AcertoGeral + $ErroGeral));


                $grafico['mediaPaciente'] = $mediaPaciente;
                $grafico['mediaGeral'] = $mediaGeral;
                $grafico['nomePaciente'] = $g['nome'];
                $grafico['cod_quiz'] = $g['cod_quiz'];
                $grafico['tag'] = TAG_SUCCESS;
            } else {
                $grafico['tag'] = TAG_ERROR;
            }
        } else {
            $grafico['tag'] = TAG_ERROR;
        }
        echo json_encode($grafico);
        break;

   /* case 'getGrafico2':
       
        $id_quiz = $_POST['id_quiz'];
        $paciente = $_POST['id_paciente'];
        //variaveis para gerar estatisca
        $nome;
        $dados = array();
        $respostaCorreta = 1;
        $respostaIncorreta = 0;

        $qtdAcertos = array();
        $qtdErros = array();
        $mediaAcertos = array();

        $qtdAcertosGerais = array();
        $qtdErrosGerais = array();
        $mediaAcertosGerais = array();

        $cont = 0;
        $daoPaciente = new DaoGeraGrafico();
        $daoPaciente->Grafico2(array('id_quiz' => $id_quiz, 'id_paciente' => $paciente));

        if ($daoPaciente->getResult()) {

            foreach ($daoPaciente->getResult() as $dado) {
                array_push($dados, array(
                    'id_paciente' => $dado['id_paciente'],
                    'id_pergunta' => $dado['id_pergunta'],
                    'id_resposta' => $dado['status_resposta']

                ));

                $cont++;
                $qtdAcertos[$cont] = 0;
                $qtdErros[$cont] = 0;
                $mediaAcertos[$cont] = 0;
                $qtdAcertosGerais[$cont] = 0;
                $qtdErrosGerais[$cont] = 0;
                $mediaAcertosGerais[$cont] = 0;
            }

            //Media do Paciente por questão
            foreach ($dados as $key => $value) {
        
       
                echo "Quantidade de Acertos do paciente = " . $qtdAcertos[$dados[$key]['id_pergunta']] . '<br>';
                 if ($dados[$key]['id_paciente'] == $paciente && $dados[$key]['id_resposta'] == $respostaCorreta) {
                    $qtdAcertos[$dados[$key]['id_pergunta']] += 1;
                    //echo "Quantidade de Acertos do paciente = " . $qtdAcertos[$dados[$key]['id_pergunta']] . '<br>';
                    $nome = $dado['nome'];
                } elseif ($dados[$key]['id_paciente'] == $paciente && $dados[$key]['id_resposta'] == $respostaIncorreta) {
                   // $qtdErros[$dados[$key]['id_pergunta']] += 1;
                     echo "Quantidade de Erros = " . $qtdErros[$dados[$key]['id_pergunta']] . '<br>';
                }

                if ($dados[$key]['id_resposta'] == $respostaCorreta) {
                    //$qtdAcertosGerais[$dados[$key]['id_pergunta']] += 1;
                     echo "Quantidade de Acertos Gerais = " . $qtdAcertosGerais[$dados[$key]['id_pergunta']] . '<br>';
                } elseif ($dados[$key]['id_resposta'] == $respostaIncorreta) {
                   // $qtdErrosGerais[$dados[$key]['id_pergunta']] += 1;
                    echo "Quantidade de Erros Gerais = " . $qtdErrosGerais[$dados[$key]['id_pergunta']] . '<br>';
                }
            }

            foreach ($qtdAcertos as $key => $value) {
                if (($qtdAcertos[$key] + $qtdErros[$key]) != 0) {
                    $mediaAcertos[$key] = $qtdAcertos[$key] / ($qtdAcertos[$key] + $qtdErros[$key]);
                }

                if (($qtdAcertosGerais[$key] + $qtdErrosGerais[$key]) != 0) {
                    $mediaAcertosGerais[$key] = $qtdAcertosGerais[$key] / ($qtdAcertosGerais[$key] + $qtdErrosGerais[$key]);
                }

                $media[] =  $mediaAcertos[$key];
                $mediaGeral[] =  $mediaAcertosGerais[$key];
            }

            $grafico['nome'] = $dado['nome'];
            $grafico['mediaPaciente'] = $media;
            $grafico['mediaGeral'] = $mediaGeral;
            $grafico['tag'] = TAG_SUCCESS;
        } else {
            $grafico['tag'] = TAG_ERROR;
        }

        break;
/*
    case 'dadosExcel':
        /* ------------------ Recuperando dados do formulário disciplina --------------- */

        $id_quiz = $_POST['id_quiz'];

        $daoPaciente = new DaoGeraGrafico();

        $daoPaciente->dadosExcel(array('id_quiz' => $id_quiz));

        if ($daoPaciente->getResult()) {

            echo TAG_SUCCESS;
        } else {

            echo TAG_ERROR;
        }

        break;

    case 'testeSelecionaQuiz':
        $id_quiz = $_POST['id_quiz'];

        if ($id_quiz == $id_quiz) {
            echo $id_quiz;
        } else {
            echo TAG_ERROR;
        }
        break;
}
