<?php

namespace dao;

use model\Venda;

include_once '../../dao/conexao.php';
include_once '../../model/Venda.php';

class VendaDao {

    public function findAll() {
        $sql = "SELECT * FROM venda";

        $conn = Conexao::conectar();
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        Conexao::desconectar();

        $lstVendas = [];

        foreach ($result as $linha) {
            $venda = new Venda();
            $venda->setId($linha['id']);
            $venda->setIdProduto($linha['idProduto']);
            $venda->setIdCliente($linha['idCliente']);
            $venda->setQtdeVendida($linha['qtde_vendida']);
            $venda->setValor($linha['valor']);
            $venda->setDataVenda($linha['data_venda']);

            $lstVendas[] = $venda;
        }

        return $lstVendas;
    }

    public function findById(int $id) {
        $sql = "SELECT * FROM venda WHERE id = :id;";
    
        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        Conexao::desconectar();
    
        if (!$linha) {
            return null;
        }
    
        $venda = new Venda();
        $venda->setId($linha['id']);
        $venda->setIdProduto($linha['idProduto']);
        $venda->setIdCliente($linha['idCliente']);
        $venda->setQtdeVendida($linha['qtde_vendida']);
        $venda->setValor($linha['valor']);
        $venda->setDataVenda($linha['data_venda']);
    
        return $venda; 
    }

    public function findByDataVenda(string $data) {
        $sql = "SELECT * FROM venda WHERE data_venda LIKE :data ORDER BY data_venda";
    
        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':data', '%' . $data . '%', \PDO::PARAM_STR);
        $query->execute();
        $linhas = $query->fetchAll(\PDO::FETCH_ASSOC);
        Conexao::desconectar();
    
        $lstVendas = [];
        foreach ($linhas as $linha) {
            $venda = new Venda();
            $venda->setId($linha['id']);
            $venda->setIdProduto($linha['idProduto']);
            $venda->setIdCliente($linha['idCliente']);
            $venda->setQtdeVendida($linha['qtde_vendida']);
            $venda->setValor($linha['valor']);
            $venda->setDataVenda($linha['data_venda']);
    
            $lstVendas[] = $venda;
        }
    
        return $lstVendas;
    }
    
    
    public function save(Venda $venda) {
        $sql = "INSERT INTO venda (idProduto, idCliente, qtde_vendida, valor, data_venda)
                VALUES (:idProduto, :idCliente, :qtdeVendida, :valor, :dataVenda)";

        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':idProduto', $venda->getIdProduto());
        $query->bindValue(':idCliente', $venda->getIdCliente());
        $query->bindValue(':qtdeVendida', $venda->getQtdeVendida());
        $query->bindValue(':valor', $venda->getValor());
        $query->bindValue(':dataVenda', $venda->getDataVenda());
        $query->execute();
        Conexao::desconectar();
    }
    

    public function update(Venda $venda) {
        $sql = "UPDATE venda SET idProduto = :idProduto, idCliente = :idCliente, 
                qtde_vendida = :qtdeVendida, valor = :valor, data_venda = :dataVenda 
                WHERE id = :id";

        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':idProduto', $venda->getIdProduto());
        $query->bindValue(':idCliente', $venda->getIdCliente());
        $query->bindValue(':qtdeVendida', $venda->getQtdeVendida());
        $query->bindValue(':valor', $venda->getValor());
        $query->bindValue(':dataVenda', $venda->getDataVenda());
        $query->bindValue(':id', $venda->getId());
        $query->execute();
        Conexao::desconectar();
    }
    
    public function deleteById(int $id) {
        $sql = "DELETE FROM venda WHERE id = :id;";

        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        Conexao::desconectar();
    }

}