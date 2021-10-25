<?php

/**

 * @author Benedito Jr. A. Leão
 */
class DaoQuiz
{

    //put your code here
    var $result, $rowCount, $query, $TABELA = "tb_quiz_has_tb_pergunta";

    private $WHERE_QUIZ = "where id_quiz_pergunta = :aid";

    public function getResult()
    {
        return $this->result;
    }

    public function getRowCount()
    {
        return $this->rowCount;
    }

    /* ------------FUNÇÃO CRIAR QUIZ ------------- */

    public function createQuiz(array $dados)
    {
        $create = new Create();
        $create->ExeCreate($this->TABELA, $dados);
        $this->result = $create->getResult();
    }

    /* ------------ FUNÇÃO SELECIONAR TODAS OS QUIZ DA TABELA tb_quiz  ------------- */

    public function readQuiz()
    {
        $read = new Read();
        $read->ExeRead($this->TABELA);
        $this->result = $read->getResult()[0];
        $this->rowCount = $read->getRowCount();
    }

    public function readListaQuiz($URL)
    {
        $query = "SELECT 
                  tb_quiz_has_tb_pergunta.id_quiz_pergunta,
                  tb_quiz.id_quiz,
		          tb_quiz.id_usuario,
		          tb_quiz.cod_quiz,
                  tb_pergunta.pergunta, 
                  tb_quiz_has_tb_pergunta.aponta_ajuda,
                  tb_quiz_has_tb_pergunta.tempo_aponta
        
                  FROM tb_quiz_has_tb_pergunta
                  join tb_quiz
                  JOIN tb_pergunta
                  join tb_usuario_has_tb_equipe
        
                  on tb_quiz.id_usuario = tb_usuario_has_tb_equipe.id_usuario 
                  and tb_quiz_has_tb_pergunta.id_pergunta = tb_pergunta.id_pergunta 
                  and  tb_quiz_has_tb_pergunta.id_quiz = tb_quiz.id_quiz
                  where tb_usuario_has_tb_equipe.tb_equipe_id_equipe = :aid";

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

    /* ------------ FUNÇÃO RETORNA SOMENTE UM QUIZ ------------------------------------- */

    public function showQuiz($URL)
    {
        $show = new Read();
        $show->ExeRead($this->TABELA, $this->WHERE_QUIZ, "aid={$URL}");
        $this->result = $show->getResult()[0];
        $this->rowCount = $show->getRowCount();
    }

    /* ------------ FUNÇÃO ATUALIZAR QUIZ ------------------------------------- */

    public function updateQuiz(array $dados)
    {
        $id_recebido = $dados['id_quiz_pergunta'];
        $update = new Update();
        $update->ExeUpdate($this->TABELA, $dados, $this->WHERE_QUIZ, "aid={$id_recebido}");
        $this->result = $update->getResult();
        $this->rowCount = $update->getRowCount();
    }

    /* ------------ FUNÇÃO Deletar QUIZ ------------------------------------- */

    public function deleteQuiz($dados)
    {
        $delet = new Delete();
        $delet->ExeDelete($this->TABELA, $this->WHERE_QUIZ, "aid={$dados}");
        $this->result = $delet->getResult();
        $this->rowCount = $delet->getRowCount();
    }

    public function showQuizUsuario(array $dados)
    {
        $id_usuario = $dados['id_usuario'];
        $tato_ouvinte = $dados['tato_ou_ouvinte'];

        $query = new Read();
        $query->ExeRead($this->TABELA, $this->WHERE_PERGUNTA_USUARIO, "aid={$id_usuario}&valor={$tato_ouvinte}");
        $this->result = $query->getResult();
        $this->rowCount = $query->getRowCount();
    }

    public function readListaQuizEquipe($URL)
    {
        $query = "SELECT DISTINCT
	                    tb_quiz.id_quiz,
                        tb_quiz.cod_quiz,
                        tb_usuario.nome
                 FROM tb_quiz
	                    JOIN tb_usuario
                        JOIN tb_equipe
                        JOIN tb_usuario_has_tb_equipe
                   ON tb_usuario.id_usuario = tb_quiz.id_usuario
                   and tb_usuario_has_tb_equipe.id_usuario = tb_usuario.id_usuario
                   and tb_usuario_has_tb_equipe.tb_equipe_id_equipe = tb_equipe.id_equipe
                where tb_usuario_has_tb_equipe.tb_equipe_id_equipe = :aid";

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

    public function readListaPacienteEquipe($URL)
    {
        $query = "SELECT DISTINCT
	                    tb_paciente.id_paciente,
                        tb_paciente.nome
                 FROM tb_quiz
                        JOIN tb_paciente
	                    JOIN tb_usuario
                        JOIN tb_equipe
                        JOIN tb_usuario_has_tb_equipe
                   ON  tb_paciente.id_usuario = tb_usuario.id_usuario
                   and tb_usuario_has_tb_equipe.id_usuario = tb_usuario.id_usuario
                   and tb_usuario_has_tb_equipe.tb_equipe_id_equipe = tb_equipe.id_equipe
                where tb_usuario_has_tb_equipe.tb_equipe_id_equipe = :aid";

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
