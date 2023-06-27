<?php

namespace model;

class Venda {

    private $id;
    private $idProduto;
    private $idCliente;
    private $qtdeVendida;
    private $valorTotal;
    private $dataVenda;

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        return $this->id = $id;
    }

    public function getIdProduto() {
        return $this->idProduto;
    }

    public function setIdProduto(int $idProduto) {
        return $this->idProduto = $idProduto;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdCliente(int $idCliente) {
        return $this->idCliente = $idCliente;
    }

    public function getQtdeVendida() {
        return $this->qtdeVendida;
    }

    public function setQtdeVendida(int $qtdeVendida) {
        return $this->qtdeVendida = $qtdeVendida;
    }

    public function getValorTotal() {
        return $this->valorTotal;
    }

    public function setValorTotal(float $valorTotal) {
        return $this->valorTotal = $valorTotal;
    }

    public function getDataVenda() {
        return $this->dataVenda;
    }

    public function setDataVenda(string $dataVenda) {
        return $this->dataVenda = $dataVenda;
    }
}

?>