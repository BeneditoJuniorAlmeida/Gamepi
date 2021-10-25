<?php

/**

 * @author Benedito Jr. A. Leão
 */
class DaoGeraGrafico
{

    //put your code here
    var $result, $rowCount, $query, $TABELA = "tb_desempenho";
    private $WHERE_QUIZ = "where id_desempenho = :aid";

    public function getResult()
    {
        return $this->result;
    }

    public function getRowCount()
    {
        return $this->rowCount;
    }

    /* ------------ FUNÇÃO SELECIONAR TODAS OS QUIZ DA TABELA tb_quiz  ------------- */

    public function readGrafico()
    {
        $read = new Read();
        $read->ExeRead($this->TABELA);
        $this->result = $read->getResult()[0];
        $this->rowCount = $read->getRowCount();
    }

    public function Grafico(array $dados)
    {

        //  $id_paciente = $dados['id_paciente'];
        $id_quiz = $dados['id_quiz'];

        $query = "SELECT DISTINCT
        desempenho.status_resposta,
        desempenho.tempo_resposta,
        desempenho.data_desem,
        desempenho.op_marcada,
        tb_pergunta.id_pergunta,
        tb_pergunta.pergunta,
        tb_paciente.nome,
        tb_quiz.cod_quiz,
        desempenho.id_paciente,
        tb_quiz.id_quiz
    FROM tb_desempenho as desempenho
         JOIN tb_pergunta ON tb_pergunta.id_pergunta = desempenho.id_pergunta
         JOIN tb_quiz ON tb_quiz.id_quiz = desempenho.id_quiz
         JOIN tb_paciente ON tb_paciente.id_paciente = desempenho.id_paciente
    WHERE desempenho.id_quiz = :id_quiz";
        //and tb_paciente.id_paciente = :id_paciente";

        // $args = "id_quiz={$id_quiz}&id_paciente={$id_paciente}";
        $args = "id_quiz={$id_quiz}";

        $read = new Read();
        $read->FullRead($query, $args);
        if ($read->getRowCount() > 0) :
            $this->result = $read->getResult();
            $this->rowCount = $read->getRowCount();
        else :
            $this->result = null;
        endif;
    }
    public function Grafico2(array $dados)
    {
        $id_quiz = $dados['id_quiz'];
        //  $id_paciente = $dados['id_paciente'];

        $query = "SELECT DISTINCT 
        dados.id_desempenho,
        dados.status_resposta,
        dados.id_pergunta,
        dados.id_quiz,
        dados.data_desem,
        dados.id_paciente,
        tb_paciente.nome
              FROM tb_desempenho as dados
              JOIN tb_paciente_has_tb_quiz
              JOIN tb_paciente on dados.id_paciente = tb_paciente.id_paciente 
              JOIN tb_quiz_has_tb_pergunta ON tb_paciente_has_tb_quiz.id_pergunta = dados.id_pergunta  
        WHERE dados.id_quiz = :id_quiz";

        // $args = "id_quiz={$id_quiz}&id_paciente={$id_paciente}";
        $args = "id_quiz={$id_quiz}";

        $read = new Read();
        $read->FullRead($query, $args);
        if ($read->getRowCount() > 0) :
            $this->result = $read->getResult();
            $this->rowCount = $read->getRowCount();
        else :
            $this->result = null;
        endif;
    }

    public function dadosExcel(array $dados)
    {
        $id_quiz = $dados['id_quiz'];

        $query = "SELECT DISTINCT 
        dados.id_desempenho,
        dados.status_resposta,
        tb_pergunta.pergunta,
        tb_quiz.cod_quiz,
        dados.data_desem,
        tb_paciente.nome
              FROM tb_desempenho as dados
              JOIN tb_paciente_has_tb_quiz
               JOIN tb_pergunta on dados.id_pergunta = tb_pergunta.id_pergunta
              JOIN tb_quiz on dados.id_quiz = tb_quiz.id_quiz
              JOIN tb_paciente on dados.id_paciente = tb_paciente.id_paciente 
              JOIN tb_quiz_has_tb_pergunta ON tb_paciente_has_tb_quiz.id_pergunta = dados.id_pergunta  
        WHERE dados.id_quiz = :id_quiz";

        $args = "id_quiz={$id_quiz}";
        $read = new Read();
        $read->FullRead($query, $args);
        if ($read->getRowCount() > 0) :
            $this->result = $read->getResult();
            $this->rowCount = $read->getRowCount();
        else :
            $this->result = null;
        endif;
       
    }

}
