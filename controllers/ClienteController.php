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
            echo "<p class='success'>Usuário adicionado com sucesso!</p>";
        } else {
            echo "<p class='error'>Erro ao adicionar usuário.</p>";
        }
    }

    public function atualizar($id, $nome, $email, $telefone) {
        if ($this->clienteModel->alterar($id, $nome, $email, $telefone)) {
            echo "<p class='success'>Usuário atualizado com sucesso!</p>";
        } else {
            echo "<p class='error'>Erro ao atualizar usuário.</p>";
        }
    }

    public function deletar($id) {
        if ($this->clienteModel->apagar($id)) {
            echo "<p class='success'>Usuário deletado com sucesso!</p>";
        } else {
            echo "<p class='error'>Erro ao deletar usuário.</p>";
        }
    }

    public function editar($id) {
        $usuario = $this->clienteModel->buscar($id);
        if ($usuario) {
            // Armazenar na sessão em vez de usar $GLOBALS
            $_SESSION['usuario_edicao'] = $usuario;
            header("Location: ../views/index.php"); // Redirecionar para o formulário
            exit();
        } else {
            $_SESSION['mensagem'] = "<p class='error'>Usuário não encontrado.</p>";
            header("Location: ../views/index.php");
            exit();
        }
    }
}