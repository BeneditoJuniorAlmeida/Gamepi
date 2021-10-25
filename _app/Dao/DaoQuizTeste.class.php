<?php

/**

 * @author Benedito Jr. A. Leão
 */
class DaoQuizTeste
{

    //put your code here
    var $result, $rowCount, $query, $TABELA = "tb_quiz_has_tb_pergunta";
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

    public function DadosJogo(array $dados)
    {

        $cod_quiz = $dados['cod_quiz'];
        $nome_paciente = $dados['nome_paciente'];

        

        $query = "SELECT 
        tb_paciente_has_tb_quiz.id_paciente_quiz, 
        tb_paciente.nome,
        tb_paciente.id_paciente,
        tb_quiz.cod_quiz,
        tb_quiz.id_quiz,
        tb_pergunta.pergunta,
        tb_pergunta.id_pergunta,
        tb_recompensa.url_recompensa,
        tb_pergunta.tato_ou_ouvinte,
        tb_pergunta.op_correta,
        tb_pergunta.url_audio,
        tb_pergunta.url_pergunta,
        tb_pergunta.descricao_resposta,
        tb_pergunta.aponta_ajuda,
        tb_pergunta.tempo_ajuda,
        tb_imagem.url_imagem AS A,
        (SELECT	
             tb_imagem.url_imagem	
         FROM
              tb_imagem
         WHERE 
              tb_imagem.id_imagem = tb_pergunta.id_imagem_op_b) AS B,
         (SELECT	
             tb_imagem.url_imagem	
         FROM
              tb_imagem
         WHERE 
              tb_imagem.id_imagem = tb_pergunta.id_imagem_op_c) AS C 
        FROM tb_paciente_has_tb_quiz 
        JOIN tb_paciente ON tb_paciente_has_tb_quiz.id_paciente = tb_paciente.id_paciente
        JOIN tb_quiz ON tb_paciente_has_tb_quiz.id_quiz = tb_quiz.id_quiz
        JOIN tb_pergunta ON tb_paciente_has_tb_quiz.id_pergunta = tb_pergunta.id_pergunta
        JOIN tb_recompensa ON tb_paciente_has_tb_quiz.id_recompensa = tb_recompensa.id_recompensa
        JOIN tb_imagem ON tb_pergunta.id_imagem_op_a = tb_imagem.id_imagem
    WHERE tb_quiz.cod_quiz = :codQuiz AND tb_paciente.nome = :nomePaciente ORDER BY tb_paciente_has_tb_quiz.id_paciente_quiz";

        $args = "codQuiz={$cod_quiz}&nomePaciente={$nome_paciente}";

        $show = new Read();
        $show->FullRead($query, $args);
        $this->result = $show->getResult();
        $this->rowCont = $show->getRowCount();
    }

    public function DadosQuiz(array $dados)
    {


        $nome = $dados['nome'];
        $tipo = $dados['tipo'];
   

        $query = "SELECT DISTINCT
    tb_paciente.nome,
    tb_quiz.cod_quiz

    FROM tb_paciente_has_tb_quiz    
    JOIN tb_paciente ON tb_paciente_has_tb_quiz.id_paciente = tb_paciente.id_paciente    
    JOIN tb_quiz ON tb_paciente_has_tb_quiz.id_quiz = tb_quiz.id_quiz
    JOIN tb_pergunta ON tb_paciente_has_tb_quiz.id_pergunta = tb_pergunta.id_pergunta
    JOIN tb_recompensa ON tb_paciente_has_tb_quiz.id_recompensa = tb_recompensa.id_recompensa
    JOIN tb_imagem ON tb_pergunta.id_imagem_op_a = tb_imagem.id_imagem
    WHERE tb_paciente.nome = :nome AND tb_pergunta.tato_ou_ouvinte = :tipo";

        $args = "nome={$nome}&tipo={$tipo}";

        $show = new Read();
        $show->FullRead($query, $args);
        $this->result = $show->getResult();
        $this->rowCont = $show->getRowCount();
    }


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
        $id_recebido = $dados['id'];
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
}
