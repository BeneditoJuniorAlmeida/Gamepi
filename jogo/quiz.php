
<?php

require '../_app/Config.inc.php';



if ($_REQUEST['action'] == "get_quiz") {


        $cod_quiz = $_POST['cod_quiz'];
        $nome_paciente = $_POST['nome_paciente'];
   
       
        $count = strlen($nome_paciente);

        $result = substr($nome_paciente, 2, $count);
        

        $json = [];
        $quiz = new DaoQuizTeste();
        $quiz->DadosJogo(array('cod_quiz' => $cod_quiz, 'nome_paciente' => $result));


        $json['quiz'] = $quiz->getResult();
        echo json_encode($json);
}

if ($_REQUEST['action'] == "get_dados") {

       

        $nome = $_POST['nome'];        
        $tipo = $_POST['tipo'];

        $count = strlen($nome);

        $result = substr($nome, 2, $count);

        $quiz = new DaoQuizTeste();
        $quiz->DadosQuiz(array('nome' => $result, 'tipo' => $tipo));

        $json = [];

        $json['quiz'] = $quiz->getResult();
        echo json_encode($json);
}
