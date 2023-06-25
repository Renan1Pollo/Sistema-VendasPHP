<?php

namespace model;

class Produto {
    private $id;
    private $descricao;
    private $idCategoria;
    private $qtdeEstoque;
    private $valorUnitario;

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        return $this->id = $id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao(string $descricao) {
        return $this->descricao = $descricao;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function setIdCategoria(int $idCategoria) {
        return $this->idCategoria = $idCategoria;
    }

    public function getQtdeEstoque() {
        return $this->qtdeEstoque;
    }

    public function setQtdeEstoque(int $qtdeEstoque) {
        return $this->qtdeEstoque = $qtdeEstoque;
    }

    public function getValorUnitario() {
        return $this->valorUnitario;
    }

    public function setValorUnitario(float $valorUnitario) {
        return $this->valorUnitario = $valorUnitario;
    }
}