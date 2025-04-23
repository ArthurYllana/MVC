<?php

require_once "../models/Cliente.php";
require_once "../models/Database.php";

class ClienteController {
    private $clienteModel;
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->clienteModel = new Cliente($this->db->getConnection());
    }

    public function listarTodos() {
        $clientes = $this->clienteModel->buscarTodos();
        include "../views/ClienteListarTodos.php";
    }

    public function adicionar($nome, $email, $telefone) {
        if ($this->clienteModel->inserir($nome, $email, $telefone)) {
            echo "<p>Usuário adicionado com sucesso!</p>";
        } else {
            echo "<p>Erro ao adicionar usuário.</p>";
        }
    }

    public function atualizar($id, $nome, $email, $telefone) {
        if ($this->clienteModel->alterar($id, $nome, $email, $telefone)) {
            echo "<p>Usuário atualizado com sucesso!</p>";
        } else {
            echo "<p>Erro ao atualizar usuário.</p>";
        }
    }

    public function deletar($id) {
        if ($this->clienteModel->apagar($id)) {
            echo "<p>Usuário deletado com sucesso!</p>";
        } else {
            echo "<p>Erro ao deletar usuário.</p>";
        }
    }

    public function consultar($id) {
        $usuario = $this->clienteModel->buscar($id);
        if ($usuario) {
            $_POST = array_merge($_POST, $usuario);
            echo "<p>Usuário encontrado. Preencha o formulário para editar.</p>";
        } else {
            echo "<p>Usuário não encontrado.</p>";
        }
    }
}