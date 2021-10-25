<?php

/**
 * Description of DaoImagem
 *
 * @author  Benedito J. A Leão
 */
class DaoImagem {

    var $result, $rowCont, $TABELA = "tb_imagem";
    private $WHERE_IMAGEM = "where id_imagem = :aid";
    private $WHERE_IMAGEM_USUARIO = "where ADM = :aid";


    public function getResult() {
        return $this->result;
    }

    public function getRowCount() {
        return $this->rowCont;
    }

    /* --------------------- CRIAR NOVA imagem ----------------------------------- */
    public function createImagem(array $dados) {
        $create = new Create();
        $create->ExeCreate($this->TABELA, $dados);
        $this->result = $create->getResult();
    }

    /* -------------- SELECIONAR TODAS AS IMAGENS DA TABELA tb_imagem ---------- */
    public function readImagem() {
        $read = new Read();
        $read->ExeRead($this->TABELA);
        $this->result = $read->getResult();
        $this->rowCont = $read->getRowCount();
    }

    /* -------------- SELECIONAR UMA IMAGEM TABELA tb_imagem ---------- */
    public function showImagem($URL) {
        $show = new Read();
        $show->ExeRead($this->TABELA, $this->WHERE_IMAGEM, "aid={$URL}");
        $this->result = $show->getResult()[0];
        $this->rowCont = $show->getRowCount();
    }

    /* -------------- SELECIONAR UMA IMAGEM TABELA tb_imagem ---------- */
    public function showConteudoUsuarioEquipe(array $dados)
    {
        $id_usuario = $dados['id_usuario'];
        $id_equipe = $dados['id_equipe'];

        $query = "SELECT DISTINCT tb_imagem.id_imagem, tb_imagem.nome, tb_imagem.descricao, tb_imagem.fonte
                  from tb_imagem
                      join tb_equipe
                      join tb_usuario
                      join tb_usuario_has_tb_equipe
                      on tb_imagem.id_usuario = tb_usuario.id_usuario
                      and tb_usuario_has_tb_equipe.tb_equipe_id_equipe = tb_equipe.id_equipe
                  where tb_usuario_has_tb_equipe.id_usuario = :aidUser or tb_usuario_has_tb_equipe.tb_equipe_id_equipe = :aidEquipe";

        $args = "aidUser={$id_usuario}&aidEquipe={$id_equipe}";

        $show = new Read();
        $show->FullRead($query,$args);
        $this->result = $show->getResult();
        $this->rowCont = $show->getRowCount();
    }

        /* -------------- SELECIONAR UMA IMAGEM TABELA tb_imagem ---------- */
        public function showConteudoUsuario(array $dados)
        {
            $id_usuario = $dados['id_usuario'];

            $query = "SELECT DISTINCT tb_imagem.id_imagem, tb_imagem.nome, tb_imagem.descricao, tb_imagem.fonte 
                       from tb_imagem
                         join tb_usuario
                         on tb_imagem.id_usuario = tb_usuario.id_usuario
                       where tb_usuario.id_usuario = :aidUser";
    
            $args = "aidUser={$id_usuario}";
    
            $show = new Read();
            $show->FullRead($query,$args);
            $this->result = $show->getResult();
            $this->rowCont = $show->getRowCount();
        }

    /* --------------------- ATUALIZAR IMAGEM ------------------------ */
    public function updateImagem(array $dados) {
        $id_recebido = $dados['id_imagem'];
        $update = new Update();
        $update->ExeUpdate($this->TABELA, $dados, $this->WHERE_IMAGEM, "aid={$id_recebido}");
        $this->result = $update->getResult();
        $this->rowCont = $update->getRowCount();
    }

    /* --------------------- DELETAR IMAGEM  ------------------------ */
    public function deletImagem($dados) {
        $delet = new Delete();
        $delet->ExeDelete($this->TABELA, $this->WHERE_IMAGEM, "aid={$dados}");
        $this->result = $delet->getResult();
        $this->rowCont = $delet->getRowCount();
    }

    public function showImagemUsuario(array $dados){
        $terceiro_uso = $dados['terceiros_uso'];
        $id_usuario = $dados['id_usuario'];

        $query = "SELECT tb_imagem.id_imagem, tb_imagem.nome FROM tb_imagem

                  INNER join tb_usuario
       
                  on tb_imagem.id_usuario = tb_usuario.id_usuario
       
                 where tb_imagem.terceiros_uso = :terc or tb_imagem.id_usuario = :aid";


        $args = "terc={$terceiro_uso}&aid={$id_usuario}";

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

