<?php

namespace model;

class Venda {

    private $id;
    private $idCliente;
    private $idProduto;
    private $qtdeVendida;
    private $valor;
    private $dataVenda;

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdCliente(int $idCliente) {
        $this->idCliente = $idCliente;
    }

    public function getIdProduto() {
        return $this->idProduto;
    }

    public function setIdProduto(int $idProduto) {
        $this->idProduto = $idProduto;
    }

    public function getQtdeVendida() {
        return $this->qtdeVendida;
    }

    public function setQtdeVendida(int $qtdeVendida) {
        $this->qtdeVendida = $qtdeVendida;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor(float $valor) {
        $this->valor = $valor;
    }

    public function getDataVenda() {
        return $this->dataVenda;
    }

    public function setDataVenda($dataVenda) {
        $this->dataVenda = $dataVenda;
    }
}


?>