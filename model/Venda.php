<?php
class Venda {
    private $id;
    private $idCliente;
    private $dataVenda;
    private $valorTotal;
    
    public function __construct() {

    }
    
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

    public function getDataVenda() {
        return $this->dataVenda;
    }

    public function setDataVenda(string $dataVenda) {
        $this->dataVenda = $dataVenda;
    }

    public function getValorTotal() {
        return $this->valorTotal;
    }

    public function setValorTotal(float $valorTotal) {
        $this->valorTotal = $valorTotal;
    }

}
?>