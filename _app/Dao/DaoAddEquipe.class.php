<?php

/**
 * Description of DaoAddEquipe
 *
 * @author Benedito J. A Leão
 */
class DaoAddEquipe
{

    //put your code here
    var $result, $rowCount, $TABELA = "tb_usuario_has_tb_equipe";
    private $WHERE_ADD_EQUIPE = "where id_usuario = :aid";


    /* -------------- RETORNA UM ARRAY LIST ------------- */

    public function getResult()
    {
        return $this->result;
    }

    public function getRowCount()
    {
        return $this->rowCount;
    }

    /* -------- FUNÇÃO ADICIONAR PARTICIPANTE A UMA EQUIPES------- */

    public function addEquipe(array $dados)
    {
        $create = new Create();
        $create->ExeCreate($this->TABELA, $dados);
        $this->result = $create->getResult();
    }

    /* -------- FUNÇÃO SELECIONA TODOS OS USUÁRIOS ------- */

    public function readAddEquipe()
    {
        $query = new Read();
        $query->ExeRead($this->TABELA);
        $this->result = $query->getResult();
        $this->rowCount = $query->getRowCount();
    }

    public function showAddEquipe($URL)
    {
        $query = new Read();
        $query->ExeRead($this->TABELA, $this->WHERE_ADD_EQUIPE, "aid={$URL}");
        $this->result = $query->getResult()[0];
        $this->rowCount = $query->getRowCount();
    }


    /* -------------- FUNÇÃO ATUALIZAR USUARIO ----------- */

    public function updateAddEquipe(array $dados)
    {
        $id_usuario = $dados['id'];
        $update = new Update();
        $update->ExeUpdate($this->TABELA, $dados, $this->WHERE_ADD_EQUIPE, "aid={$id_usuario}");
        $this->result = $update->getResult();
    }

    /* -------------- FUNÇÃO DELETAR USUARIO ----------- */

    public function deleteAddEquipe($url)
    {
        $delete = new Delete();
        $delete->ExeDelete($this->TABELA, $this->WHERE_ADD_EQUIPE, "aid={$url}");
        $this->result = $delete->getResult();
    }

    public function showUsuarioEquipe(array $dados)
    {
    $id_usuario = $dados['id_usuario'];
    $id_equipe = $dados['id_equipe'];

    
        $query = "SELECT DISTINCT tb_usuario.id_usuario, tb_usuario.nome 
                  
                  from tb_usuario_has_tb_equipe


                      join tb_usuario
       
                      join tb_equipe
       
                      on tb_usuario.id_usuario = tb_usuario_has_tb_equipe.id_usuario
                      and tb_usuario_has_tb_equipe.tb_equipe_id_equipe = tb_equipe.id_equipe
          
                  where tb_usuario_has_tb_equipe.id_usuario = :aidUser
                        and tb_usuario_has_tb_equipe.tb_equipe_id_equipe = :aidEquipe";

        $args = "aidUser={$id_usuario}&aidEquipe={$id_equipe}";

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
