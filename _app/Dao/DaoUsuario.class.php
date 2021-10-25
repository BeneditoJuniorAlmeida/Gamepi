<?php

/**
 * Description of DaoImagem
 *
 * @author  Benedito J. A Leão
 */
class DaoUsuario
{

    //put your code here
    var $result, $rowCount, $TABELA = "tb_usuario";
    private $WHERE_USUARIO = "where id_usuario = :aid";
    private $WHERE_LOGIN = "where nome = :nome and senha = :senha";
    private $WHERE_EMAIL = "where email = :email";

    /* -------------- RETORNA UM ARRAY LIST ------------- */

    public function getResult()
    {
        return $this->result;
    }

    /* ----- FUNÇÃO PARA RETORNAR NÚMERO DE USUARIOS ------ */

    public function getRowCount()
    {
        return $this->rowCount;
    }

    /* -------- FUNÇÃO SELECIONA TODOS OS USUÁRIOS ------- */

    public function readUsuario()
    {
        $query = new Read();
        $query->ExeRead($this->TABELA);
        $this->result = $query->getResult();
        $this->rowCount = $query->getRowCount();
    }

    public function showUsuario($URL)
    {
        $query = new Read();
        $query->ExeRead($this->TABELA, $this->WHERE_USUARIO, "aid={$URL}");
        $this->result = $query->getResult();
        $this->rowCount = $query->getRowCount();
    }

    /* -------- FUNÇÃO SELECIONA TODOS OS USUÁRIOS ------- */

    public function createUsuario(array $dados)
    {
        $create = new Create();
        $create->ExeCreate($this->TABELA, $dados);
        $this->result = $create->getResult();
    }

    /* -------------- FUNÇÃO ATUALIZAR USUARIO ----------- */

    public function updateUsuario(array $dados)
    {
        $id_usuario = $dados['id_usuario'];
        $update = new Update();
        $update->ExeUpdate($this->TABELA, $dados, $this->WHERE_USUARIO, "aid={$id_usuario}");
        $this->result = $update->getResult();
    }

    /* -------------- FUNÇÃO DELETAR USUARIO ----------- */

    public function deleteUsuario($url)
    {
        $delete = new Delete();
        $delete->ExeDelete($this->TABELA, $this->WHERE_USUARIO, "aid={$url}");
        $this->result = $delete->getResult();
    }

    /* --------------- Realiza a verificação antes de apagar um dado ---------- */

    public function validarUsuario(array $dados)
    {
        $nome = $dados['nome'];
        $senha = md5($dados['senha']);
        $list = new Read();
        $list->ExeRead($this->TABELA, $this->WHERE_LOGIN, "nome={$nome}&senha={$senha}");
        $this->result = $list->getResult();
        $this->rowCount = $list->getRowCount();
    }

    /* --------------- Verifica se um email existe  para redefinir senha ---------- */

    public function verificarEmail($email)
    {
        $list = new Read();
        $list->ExeRead($this->TABELA, $this->WHERE_EMAIL, "email={$email}");
        $this->result = $list->getResult();
    }

    /* --------------- Valida chave de segurança para a nova senha ---------- */

    public function validarChaveSeguranca($email, $chave)
    {
        $adm = new DaoUsuario();
        $adm->verificarEmail($email);

        if ($adm->getResult()) { // se encontra email valido --> verifica chave de acesso
            $chaveCorreta = md5($adm->getResult()[0]['id_usuario'] . $adm->getResult()[0]['senha']);
            if ($chaveCorreta == $chave) {
                return $adm->getResult()[0];
            }
        }
    }

    public function showIdEquipe($URL)
    {
        $query = "SELECT tb_equipe.id_equipe, tb_equipe.nome, tb_equipe.adm_equipe, tb_usuario.nome 

                  from tb_equipe
        
                    join tb_usuario
                    join tb_usuario_has_tb_equipe
       
                  on tb_usuario_has_tb_equipe.id_usuario = tb_usuario.id_usuario
                    and tb_usuario_has_tb_equipe.tb_equipe_id_equipe = tb_equipe.id_equipe
       
                  where tb_usuario.id_usuario = :aid";

        $args = "aid={$URL}";

        $list = new Read();
        $list->FullRead($query, $args);

        if ($list->getRowCount() > 0) :
            $this->result = $list->getResult();
            $this->rowCount = $list->getRowCount();
        else :
            $this->result = null;
        endif;
    }


    /* Retorna uma lista de usuários sem incluir o nome do admin na mesma */
    public function showUsauarioSemAdmin()
    {
        $query = "SELECT DISTINCT 
                     tb_usuario.id_usuario,
                     tb_usuario.nome
        
                  from tb_usuario
                  join tb_equipe
                  
                  on tb_equipe.adm_equipe <> tb_usuario.id_usuario";

        $list = new Read();
        $list->FullRead($query);

        if ($list->getRowCount() > 0) :
            $this->result = $list->getResult();
            $this->rowCount = $list->getRowCount();
        else :
            $this->result = null;
        endif;
    }

    public function showUsuarioAdminEquipe($URL)
    {
        $query = "SELECT DISTINCT tb_usuario.id_usuario, tb_usuario.nome 
        
                  from tb_usuario

                     join tb_equipe
                     join tb_usuario_has_tb_equipe
       
                     on tb_usuario.id_usuario = tb_equipe.adm_equipe and tb_equipe.id_equipe = tb_usuario_has_tb_equipe.tb_equipe_id_equipe
       
                  where tb_usuario.id_usuario = :aid";

        $args = "aid={$URL}";
        
        $list = new Read();
        $list->FullRead($query, $args);

        if ($list->getRowCount() > 0) :
            $this->result = $list->getResult();
            $this->rowCount = $list->getRowCount();
        else :
            $this->result = null;
        endif;
    }
}
