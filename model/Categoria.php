<?php
namespace model;

class Categoria {
    public int $id;
    public string $descricao;

    public function __construct() {

    }

    public function getId() {
        return $this->id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function setDescricao(string $descricao) {
        $this->descricao = $descricao;
    }
}
?>