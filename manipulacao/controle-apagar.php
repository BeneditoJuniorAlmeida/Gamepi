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
    case 'validarPergunta':
        if ((isset($_POST['usuario']) && $_POST['usuario'] != '') && (isset($_POST['senha']) && $_POST['senha'] != '')) {
            /* ------------------ Recuperando dados do formulário disciplina --------------- */
            $nome = $_POST['usuario'];
            $senha = md5($_POST['senha']);
            $id_selecionado = $_POST['id'];

            /* ------------------ enviando para o banco --------------- */
            $usuario = new DaoUsuario();
            $usuario->showUsuario($info[2]);

            $pergunta_id = new DaoPergunta();
            $pergunta_id->showPergunta($id_selecionado);

            if (($usuario->getResult()[0]['nome'] == $nome) && ($usuario->getResult()[0]['senha'] == $senha)) {
                $pergunta = new DaoPergunta();
                if ($pergunta_id->getResult()['id_usuario'] == $info[2]) {
                    $pergunta->deletePergunta($id_selecionado);
                    if ($pergunta->getResult()) {
                        echo TAG_SUCCESS;
                    } else {
                        echo TAG_ERROR;
                    }
                } else {
                    echo TAG_OTHER_USER;
                }
            } else {
                echo TAG_ACTION;
            }
        } else {
            echo TAG_MESSAGE;
        }
        break;

    case 'validarEquipe':
        if ((isset($_POST['usuario']) && $_POST['usuario'] != '') && (isset($_POST['senha']) && $_POST['senha'] != '')) {
            /* ------------------ Recuperando dados do formulário disciplina --------------- */
            $nome = $_POST['usuario'];
            $senha = md5($_POST['senha']);
            $id_selecionado = $_POST['id'];

            /* ------------------ enviando para o banco --------------- */
            $usuario = new DaoUsuario();
            $usuario->showUsuario($info[2]);

            if (($usuario->getResult()[0]['nome'] == $nome) && ($usuario->getResult()[0]['senha'] == $senha)) {
                $equipe = new DaoEquipe();
                $equipe->deleteEquipe($id_selecionado);
                if ($equipe->getResult()) {
                    echo TAG_SUCCESS;
                } else {
                    echo TAG_ERROR;
                }
            } else {
                echo TAG_ACTION;
            }
        } else {
            echo TAG_MESSAGE;
        }
        break;


    case 'validarQuiz':
        if ((isset($_POST['usuario']) && $_POST['usuario'] != '') && (isset($_POST['senha']) && $_POST['senha'] != '') && (isset($_POST['id']) && $_POST['id'] != '')) {

            $nome = $_POST['usuario'];
            $senha = md5($_POST['senha']);
            $id_selecionado = $_POST['id'];

            $usuario = new DaoUsuario();
            $usuario->showUsuario($info[2]);

            if (($usuario->getResult()[0]['nome'] == $nome) && ($usuario->getResult()[0]['senha'] == $senha)) {
                $quiz = new DaoQuiz();
                $quiz->deleteQuiz($id_selecionado);
                if ($quiz->getResult()) {
                    echo TAG_SUCCESS;
                } else {
                    echo TAG_ERROR;
                }
            } else {
                echo TAG_ACTION;
            }
        } else {
            echo TAG_MESSAGE;
        }
        break;

    case 'validarImagem':
        if ((isset($_POST['usuario']) && $_POST['usuario'] != '') && (isset($_POST['senha']) && $_POST['senha'] != '')) {
            /* ------------------ Recuperando dados do formulário imagem --------------- */
            $nome = $_POST['usuario'];
            $senha = md5($_POST['senha']);
            $id_selecionado = $_POST['id'];



            $img_busca = new DaoImagem();
            $img_busca->showImagem($id_selecionado);

            $caminho_anterior_imagem = $img_busca->getResult()['url_imagem'];
            $caminho_anterior_audio = $img_busca->getResult()['url_audio'];

            /* ------------------ enviando para o banco --------------- */
            $usuario = new DaoUsuario();
            $usuario->showUsuario($info[2]);

            if (($usuario->getResult()[0]['nome'] == $nome) && ($usuario->getResult()[0]['senha'] == $senha)) {
                $pergunta = new DaoImagem();
                if ($img_busca->getResult()[0]['id_usuario'] == $info[2]) {
                    $pergunta->deletImagem($id_selecionado);
                    if ($pergunta->getResult()) {
                        $path1 = "../upload/20/" . $caminho_anterior_imagem;
                        unlink($path1);
                        $path2 = "../upload/media/" .  $caminho_anterior_audio;
                        unlink($path2);
                        echo TAG_SUCCESS;
                    } else {
                        echo TAG_ERROR;
                    }
                } else {
                    echo TAG_OTHER_USER;
                }
            } else {
                echo TAG_ACTION;
            }
        } else {
            echo TAG_MESSAGE;
        }
        break;

        // case 'validarUsuario':
        //     if ((isset($_POST['usuario']) && $_POST['usuario'] != '') && (isset($_POST['senha']) && $_POST['senha'] != '')) {
        //         /* ------------------ Recuperando dados do formulário disciplina --------------- */
        //         $nome = $_POST['usuario'];
        //         $senha = md5($_POST['senha']);
        //         $id_selecionado = $_POST['id'];

        //         /* ------------------ enviando para o banco --------------- */
        //         $usuario = new DaoUsuario();
        //         $usuario->showUsuario($info[2]);

        //         if (($usuario->getResult()[0]['nome'] == $nome) && ($usuario->getResult()[0]['senha'] == $senha)) {
        //             $usuario = new DaoUsuario();
        //             $usuario->deleteUsuario($id_selecionado);
        //             if ($usuario->getResult()) {
        //                 echo TAG_SUCCESS;
        //             } else {
        //                 echo TAG_ERROR;
        //             }
        //         } else {
        //             echo TAG_ACTION;
        //         }
        //     } else {
        //         echo TAG_MESSAGE;
        //     }
        //     break;

    case 'validarPaciente':

        if ((isset($_POST['usuario']) && $_POST['usuario'] != '') && (isset($_POST['senha']) && $_POST['senha'] != '')) {
            /* ------------------ Recuperando dados do formulário disciplina --------------- */
            $nome = $_POST['usuario'];
            $senha = md5($_POST['senha']);
            $id_selecionado = $_POST['id'];

            $paciente = new DaoPaciente();
            /* ------------------ enviando para o banco --------------- */
            $usuario = new DaoUsuario();
            $usuario->showUsuario($info[2]);


            if (($usuario->getResult()[0]['nome'] == $nome) && ($usuario->getResult()[0]['senha'] == $senha)) {
                $paciente->deletePaciente($id_selecionado);
                if ($paciente->getResult()) {
                    echo TAG_SUCCESS;
                } else {
                    echo TAG_ERROR;
                }
            } else {
                echo TAG_ACTION;
            }
        } else {
            echo TAG_MESSAGE;
        }
        break;

    case 'validarRemoveUsuarioEquipe':
        if ((isset($_POST['usuario']) && $_POST['usuario'] != '') && (isset($_POST['senha']) && $_POST['senha'] != '')) {
            /* ------------------ Recuperando dados do formulário disciplina --------------- */
            $nome = $_POST['usuario'];
            $senha = md5($_POST['senha']);
            $id_selecionado = $_POST['id'];

            $usuario_admin = new DaoUsuario();
            $usuario_admin->showUsuarioAdminEquipe($info[2]);

            if ($usuario_admin->getResult() && ($info[2] != $id_selecionado)) {
                $usuario_equipe = new DaoEquipeUsuario();
                /* ------------------ enviando para o banco --------------- */
                $usuario = new DaoUsuario();
                $usuario->showUsuario($info[2]);

                if (($usuario->getResult()[0]['nome'] == $nome) && ($usuario->getResult()[0]['senha'] == $senha)) {
                    $usuario_equipe->deleteEquipeUsuario($id_selecionado);
                    if ($usuario_equipe->getResult()) {
                        echo TAG_SUCCESS;
                    } else {
                        echo TAG_ERROR;
                    }
                } else {
                    echo TAG_ACTION;
                }
            } else {
                echo TAG_EXIST;
            }
        } else {
            echo TAG_MESSAGE;
        }
        break;
}
