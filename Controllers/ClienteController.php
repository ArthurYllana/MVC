<?php

require_once "models/cliente.php";
require_once "models/Databese.php";
    class ClienteController{
        //Atributos
        private $clienteModel;
        private $db;

        //Métodos
        public function __construct(){
            $this->db = new Database();
            $this->clienteModel = new Cliente(db: $this->db);
        }

        public function listarTodos(){
            $clientes = $this->clienteModel->buscarTodos();
            require_once"Views/ClienteListarTodos.php";
        }
    }

?>