<?php
    class cliente{
        //Atributos
        private $conexao; //Tipo Database
        private $tableName = "Clientes";
        public $id;
        public $nome;
        public $email;
        public $telefone;
    
        //Métodos

        public function __construct($db){
            $this->conexao = $db;
        }

        public function lerTodos(){}

        public function buscarTodos(){
            $comandoSQL = "SELECT * FROM".$this->tableName;
            $acesso = $this->conexao->prepare($comandoSQL);
            //$acesso = $this->conexao->query($comandoSQL);
            $acesso->execute();
            return $acesso;
        }

        public function inserir(){}

        public function apagar(){}

        public function buscar(){}

        public function alterar(){}
    }
?>