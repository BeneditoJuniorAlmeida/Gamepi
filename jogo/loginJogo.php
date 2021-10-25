
<?php

require '../_app/Config.inc.php';

if ($_REQUEST['action'] == "get_quiz") {

$quiz = new DaoPaciente();
$quiz->validarResponsavel($_POST);

if ($quiz->getResult()) {

  $data = array('status' => TAG_SUCCESS, 'nome' => $quiz->getResult()['nome']);
  echo $data['nome'] .'&'. $data['status'];
} else {
  $data = array('status' => TAG_ERROR, 'nome' => TAG_ERROR);
  echo $data['nome'] .'&'. $data['status'];
}

//$json['dados'] = $quiz->getResult();
//echo json_encode($json);
}
