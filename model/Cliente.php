<?php
namespace model;

class Cliente {
    private $id;
    private $nome;
    private $dataNascimento;
    private $cpf;
    private $estado;
    private $cidade;
    private $telefone;

    public function __construct() {

    }

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function setDataNascimento(string $dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf(string $cpf) {
        $this->cpf = $cpf;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado(string $estado) {
        $this->estado = $estado;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade(string $cidade) {
        $this->cidade = $cidade;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone(string $telefone) {
        $this->telefone = $telefone;
    }
}

?>