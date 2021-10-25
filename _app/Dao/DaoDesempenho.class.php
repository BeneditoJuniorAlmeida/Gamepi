<?php

/**

 * @author Benedito Jr. A. Leão
 */
class DaoDesempenho
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

    /* ------------FUNÇÃO CRIAR QUIZ ------------- */

    public function createDesempenho(array $dados)
    {
        $create = new Create();
        $create->ExeCreate($this->TABELA, $dados);
        $this->result = $create->getResult();
        $this->rowCount = $create->getRowCount();
    }

    /* ------------ FUNÇÃO SELECIONAR TODAS OS QUIZ DA TABELA tb_quiz  ------------- */

    public function readDesempenho()
    {
        $read = new Read();
        $read->ExeRead($this->TABELA);
        $this->result = $read->getResult()[0];
        $this->rowCount = $read->getRowCount();
    }

      public function showDesempenho($URL)
    {
        $show = new Read();
        $show->ExeRead($this->TABELA, $this->WHERE_QUIZ, "aid={$URL}");
        $this->result = $show->getResult()[0];
        $this->rowCount = $show->getRowCount();
    }

    /* ------------ FUNÇÃO ATUALIZAR QUIZ ------------------------------------- */

    public function updateDesempenho(array $dados)
    {
        $id_recebido = $dados['id'];
        $update = new Update();
        $update->ExeUpdate($this->TABELA, $dados, $this->WHERE_QUIZ, "aid={$id_recebido}");
        $this->result = $update->getResult();
        $this->rowCount = $update->getRowCount();
    }

    /* ------------ FUNÇÃO Deletar QUIZ ------------------------------------- */

    public function deleteDesempenho($dados)
    {
        $delet = new Delete();
        $delet->ExeDelete($this->TABELA, $this->WHERE_QUIZ, "aid={$dados}");
        $this->result = $delet->getResult();
        $this->rowCount = $delet->getRowCount();
    }
}
