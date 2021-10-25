<?php

/**
 * Description of DaoUsuario
 *
 * @author  Benedito J. A Leão
 */
class DaoEquipeUsuario
{

    //put your code here
    var $result, $rowCount, $TABELA = "tb_usuario_has_tb_equipe";
    private $WHERE_EQUIPE_USUARIO = "where id_usuario = :aid";


    /* -------------- RETORNA UM ARRAY LIST ------------- */

    public function getResult()
    {
        return $this->result;
    }



    public function getRowCount()
    {
        return $this->rowCount;
    }

    public function deleteEquipeUsuario($url)
    {
        $delete = new Delete();
        $delete->ExeDelete($this->TABELA, $this->WHERE_EQUIPE_USUARIO, "aid={$url}");
        $this->result = $delete->getResult();
    }
}
