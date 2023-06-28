<?php
namespace dao;
use model\Produto;

include_once 'C:\xampp\htdocs\Sistema-VendasPHP\dao\conexao.php';
include_once 'C:\xampp\htdocs\Sistema-VendasPHP\model\Produto.php';

class ProdutoDao {

    public function findAll() {
        $sql = "SELECT * FROM `produto`;";

        $conn = Conexao::conectar(); 
        $result = $conn->query($sql); 
        Conexao::desconectar();

        $lstProdutos = []; 

        foreach ($result as $linha) {
            $produto = new Produto();
            $produto->setId($linha['id']);
            $produto->setDescricao($linha['descricao']);
            $produto->setQtdeEstoque($linha['qtde_estoque']);
            $produto->setValorUnitario($linha['valor_unitario']);
            $produto->setIdCategoria($linha['idCategoria']);

            $lstProdutos[] = $produto;
        }

        return $lstProdutos;
    }

    public function findById(int $id) {
        $sql = "SELECT * FROM produto WHERE id = :id;";
    
        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        Conexao::desconectar();
    
        if (!$linha) {
            return null;
        }
    
        $produto = new Produto();
        $produto->setId($linha['id']);
        $produto->setDescricao($linha['descricao']);
        $produto->setQtdeEstoque($linha['qtde_estoque']);
        $produto->setValorUnitario($linha['valor_unitario']);
    
        return $produto; 
    }

    public function findByDescricao(string $descricao) {
        $sql = "SELECT * FROM produto WHERE descricao LIKE :descricao ORDER BY descricao;";
    
        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);      // Trazer todos os produtos que contem oq foi digitado
        $query->bindValue(':descricao', '%' . $descricao . '%', \PDO::PARAM_STR);
        $query->execute();
        $linhas = $query->fetchAll(\PDO::FETCH_ASSOC);
        Conexao::desconectar();
    
        $produtos = [];
        foreach ($linhas as $linha) {
            $produto = new Produto();
            $produto->setId($linha['id']);
            $produto->setDescricao($linha['descricao']);
            $produto->setQtdeEstoque($linha['qtde_estoque']);
            $produto->setValorUnitario($linha['valor_unitario']);
            $produto->setIdCategoria($linha['idCategoria']);
    
            $produtos[] = $produto;
        }
    
        return $produtos;
    }
    
    public function save(Produto $produto) {
        $sql = "INSERT INTO produto (descricao, qtde_estoque, valor_unitario, idCategoria) 
                VALUES (:descricao, :qtdeEstoque, :valorUnitario, :idCategoria);";
    
        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':descricao', $produto->getDescricao(), \PDO::PARAM_STR);
        $query->bindValue(':qtdeEstoque', $produto->getQtdeEstoque(), \PDO::PARAM_INT);
        $query->bindValue(':valorUnitario', $produto->getValorUnitario(), \PDO::PARAM_STR);
        $query->bindValue(':idCategoria', $produto->getIdCategoria(), \PDO::PARAM_INT);
        $query->execute();
        Conexao::desconectar();
    }

    public function update(Produto $produto) {
        $sql = "UPDATE produto SET descricao = :descricao, qtde_estoque = :qtdeEstoque, valor_unitario = :valorUnitario, idCategoria = :idCategoria 
            WHERE id = :id;";

        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':id', $produto->getId(), \PDO::PARAM_INT);
        $query->bindValue(':descricao', $produto->getDescricao(), \PDO::PARAM_STR);
        $query->bindValue(':qtdeEstoque', $produto->getQtdeEstoque(), \PDO::PARAM_INT);
        $query->bindValue(':valorUnitario', $produto->getValorUnitario(), \PDO::PARAM_STR);
        $query->bindValue(':idCategoria', $produto->getIdCategoria(), \PDO::PARAM_INT);
        $query->execute();
        Conexao::desconectar();
    }

    public function deleteById(int $id) {
        $sql = "DELETE FROM produto WHERE id = :id;";

        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        Conexao::desconectar();
    }

    public function updateEstoque(Produto $produto) {
        $sql = "UPDATE produto SET qtde_estoque = :qtdeEstoque 
            WHERE id = :id;";

        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':id', $produto->getId(), \PDO::PARAM_INT);
        $query->bindValue(':qtdeEstoque', $produto->getQtdeEstoque(), \PDO::PARAM_INT);
        $query->execute();
        Conexao::desconectar();
    }

}
?>