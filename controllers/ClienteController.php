<?php

require_once "../models/Cliente.php";
require_once "../models/Database.php";

class ClienteController {
    // atributos
    private $clienteModel;
    private $db;

    // métodos
    public function __construct() { // construtor
        $this->db = new Database();
        $this->clienteModel = new Cliente($this->db->getConnection());
    }

    public function listarTodos() {
        $clientes = $this->clienteModel->buscarTodos();
        include "../views/ClienteListarTodos.php";
        
    }
}
