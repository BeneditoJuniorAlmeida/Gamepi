<?php

/**
 * Description of DaoImagem
 *
 * @author  Benedito J. A Leão
 */
class DaoPaciente    {

    //put your code here
    var $result, $rowCount, $TABELA = "tb_paciente";
    private $WHERE_PACIENTE = "where id_paciente = :aid";
    private $WHERE_LOGIN = "where email = :email and senha = :senha";
    

    /* -------------- RETORNA UM ARRAY LIST ------------- */

    public function getResult() {
        return $this->result;
    }

    /* ----- FUNÇÃO PARA RETORNAR NÚMERO DE USUARIOS ------ */

    public function getRowCount() {
        return $this->rowCount;
    }
    
    public function showPaciente($URL) {
        $query = new Read();
        $query->ExeRead($this->TABELA, $this->WHERE_PACIENTE, "aid={$URL}");
        $this->result = $query->getResult()[0];
        $this->rowCount = $query->getRowCount();
    }

    /* -------- FUNÇÃO SELECIONA TODOS OS USUÁRIOS ------- */

    public function readPaciente() {
        $query = new Read();
        $query->ExeRead($this->TABELA);
        $this->result = $query->getResult();
        $this->rowCount = $query->getRowCount();
    }

    /* -------------- FUNÇÃO CRIAR NOVO USUARIO ---------- */

    public function createPaciente(array $dados) {
        $create = new Create();
        $create->ExeCreate($this->TABELA, $dados);
        $this->result = $create->getResult();
    }

    /* -------------- FUNÇÃO ATUALIZAR USUARIO ----------- */

    public function updatePaciente(array $dados) {
        $id_paciente = $dados['id_paciente'];
        $update = new Update();
        $update->ExeUpdate($this->TABELA, $dados, $this->WHERE_PACIENTE, "aid={$id_paciente}");
        $this->result = $update->getResult();
    }

    /* -------------- FUNÇÃO DELETAR USUARIO ----------- */

    public function deletePaciente($id_paciente) {
        $delete = new Delete();
        $delete->ExeDelete($this->TABELA, $this->WHERE_PACIENTE, "aid={$id_paciente}");
        $this->result = $delete->getResult();
    }

    public function validarResponsavel(array $dados)
    {
       
        $email = $dados['email'];
        $senha = md5($dados['senha']);

        $list = new Read();
        $list->ExeRead($this->TABELA, $this->WHERE_LOGIN, "email={$email}&senha={$senha}");
        $this->result = $list->getResult()[0];
        $this->rowCount = $list->getRowCount()[0];
    }
   
}
