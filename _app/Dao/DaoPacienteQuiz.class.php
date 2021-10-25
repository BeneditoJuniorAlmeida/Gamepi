<?php

/**
 * Description of DaoImagem
 *
 * @author  Benedito J. A Leão
 */
class DaoPacienteQuiz
{

    //put your code here
    var $result, $rowCount, $query, $TABELA = "tb_paciente_has_tb_quiz";
    private $WHERE_PACIENTE_QUIZ = "where id_paciente_quiz = :aid";


    /* -------------- RETORNA UM ARRAY LIST ------------- */

    public function getResult()
    {
        return $this->result;
    }

    /* ----- FUNÇÃO PARA RETORNAR NÚMERO DE USUARIOS ------ */

    public function getRowCount()
    {
        return $this->rowCount;
    }


    /* -------- FUNÇÃO SELECIONA TODOS OS USUÁRIOS ------- */

    public function createPacienteQuiz(array $dados)
    {
        $create = new Create();
        $create->ExeCreate($this->TABELA, $dados);
        $this->result = $create->getResult();
    }

    /* -------- FUNÇÃO SELECIONA TODOS OS USUÁRIOS ------- */

    public function readPacienteQuiz()
    {
        $query = new Read();
        $query->ExeRead($this->TABELA);
        $this->result = $query->getResult();
        $this->rowCount = $query->getRowCount();
    }

    public function showPacienteQuiz($URL)
    {
        $query = new Read();
        $query->ExeRead($this->TABELA, $this->WHERE_PACIENTE_QUIZ, "aid={$URL}");
        $this->result = $query->getResult()[0];
        $this->rowCount = $query->getRowCount();
    }

    /* -------------- FUNÇÃO ATUALIZAR USUARIO ----------- */

    public function updatePacienteQuiz(array $dados)
    {
        $id_paciente_quiz = $dados['id_paciente_quiz'];
        $update = new Update();
        $update->ExeUpdate($this->TABELA, $dados, $this->WHERE_PACIENTE_QUIZ, "aid={$id_paciente_quiz}");
        $this->result = $update->getResult();
    }

    /* -------------- FUNÇÃO DELETAR USUARIO ----------- */

    public function deletePacienteQuiz($url)
    {
        $delete = new Delete();
        $delete->ExeDelete($this->TABELA, $this->WHERE_PACIENTE_QUIZ, "aid={$url}");
        $this->result = $delete->getResult();
    }

    public function showFullPergunta($URL)
    {
        $query = "SELECT
        	tb_quiz_has_tb_pergunta.id_quiz_pergunta,
            tb_pergunta.id_pergunta,
            tb_pergunta.pergunta
            FROM 
                tb_pergunta
            JOIN tb_quiz_has_tb_pergunta 
            JOIN tb_quiz
            ON tb_pergunta.id_pergunta = tb_quiz_has_tb_pergunta.id_pergunta 

            AND tb_quiz_has_tb_pergunta.id_quiz = tb_quiz.id_quiz
            WHERE tb_quiz_has_tb_pergunta.id_quiz = :aid ORDER BY tb_quiz_has_tb_pergunta.id_quiz_pergunta";


        $args = "aid={$URL}";
        $read = new Read();
        $read->FullRead($query, $args);

        $this->result = $read->getResult();
        $this->rowCount = $read->getRowCount();
    }
    public function showFullRecompensa($URL)
    {
        $query = "SELECT DISTINCT
                      tb_recompensa.id_recompensa as id_recompensa,
                      tb_recompensa.url_recompensa as url_recompensa,
                      tb_recompensa.descricao as descricao
                 FROM 
                    tb_recompensa
                 JOIN tb_paciente

                 ON tb_paciente.id_paciente = tb_recompensa.id_paciente
                 WHERE tb_recompensa.id_paciente  = :aid";


        $args = "aid={$URL}";

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
