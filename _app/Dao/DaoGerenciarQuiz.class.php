<?php

/**
 * Description of DaoAddEquipe
 *
 * @author Benedito J. A Leão
 */
class DaoAddRecompensa
{

    //put your code here
    var $result, $rowCount, $TABELA = "tb_recompensa";
    private $WHERE_ADD_RECOMPENSA = "where id_recompensa = :aid";


    /* -------------- RETORNA UM ARRAY LIST ------------- */

    public function getResult()
    {
        return $this->result;
    }

    public function getRowCount()
    {
        return $this->rowCount;
    }

    /* -------- FUNÇÃO ADICIONAR RECOMPENSA------- */

    public function cadGerenciarQuiz(array $dados)
    {
        $create = new Create();
        $create->ExeCreate($this->TABELA, $dados);
        $this->result = $create->getResult();
    }

    /* -------- FUNÇÃO SELECIONA TODOS OS LINKS ------- */

    public function readGerenciarQuiz()
    {
        $query = new Read();
        $query->ExeRead($this->TABELA);
        $this->result = $query->getResult();
        $this->rowCount = $query->getRowCount();
    }

    public function showGerenciarQuiz($URL)
    {
        $query = new Read();
        $query->ExeRead($this->TABELA, $this->WHERE_ADD_RECOMPENSA, "aid={$URL}");
        $this->result = $query->getResult()[0];
        $this->rowCount = $query->getRowCount();
    }


    /* -------------- FUNÇÃO ATUALIZAR USUARIO ----------- */

    public function updateGerenciarQuiz(array $dados)
    {
        $id_usuario = $dados['id'];
        $update = new Update();
        $update->ExeUpdate($this->TABELA, $dados, $this->WHERE_ADD_RECOMPENSA, "aid={$id_usuario}");
        $this->result = $update->getResult();
    }

    /* -------------- FUNÇÃO DELETAR USUARIO ----------- */

    public function deleteGerenciarQuiz($url)
    {
        $delete = new Delete();
        $delete->ExeDelete($this->TABELA, $this->WHERE_ADD_RECOMPENSA, "aid={$url}");
        $this->result = $delete->getResult();
    }
}
