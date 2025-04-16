<?php

class Cliente {
    // atributos
    private $conexao; // tipo Database
    private $tableName = "usurario";
    public $id;
    public $nome;
    public $email;
    public $telefone;

    // métodos
    public function __construct($db) {
        $this->conexao = $db;
    }

    public function buscarTodos() {
        $comandoSQL = "SELECT * from ".$this->tableName;
        $acesso = $this->conexao->prepare($comandoSQL);
        $acesso->execute();
        return $acesso;
    }

    public function buscar() {

    }

    public function inserir() {

    }

    public function apagar() {

    }

    public function alterar() {

    }
}