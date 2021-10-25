<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando framework bootstrap,
 * o código é aberto e o uso é free,
 * porém lembre -se de conceder os créditos ao desenvolvedor.
 *-->
 <?php

if (!empty($URL[1]) && is_numeric($URL[1])) :
	$id = $URL[1];

else :
	header('location:' . URL_RAIZ . '/404');
endif;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>Contato</title>

	<head>

	<body>
		<?php
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'desempenho.xls';

		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha dados desempenho</tr>';
		$html .= '</tr>';


		$html .= '<tr>';
		$html .= '<td><b>Status reposta</b></td>';
		$html .= '<td><b> Pergunta</b></td>';
		$html .= '<td><b>Código do quiz</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '</tr>';


		$daoDados = new DaoGeraGrafico();

		$daoDados->dadosExcel(array('id_quiz' => $id));
		if ($daoDados->getRowCount() > 0) {
			foreach ($daoDados->getResult() as $dados) :
		
				$html .= '<tr>';
					$html .= '<td>' . $dados["status_resposta"] . '</td>';
					$html .= '<td>' . $dados["pergunta"] . '</td>';
					$html .= '<td>' . $dados["cod_quiz"]. '</td>';
					$html .= '<td>' . $dados["data_desem"]. '</td>';
					$html .= '<td>' .$dados["nome"] . '</td>';
					$html .= '</tr>';;



	
			endforeach;
		}


		// Configurações header para forçar o download
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: application/x-msexcel");
		header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
		header("Content-Description: PHP Generated Data");
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>

	</body>

</html>