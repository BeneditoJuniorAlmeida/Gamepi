<?php

/**
 * Description of DaoImagem
 *
 * @author  Benedito J. A Leão
 */
class DaoPergunta
{

    //put your code here
    var $result, $rowCount, $query, $TABELA = "tb_pergunta";
    private $WHERE_PERGUNTA = "where id_pergunta = :aid";
    private $WHERE_PERGUNTA_USUARIO = "where id_usuario = :aid and tato_ou_ouvinte = :valor";

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

    public function createPergunta(array $dados)
    {   
        $create = new Create();
        $create->ExeCreate($this->TABELA, $dados);
        $this->result = $create->getResult();
    }

    /* -------- FUNÇÃO SELECIONA TODOS OS USUÁRIOS ------- */

    public function readPergunta()
    {
        $query = new Read();
        $query->ExeRead($this->TABELA);
        $this->result = $query->getResult();
        $this->rowCount = $query->getRowCount();
    }
  
    public function showPerguntaIgual(array $dados)
    {
        $pergunta = $dados['pergunta'];
       

        $query = "SELECT DISTINCT pergunta FROM tb_pergunta WHERE pergunta  = :pergunta";

        $args = "pergunta={$pergunta}";

        $list = new Read();
        $list->FullRead($query,$args);
        $this->result = $list->getResult();
        $this->rowCount = $list->getRowCount();
    }

    public function showPergunta($URL)
    {
        $query = new Read();
        $query->ExeRead($this->TABELA, $this->WHERE_PERGUNTA, "aid={$URL}&");
        $this->result = $query->getResult();
        $this->rowCount = $query->getRowCount();
    }

    public function showPerguntaUsuario(array $dados)
    {
        $id_usuario = $dados['id_usuario'];
        $id_equipe = $dados['tb_equipe_id_equipe'];
        $tato_ouvinte = $dados['tato_ou_ouvinte'];
        


        $query = "SELECT distinct tb_pergunta.id_pergunta, tb_pergunta.pergunta, tb_pergunta.tato_ou_ouvinte
                     FROM tb_pergunta
                          join tb_equipe
                          join tb_usuario
                          join tb_usuario_has_tb_equipe
                        on tb_pergunta.id_usuario = tb_usuario.id_usuario
                        and tb_usuario_has_tb_equipe.tb_equipe_id_equipe = tb_equipe.id_equipe
        
                  where (tb_usuario_has_tb_equipe.id_usuario = :aidUser or tb_usuario_has_tb_equipe.tb_equipe_id_equipe = :aidEquipe) and tb_pergunta.tato_ou_ouvinte = :aidTipo LIMIT :numRegistro";

        $args = "aidUser={$id_usuario}&aidEquipe={$id_equipe}&aidTipo={$tato_ouvinte}&numRegistro={$tato_ouvinte}";

        $list = new Read();
        $list->FullRead($query,$args);
        $this->result = $list->getResult();
        $this->rowCount = $list->getRowCount();
    }

