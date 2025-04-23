<?php

class Cliente {
    private $conexao;
    private $tableName = "usuarios";
    public $id;
    public $nome;
    public $email;
    public $telefone;

    public function __construct($db) {
        $this->conexao = $db;
    }

    public function buscarTodos() {
        $comandoSQL = "SELECT * FROM ".$this->tableName;
        $acesso = $this->conexao->prepare($comandoSQL);
        $acesso->execute();
        return $acesso;
    }

    public function buscar($id) {
        $comandoSQL = "SELECT * FROM ".$this->tableName." WHERE ID = ?";
        $acesso = $this->conexao->prepare($comandoSQL);
        $acesso->execute([$id]);
        return $acesso->fetch(PDO::FETCH_ASSOC);
    }

    public function inserir($nome, $email, $telefone) {
        $comandoSQL = "INSERT INTO ".$this->tableName." (nome, email, telefone) VALUES (?, ?, ?)";
        $acesso = $this->conexao->prepare($comandoSQL);
        return $acesso->execute([$nome, $email, $telefone]);
    }

    public function apagar($id) {
        $comandoSQL = "DELETE FROM ".$this->tableName." WHERE ID = ?";
        $acesso = $this->conexao->prepare($comandoSQL);
        return $acesso->execute([$id]);
    }

    public function alterar($id, $nome, $email, $telefone) {
        $comandoSQL = "UPDATE ".$this->tableName." SET nome = ?, email = ?, telefone = ? WHERE ID = ?";
        $acesso = $this->conexao->prepare($comandoSQL);
        return $acesso->execute([$nome, $email, $telefone, $id]);
    }
}