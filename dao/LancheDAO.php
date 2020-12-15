<?php
    include_once("../factory/factory.php");
    include_once("../domain/lanche.php"); 


    class DAO{
        
        public function salvarLanche($lanche){
          $query = "INSERT INTO lanche
          (lanche_nome,lanche_descricao,lanche_preco) 
          VALUES 
          (:lanche_nome,:lanche_descricao,:lanche_preco);";
            
            $statement = Connection::getConexao()->prepare($query);
            
            $statement->bindValue(":lanche_nome",$lanche->getNome());
            $statement->bindValue(":lanche_descricao",$lanche->getDescricao());
            $statement->bindValue(":lanche_preco",$lanche->getPreco());
            
            if($statement->execute()){
                return true;
            }else{
                return false; 
            }  
        }
        
    public function listarLanche(){
        $query = "SELECT * FROM lanche";
        $statement = Connection::getConexao()->prepare($query);
        
        if($statement->execute()){
            if($statement->rowCount() > 0){
                while($linha = $statement->fetch(PDO::FETCH_OBJ)){
                    $tabela[] =array(
                        "lanche_id" => $linha->lanche_id,
                        "lanche_nome" => $linha->lanche_nome,
                        "lanche_descricao" => $linha->lanche_descricao,
                        "lanche_preco" => $linha->lanche_preco,
						"opcao" => "<button class='btn btn-danger'onclick='deleteClick(" . $linha->lanche_id . ")'>Excluir</button>"
                    );
                }
                return $tabela;
            }
        }
    }    
    
	public function listarLanchePorID($id){
        $query = "SELECT * FROM lanche WHERE " . $id;
        $statement = Connection::getConexao()->prepare($query);
        
        if($statement->execute()){
            if($statement->rowCount() > 0){
                if($linha = $statement->fetch(PDO::FETCH_OBJ)){
                    $tabela[] =array(
                        "lanche_id" => $linha->lanche_id,
                        "lanche_nome" => $linha->lanche_nome,
                        "lanche_descricao" => $linha->lanche_descricao,
						"opcao" => "<button class='btn btn-danger'onclick='deleteClick(" . $linha->lanche_id . ")'>Excluir</button>"
                    );
                }
                return $tabela;
            }
        }
    }    
	
    public function deleteLanche($idLanche){
        $query = "DELETE FROM lanche WHERE lanche_id=:lanche_id";
        $statement = Connection::getConexao()->prepare($query);
        $statement->bindValue(":lanche_id",$idLanche);
        
        return $statement->execute();
    }
            
    public function atualizaLanche($lanche){
        $query = "UPDATE lanche SET lanche_nome = :lanche_nome, lanche_descricao=:lanche_descricao,lanche_preco=:lanche_preco WHERE lanche_id=:lanche_id";
        
        $statement = Connection::getConexao()->prepare($query);
        
        $statement->bindValue(":lanche_nome",$lanche->getNome());
            $statement->bindValue(":lanche_descricao",$lanche->getDescricao());
            $statement->bindValue(":lanche_preco",$lanche->getPreco());

        return $statement->execute();

    }
    
    }



?>