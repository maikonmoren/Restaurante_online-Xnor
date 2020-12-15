<?php
    class Bebida{
        private $id;
        private $nome;
        private $valor;
        private $marca;
        
        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        
        public function getNome(){
            return $this->nome;
        }
        
        public function setNome($nome){
            $this->nome = $nome;
        }
        
        public function getValor(){
            return $this->valor;
        }
        
        public function setValor($valor){
            $this->valor = $valor;
        }
        
        public function getMarca(){
            return $this->marca;
        }
        
        public function setMarca($marca){
            $this->$marca = $marca;
        }
        
    }

?>