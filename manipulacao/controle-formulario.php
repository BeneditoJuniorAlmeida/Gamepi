<?php

ini_set('post_max_size', '8M');
ini_set('upload_max_filesize', '8M');

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

    case 'viewPerguntaTato':
        if (isset($_POST['id']) && $_POST['id'] != '') {
            $view = $_POST['id'];
            $daopergunta = new DaoPergunta();
            $daopergunta->showFullPergunta($view);

            $dado = $daopergunta->getResult()['op_correta'];
            switch ($dado) {
                case 0:
                    $op = 'A';
                    break;
                case 1:
                    $op = 'B';
                    break;
                case 2:
                    $op = 'C';
                    break;
            }
            if ($daopergunta->getResult()) {
                echo $dado = 'Pergunta: ' . $daopergunta->getResult()['pergunta'] . "&" . "</br>" . "</br>" .
                    'Descrição da reposta: ' . $daopergunta->getResult()['descricao_resposta'] . "&" . "<br/>" . "</br>"  .
                    "<center><p>Opcão A: </p><img id='caminho1' src='" . URL . '/upload/20/' . $daopergunta->getResult()['op_a'] . "' alt='imagem demonstraviva' width='90' height='60'></center>" . "&" .
                    "<br/> <center><p>Opcão B: </p> <img id='caminho2' src='" . URL . '/upload/20/' . $daopergunta->getResult()['op_b'] . "' alt='imagem demonstraviva' width='90' height='60'></center>" . "&" .
                    "<br/> <center><p>Opcão C: </p> <img id='caminho3' src='" . URL . '/upload/20/' . $daopergunta->getResult()['op_c'] . "' alt='imagem demonstraviva' width='90' height='60'></center>" . "&" .
                    "&" . '<br/> Opção correta = ' . $op;
            }
        }
        break;

    case 'viewPerguntaOuvinte':
        if (isset($_POST['id']) && $_POST['id'] != '') {
            $view = $_POST['id'];
            $daopergunta = new DaoPergunta();
            $daopergunta->showFullPergunta($view);

            // echo URL . '/upload/perguntamedia/' . $daopergunta->getResult()['url_audio'];
            // exit;

            // echo "<audio src='" . URL . '/upload/perguntamedia/' . $daopergunta->getResult()['url_audio'] . "' preload='auto' controls> teste</audio>";
            // exit;

            if ($daopergunta->getResult()) {
                echo $dado = 'Pergunta em texto do audio: ' . $daopergunta->getResult()['pergunta'] . "&" . "</br>" . "</br>" .
                    'Reposta esperada pelo paciente: ' . $daopergunta->getResult()['descricao_resposta'] . "&" . "<br/>" . "</br>"  .
                    "<center><p>Opcão : </p><img id='caminho1' src='" . URL_RAIZ . '/upload/20/' . $daopergunta->getResult()['op_a'] . "' alt='imagem demonstraviva' width='120' height='90'></center>" . "&" . "<br>" .
                    "&" . "<center><p>Pergunta em audio : </p> <audio src='" . URL_RAIZ . '/upload/perguntamedia/' . $daopergunta->getResult()['url_audio'] . "' preload='auto' controls> teste</audio> </center>";
            }
        }
        break;

    case 'updatePaciente':
        if (isset($_POST['id']) && $_POST['id'] != '') {
            $update = $_POST['id'];
            $daoPaciente = new DaoPaciente();
            $daoPaciente->showPaciente($update);
            /* ------- Retorna um array contendo string -------- */
            if ($daoPaciente->getResult()) {
                echo $_SESSION['update'] = $update . "&" . $dao_paciente->getResult()[0]['id_paciente'] . "&" . $daoPaciente->getResult()[0]['nome'] . "&" . $daoPaciente->getResult()[0]['data_nasc'] . "&" . $daoPaciente->getResult()[0]['nome_respon'] . "&" . $daoPaciente->getResult()[0]['contato'] . "&" . $daoPaciente->getResult()[0]['email'] . "&" . $daoPaciente->getResult()[0]['diagnostico'];
            }
        }
        break;

    case 'viewImagem':
        if (isset($_POST['id']) && $_POST['id'] != '') {
            $view = $_POST['id'];
            $daoimagem = new DaoImagem();
            $daoimagem->showImagem($view);
            if ($daoimagem->getResult()) {
                echo $dado =  "&" . "<br/> <center> <img id='img' src='" . URL_RAIZ . '/upload/20/' . $daoimagem->getResult()['url_imagem'] . "' alt='imagem demonstraviva' width='180' height='130'></center>";
            }
        }
        break;
        // cadastrar funcionario ta OK
        // vizualizar no projetopsicologia funcionario ta ok
    case 'viewUsuario':
        if (isset($_POST['id']) && $_POST['id'] != '') {
            $view = $_POST['id'];
            $daoUsuario = new DaoUsuario();
            $daoUsuario->showUsuario($view);
            if ($daoUsuario->getResult()) {
                switch ($daoUsuario->getResult()[0]['tipo_usuario']) {
                    case 1:
                        $nivel = "Administrador";
                        break;
                    case 2:
                        $nivel = "Normal";
                        break;
                }
                $dado = "Nome: " . $daoUsuario->getResult()[0]['nome'] . "<br/>" . "&" . "E-mail: " . $daoUsuario->getResult()[0]['email'] . "<br/>" . "&" . "Nivel de acesso: " . $nivel;
                echo $dado;
            }
        }
        break;

    case 'cadastrarUsuario':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $funcao = $_POST['funcao'];
        $senha = md5($_POST['senha']);
        $nivel = $_POST['nivel'];
        $dao_usuario = new DaoUsuario();
        $dao_usuario->createUsuario(array('nome' => $nome, 'email' => $email, 'senha' => $senha, 'func_usuario' => $funcao, 'tipo_usuario' => $nivel));
        if ($dao_usuario->getResult()) {
            echo TAG_SUCCESS;
        } else {
            echo TAG_ERROR;
        }
        break;

        //cadastrar paciente OK!
    case 'cadastrarPaciente':
        $nome = $_POST['nome'];
        $data_nasc = $_POST['data_nasc'];
        $nome_respon = $_POST['nome_respon'];
        $contato = $_POST['contato'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $diagnostico = $_POST['diagnostico'];
        $dao_paciente = new DaoPaciente();
        $dao_paciente->createPaciente(array('nome' => $nome, 'data_nasc' => $data_nasc, 'nome_respon' => $nome_respon, 'contato' => $contato, 'id_usuario' => $info[2], 'email' => $email, 'senha' => $senha, 'diagnostico' => $diagnostico));
        if ($dao_paciente->getResult()) {
            echo TAG_SUCCESS;
        } else {
            echo TAG_ERROR;
        }
        break;

    case 'gerarQuiz':
        if ((isset($_POST['cod_quiz']) && $_POST['cod_quiz'])) {
            $cod_quiz = $_POST['cod_quiz'];
            $dao_gerar_quiz = new DaoGeraQuiz();
            $dao_gerar_quiz->createGeraQuiz(array('cod_quiz' => $cod_quiz, 'id_usuario' => $info[2]));
            if ($dao_gerar_quiz->getResult()) {
                echo TAG_SUCCESS;
            } else {
                echo TAG_ERROR;
            }
        } else {
            echo TAG_MESSAGE;
        }
        break;


    case 'cadastrarEquipe':
        $nome = $_POST['nome'];
        $daoequipe = new DaoEquipe();
        $daoequipe->createEquipe(array('nome' => $nome, 'adm_equipe' => $info[2]));
        if ($daoequipe->getResult()) {
            echo TAG_SUCCESS;
        } else {
            echo TAG_ERROR;
        }
        break;



    case 'addRecompensa':
        $id_paciente = $_POST['id_paciente'];
        $link = $_POST['link'];
        $descricao = $_POST['descricao'];
        $daoAddRecompensa = new DaoAddRecompensa();
        $daoAddRecompensa->addRecompensa(array('url_recompensa' => $link, 'descricao' => $descricao, 'id_paciente' => $id_paciente));
        if ($daoAddRecompensa->getResult()) {
            echo TAG_SUCCESS;
        } else {
            echo TAG_ERROR;
        }
        break;

    case 'addUser':
        if ((isset($_POST['id_equipe']) && $_POST['id_equipe']) && (isset($_POST['id_usuario']) && $_POST['id_usuario'])) {
            $id_equipe = $_POST['id_equipe'];
            $id_usuario = $_POST['id_usuario'];
            $daoAddEquipe = new DaoAddEquipe();

            $daoAddEquipe->showUsuarioEquipe(array('id_usuario' => $id_usuario, 'id_equipe' => $id_equipe));
            if ($daoAddEquipe->getResult()) {
                echo TAG_EXIST;
            } else {
                $daoAddEquipe->addEquipe(array('tb_equipe_id_equipe' => $id_equipe, 'id_usuario' => $id_usuario));
                if (!$daoAddEquipe->getResult()) {
                    echo TAG_SUCCESS;
                } else {
                    echo TAG_ERROR;
                }
            }
        } else {
            echo TAG_MESSAGE;
        }
        break;

    case 'guardaId':
        $id_quiz = $_POST['id_quiz'];
        $id_paciente = $_POST['id_paciente'];

        if ($id_quiz != null && $id_paciente != null) {
            $_SESSION['guarda_ids'] = $id_quiz . "&" . $id_paciente;
            echo TAG_SUCCESS;
        } else {
            echo TAG_ERROR;
        }
        break;

    case 'CadastrarPerguntaQuiz':
    
        $id_quiz = $_POST['id_quiz'];
        $id_paciente = $_POST['id_paciente'];
        $id_perguntas = $_POST['id_perguntas'];
        $id_recompensas = $_POST['id_recompensas'];

        $id_perg = explode(',', $id_perguntas);
        $id_recom = explode(',', $id_recompensas);
      
        $daoPacienteQuiz = new DaoPacienteQuiz();
        $valA = count($id_perg);

        for ($i = 1; $i < $valA; $i++) {
           // var_dump("perguntas". $id_perg[$i] . " --- " . $id_recom[$i]);         
            $daoPacienteQuiz->createPacienteQuiz(array(
                'id_paciente' => $id_paciente,
                'id_quiz' => $id_quiz,
                'id_pergunta' => $id_perg[$i],
                'id_recompensa' => $id_recom[$i]
            ));
        }
        if ($daoPacienteQuiz->getResult()) {
            echo TAG_SUCCESS;
        } else {
            echo TAG_ERROR;
        }
        break;

    case 'cadastrarQuiz':

        $id_quiz = $_POST['id_quiz'];
        $id_pergunta = $_POST['ids_perguntas'];
        $ids = explode(',', $id_pergunta);
        $dao_quiz = new DaoQuiz();
        $valA = count($ids);
        for ($i = 0; $i < $valA; $i++) {
            $dao_quiz->createQuiz(array('id_quiz' => $id_quiz, 'id_pergunta' => $ids[$i]));
        };


        if ($dao_quiz->getResult()) {
            echo TAG_SUCCESS;
        } else {
            echo TAG_ERROR;
        }
        break;

    case 'testeSelecionaQuiz':
        $id_quiz = $_POST['quiz_id'];

        if ($id_quiz == $id_quiz) {
            echo $id_quiz;
        } else {
            echo TAG_ERROR;
        }
        break;
}
