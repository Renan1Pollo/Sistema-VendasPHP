<?php

namespace model;

class Venda {

    private $id;
    private $idCliente;
    private $idProduto;
    private $qtdeVendida;
    private $valorTotal;
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

    public function getValorTotal() {
        return $this->valorTotal;
    }

    public function setValorTotal(float $valorTotal) {
        $this->valorTotal = $valorTotal;
    }

    public function getDataVenda() {
        return $this->dataVenda;
    }

    public function setDataVenda($dataVenda) {
        $this->dataVenda = $dataVenda;
    }
}


?>