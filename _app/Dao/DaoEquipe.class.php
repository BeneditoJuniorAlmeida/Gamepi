<?php

/**
 * Description of DaoUsuario
 *
 * @author  Benedito J. A Leão
 */
class DaoEquipe
{

    //put your code here
    var $result, $rowCount, $TABELA = "tb_equipe";
    private $WHERE_PERGUNTA = "where id_equipe = :aid";
    private $WHERE_USUARIO = "where adm_equipe = :aid";

    /* -------------- RETORNA UM ARRAY LIST ------------- */

    public function getResult()
    {
        return $this->result;
    }



    public function getRowCount()
    {
        return $this->rowCount;
    }


    /* -------- FUNÇÃO SELECIONA TODAS AS EQUIPES------- */

    public function createEquipe(array $dados)
    {
        $create = new Create();
        $create->ExeCreate($this->TABELA, $dados);
        $this->result = $create->getResult();
    }

    /* -------- FUNÇÃO SELECIONA TODOS OS USUÁRIOS ------- */

    public function readEquipe()
    {
        $query = new Read();
        $query->ExeRead($this->TABELA);
        $this->result = $query->getResult();
        $this->rowCount = $query->getRowCount();
    }

    public function showEquipe($URL)
    {
        $query = new Read();
        $query->ExeRead($this->TABELA, $this->WHERE_PERGUNTA, "aid={$URL}");
        $this->result = $query->getResult()[0];
        $this->rowCount = $query->getRowCount();
    }

    public function showEquipeUsuario($URL)
    {
        $query = new Read();
        $query->ExeRead($this->TABELA, $this->WHERE_USUARIO, "aid={$URL}");
        $this->result = $query->getResult();
        $this->rowCount = $query->getRowCount();
    }


    /* -------------- FUNÇÃO ATUALIZAR USUARIO ----------- */

    public function updateEquipe(array $dados)
    {
        $id_usuario = $dados['id'];
        $update = new Update();
        $update->ExeUpdate($this->TABELA, $dados, $this->WHERE_PERGUNTA, "aid={$id_usuario}");
        $this->result = $update->getResult();
    }

    /* -------------- FUNÇÃO DELETAR USUARIO ----------- */

    public function deleteEquipe($url)
    {
        $delete = new Delete();
        $delete->ExeDelete($this->TABELA, $this->WHERE_PERGUNTA, "aid={$url}");
        $this->result = $delete->getResult();
    }

    public function showUsuarioEquipe($URL)
    {
        $query = "select tb_usuario_has_tb_equipe.id_usuario, 
                   (select tb_usuario.nome
                       from tb_usuario
                       
                       where tb_usuario.id_usuario = tb_usuario_has_tb_equipe.id_usuario) as nome,
                   (select tb_usuario.email
                       from tb_usuario
                       
                       where tb_usuario.id_usuario = tb_usuario_has_tb_equipe.id_usuario) as email,
                       
                   (select tb_usuario.func_usuario
                       from tb_usuario
                       
                       where tb_usuario.id_usuario = tb_usuario_has_tb_equipe.id_usuario) as funcao
                    from tb_usuario_has_tb_equipe join tb_usuario
                       ON tb_usuario_has_tb_equipe.id_usuario = tb_usuario.id_usuario
                    where tb_usuario_has_tb_equipe.tb_equipe_id_equipe = :aid";

        $args = "aid={$URL}";

        $show = new Read();
        $show->FullRead($query, $args);

        if ($show->getRowCount() > 0) {
            $this->result = $show->getResult();
            $this->rowCount = $show->getRowCount();
        } else {
            $this->result = null;
        }
    }

    public function showParticipantes($URL)
    {
        $query = "select tb_usuario.id_usuario, tb_usuario.nome 
        
                  from tb_usuario
       
                      join tb_equipe join tb_usuario_has_tb_equipe
       
                      ON tb_usuario.id_usuario = tb_usuario_has_tb_equipe.id_usuario and tb_equipe.id_equipe = tb_usuario_has_tb_equipe.tb_equipe_id_equipe
       
                  WHERE tb_equipe.id_equipe = :aid";

        $args = "aid={$URL}";

        $show = new Read();
        $show->FullRead($query, $args);

        if ($show->getRowCount() > 0) {
            $this->result = $show->getResult();
            $this->rowCount = $show->getRowCount();
        } else {
            $this->result = null;
        }
    }
}
