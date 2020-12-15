<?php
    include_once("../factory/factory.php");
    include_once("../domain/bebida.php"); 


    class DAO{
        
        public function salvarBebida($usuario){
          $query = "INSERT INTO bebida
          (bebida_nome,bebida_marca,bebida_valor) 
          VALUES 
          (:bebida_nome,:bebida_marca,:bebida_valor);";
            
            $statement = Connection::getConexao()->prepare($query);
            
            $statement->bindValue(":bebida_nome",$bebida->getNome());
            $statement->bindValue(":bebida_marca",$bebida->getMarca());
            $statement->bindValue(":bebida_valor",$bebida->getValor());
            
            if($statement->execute()){
                return true;
            }else{
                return false; 
            }  
        }
        
    public function listarBebida(){
        $query = "SELECT * FROM bebida";
        $statement = Connection::getConexao()->prepare($query);
        
        if($statement->execute()){
            if($statement->rowCount() > 0){
                while($linha = $statement->fetch(PDO::FETCH_OBJ)){
                    $tabela[] =array(
                        "bebida_id" => $linha->bebida_id,
                        "bebida_nome" => $linha->bebida_nome,
                        "bebida_marca" => $linha->bebida_marca,
                        "bebida_valor" => $linha->bebida_valor,
						"opcao" => "<button class='btn btn-danger'onclick='deleteClick(" . $linha->bebida_id . ")'>Excluir</button>"
                    );
                }
                return $tabela;
            }
        }
    }    
    
	public function listarUsuarioPorID($id){
        $query = "SELECT * FROM bebida WHERE " . $id;
        $statement = Connection::getConexao()->prepare($query);
        
        if($statement->execute()){
            if($statement->rowCount() > 0){
                if($linha = $statement->fetch(PDO::FETCH_OBJ)){
                    $tabela[] =array(
                        "bebida_id" => $linha->bebida_id,
                        "bebida_nome" => $linha->bebida_nome,
                        "bebida_marca" => $linha->bebida_marca,
                        "bebida_valor" => $linha->bebida_valor,
                        "opcao" => "<button class='btn btn-danger'onclick='deleteClick(" . $linha->bebida_id . ")'>Excluir</button>"
                    );
                }
                return $tabela;
            }
        }
    }    
	
    public function deleteBebida($idBebida){
        $query = "DELETE FROM bebida WHERE bebida_id=:bebida_id";
        $statement = Connection::getConexao()->prepare($query);
        $statement->bindValue(":bebida_id",$idBebida);
        
        return $statement->execute();
    }
            
    public function atualizaBebida($bebida){
        $query = "UPDATE bebida SET bebida_nome = :bebida_nome, bebida_marca=:bebida_marca,bebida_valor=:bebida_valor WHERE bebida_id=:bebida_id";
        
        $statement = Connection::getConexao()->prepare($query);
        
        $statement->bindValue(":bebida_nome",$bebida->getNome());
        $statement->bindValue(":bebida_marca",$bebida->getMarca());
        $statement->bindValue(":bebida_valor",$bebida->getValor());
    
        return $statement->execute();
    }
    
    }



?>