    public function showPerguntaUsuarioEquipe(array $dados)
    {
        $id_usuario = $dados['id_usuario'];
        $id_equipe = $dados['tb_equipe_id_equipe'];

        $query = "SELECT DISTINCT tb_pergunta.id_pergunta, tb_pergunta.pergunta, tb_pergunta.tato_ou_ouvinte, 
                                  tb_pergunta.aponta_ajuda, tb_pergunta.tempo_ajuda, tb_pergunta.op_correta
                     FROM tb_pergunta
                          join tb_equipe
                          join tb_usuario
                          join tb_usuario_has_tb_equipe
                        on tb_pergunta.id_usuario = tb_usuario.id_usuario
                        and tb_usuario_has_tb_equipe.tb_equipe_id_equipe = tb_equipe.id_equipe
        
                  where tb_usuario_has_tb_equipe.id_usuario = :aidUser or tb_usuario_has_tb_equipe.tb_equipe_id_equipe = :aidEquipe";

        $args = "aidUser={$id_usuario}&aidEquipe={$id_equipe}";

        $list = new Read();
        $list->FullRead($query,$args);
        $this->result = $list->getResult();
        $this->rowCount = $list->getRowCount();
    }
    public function showPerguntaUsuarioEquipeMaiorData(array $dados)
    {
        $id_usuario = $dados['id_usuario'];
        $id_equipe = $dados['tb_equipe_id_equipe'];

        $query = "SELECT DISTINCT tb_pergunta.id_pergunta, tb_pergunta.pergunta, tb_pergunta.tato_ou_ouvinte, 
                                  tb_pergunta.aponta_ajuda, tb_pergunta.tempo_ajuda, tb_pergunta.op_correta
                     FROM tb_pergunta
                          join tb_equipe
                          join tb_usuario
                          join tb_usuario_has_tb_equipe
                        on tb_pergunta.id_usuario = tb_usuario.id_usuario
                        and tb_usuario_has_tb_equipe.tb_equipe_id_equipe = tb_equipe.id_equipe
        
                  where tb_usuario_has_tb_equipe.id_usuario = :aidUser or tb_usuario_has_tb_equipe.tb_equipe_id_equipe = :aidEquipe  ORDER BY tb_pergunta.data_criacao DESC";

        $args = "aidUser={$id_usuario}&aidEquipe={$id_equipe}";

        $list = new Read();
        $list->FullRead($query,$args);
        $this->result = $list->getResult();
        $this->rowCount = $list->getRowCount();
    }
    public function showPerguntaUsuarioEquipeMenoraData(array $dados)
    {
        $id_usuario = $dados['id_usuario'];
        $id_equipe = $dados['tb_equipe_id_equipe'];

        $query = "SELECT DISTINCT tb_pergunta.id_pergunta, tb_pergunta.pergunta, tb_pergunta.tato_ou_ouvinte, 
                                  tb_pergunta.aponta_ajuda, tb_pergunta.tempo_ajuda, tb_pergunta.op_correta
                     FROM tb_pergunta
                          join tb_equipe
                          join tb_usuario
                          join tb_usuario_has_tb_equipe
                        on tb_pergunta.id_usuario = tb_usuario.id_usuario
                        and tb_usuario_has_tb_equipe.tb_equipe_id_equipe = tb_equipe.id_equipe
        
                  where tb_usuario_has_tb_equipe.id_usuario = :aidUser or tb_usuario_has_tb_equipe.tb_equipe_id_equipe = :aidEquipe  ORDER BY tb_pergunta.data_criacao ASC";

        $args = "aidUser={$id_usuario}&aidEquipe={$id_equipe}";

        $list = new Read();
        $list->FullRead($query,$args);
        $this->result = $list->getResult();
        $this->rowCount = $list->getRowCount();
    }

    /* -------------- FUNÇÃO ATUALIZAR USUARIO ----------- */

    public function updatePergunta(array $dados)
    {
        $id_usuario = $dados['id'];
        $update = new Update();
        $update->ExeUpdate($this->TABELA, $dados, $this->WHERE_PERGUNTA, "aid={$id_usuario}");
        $this->result = $update->getResult();
    }

    /* -------------- FUNÇÃO DELETAR USUARIO ----------- */

    public function deletePergunta($url)
    {
        $delete = new Delete();
        $delete->ExeDelete($this->TABELA, $this->WHERE_PERGUNTA, "aid={$url}");
        $this->result = $delete->getResult();
    }

    public function showFullPergunta($URL)
    {
     $query = "SELECT 
        tb_pergunta.pergunta,
        tb_pergunta.descricao_resposta,
        tb_imagem.url_imagem AS op_a,
        tb_pergunta.op_correta,
        tb_pergunta.url_audio,
          (SELECT
    	    tb_imagem.url_imagem	
          FROM
     	    tb_imagem
          WHERE 
     	    tb_imagem.id_imagem = tb_pergunta.id_imagem_op_b) AS op_b,
        
         (SELECT
    	    tb_imagem.url_imagem	
         FROM
     	    tb_imagem
        WHERE 
     	    tb_imagem.id_imagem = tb_pergunta.id_imagem_op_c) AS op_c     
    FROM
	    tb_pergunta JOIN tb_imagem 
    ON    
        tb_pergunta.id_imagem_op_a = tb_imagem.id_imagem
    WHERE tb_pergunta.id_pergunta = :aid";

        $args = "aid={$URL}";
        $read = new Read();
        $read->FullRead($query, $args);
       
        if ($read->getRowCount() > 0) :
            $this->result = $read->getResult()[0];
            $this->rowCount = $read->getRowCount();
        else :
            $this->result = null;
        endif;
    }

    public function showConteudoPergutaUsuario($URL){
        $query = "select tb_pergunta.pergunta, tb_pergunta.descricao_resposta from tb_pergunta
                  join tb_equipe
                  on tb_pergunta.id_usuario = tb_equipe.adm_equipe
                  where tb_equipe.adm_equipe = :aid";
                
        $args = "aid={$URL}";

        $read = new Read();
        $read->FullRead($query,$args);

        if($read->getRowCount() > 0):
             $this->result = $read->getResult()[0];
             $this->rowCount = $read->getRowCount();
        else:
            $this->result = null;
        endif;
    }
}
