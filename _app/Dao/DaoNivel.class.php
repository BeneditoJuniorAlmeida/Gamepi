<?php

/**
 *
 * @author Benedito J. A Leão
 */
class DaoNivel {
    //put your code here
    var $result, $rowCount, $TABELA = "tb_tipo_usuario";
    private $WHERE_ROTA = "where id_tipo_usuario = :aid";

    /* --------------- RETORNA UM ARRAY DE DADOS -------------- */

    public function getResult() {
        return $this->result;
    }

    /* ---------- RETORNA O NÚMERO DE NIVEIS CADASTRADAS ------ */

    public function getRowCount() {
        return $this->rowCount;
    }

    /* ---------- FUNÇÃO CRIAR NIVEL ---------------------- */

    public function createNivel(array $dados) {
        $create = new Create();
        $create->ExeCreate($this->TABELA, $dados);
        $this->result = $create->getResult();
    }

    /* ---------FUNÇÃO DE CONSULTA OBS.: NÃO IMPLEMENTADA ---- */

    public function readNivel() {
        $read = new Read();
        $read->ExeRead($this->TABELA);
        $this->result = $read->getResult();
        $this->rowCount = $read->getRowCount();
    }

    /* ---------FUNÇÃO DE Deletar OBS ----------- ---- */

    public function deleteNivel(array $dados) {
        $id_recebido = $dados['id_tipo_usuario'];
        $delete = new Delete();
        $this->deleteRota($this->TABELA, $this->WHERE_ROTA, "aid={$id_recebido}");
        $this->result = $delete->getResult();
        $this->rowCount = $delete->getRowCount();    
    }
}
