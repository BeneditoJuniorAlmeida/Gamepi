<?php

/**

 * @author Benedito Jr. A. Leão
 */
class DaoGeraQuiz
{

    //put your code here
    var $result, $rowCount, $TABELA = "tb_quiz";
    private $WHERE_QUIZ = "where id_quiz = :aid";


    public function getResult()
    {
        return $this->result;
    }

    public function getRowCount()
    {
        return $this->rowCount;
    }

    /* ------------FUNÇÃO CRIAR QUIZ ------------- */

    public function createGeraQuiz(array $dados)
    {
        $create = new Create();
        $create->ExeCreate($this->TABELA, $dados);
        $this->result = $create->getResult();
    }

    /* ------------ FUNÇÃO SELECIONAR TODAS OS QUIZ DA TABELA tb_quiz  ------------- */

    public function readGeraQuiz()
    {
        $read = new Read();
        $read->ExeRead($this->TABELA);
        $this->result = $read->getResult();
        $this->rowCount = $read->getRowCount();
    }

    /* ------------ FUNÇÃO RETORNA SOMENTE UM QUIZ ------------------------------------- */

    public function showGeraQuiz($URL)
    {
        $show = new Read();
        $show->ExeRead($this->TABELA, $this->WHERE_QUIZ, "aid={$URL}");
        $this->result = $show->getResult()[0];
        $this->rowCount = $show->getRowCount();
    }

    /* ------------ FUNÇÃO ATUALIZAR QUESTAO ------------------------------------- */

    public function updateGeraQuiz(array $dados)
    {
        $id_recebido = $dados['id'];
        $update = new Update();
        $update->ExeUpdate($this->TABELA, $dados, $this->WHERE_QUIZ, "aid={$id_recebido}");
        $this->result = $update->getResult();
        $this->rowCount = $update->getRowCount();
    }

    /* ------------ FUNÇÃO Deletar QUESTAO ------------------------------------- */

    public function deleteGeraQuiz($dados)
    {
        $delet = new Delete();
        $delet->ExeDelete($this->TABELA, $this->WHERE_QUIZ, "aid={$dados}");
        $this->result = $delet->getResult();
        $this->rowCount = $delet->getRowCount();
    }

    public function ShowQuizPorEquipe($dados)
    {
    

        $id_usuario = $dados;

        $query = "SELECT DISTINCT
                    tb_quiz.id_quiz,
                    tb_quiz.cod_quiz,
                    tb_usuario.id_usuario,
                    tb_usuario.nome
                from tb_quiz 
                  join tb_equipe
                  join tb_usuario
                  join tb_usuario_has_tb_equipe on tb_usuario_has_tb_equipe.id_usuario = tb_usuario.id_usuario 
                AND tb_quiz.id_usuario = tb_usuario.id_usuario
           
                where tb_usuario_has_tb_equipe.id_usuario =:id_usuario";

        //$args = "id_quiz={$id_quiz}&id_paciente={$id_paciente}";
        $args = "id_usuario={$id_usuario}";

        $read = new Read();
        $read->FullRead($query, $args);
        if ($read->getRowCount() > 0) :
            $this->result = $read->getResult();
            $this->rowCount = $read->getRowCount();
        else :
            $this->result = null;
        endif;
    }


    public function showPacienteQuiz($dados)
    {
        $id_quiz = $dados;


        $query = "SELECT DISTINCT
        tb_paciente_has_tb_quiz.id_paciente,
        tb_paciente.nome
            FROM tb_paciente_has_tb_quiz 
            JOIN tb_paciente ON tb_paciente.id_paciente = tb_paciente_has_tb_quiz.id_paciente
    
        WHERE tb_paciente_has_tb_quiz.id_quiz = :id_quiz";

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
