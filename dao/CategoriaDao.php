<?php
namespace dao;
use model\Categoria;

include_once 'C:\xampp\htdocs\Sistema-VendasPHP\dao\conexao.php';
include_once 'C:\xampp\htdocs\Sistema-VendasPHP\model\Categoria.php';

class CategoriaDao {

    public function findAll() {
        $sql = "SELECT * FROM `categoria`;";

        $conn = Conexao::conectar(); 
        $result = $conn->query($sql); 
        Conexao::desconectar();

        $lstCategorias = []; 

        foreach ($result as $linha){
            $categoria = new Categoria();
            $categoria->setId($linha['id']); 
            $categoria->setDescricao($linha['descricao']);
            
            $lstCategorias[] = $categoria;
        }

        return $lstCategorias;
    }

    public function findById(int $id) {
        $sql = "SELECT * FROM categoria WHERE id = :id;";

        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        Conexao::desconectar();

        if (!$linha) {
            return null;
        }

        $categoria = new Categoria();
        $categoria->setId($linha['id']); 
        $categoria->setDescricao($linha['descricao']);

        return $categoria; 
    }

    public function save(Categoria $categoria) {
        $sql = "INSERT INTO categoria (descricao) VALUES (:descricao);";
    
        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':descricao', $categoria->getDescricao());
        $query->execute();
        Conexao::desconectar();
    }

    public function update(Categoria $categoria) {
        $sql = "UPDATE categoria SET descricao = :descricao WHERE id = :id;";

        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':descricao', $categoria->getDescricao());
        $query->bindValue(':id', $categoria->getId(), \PDO::PARAM_INT);
        $query->execute();
        Conexao::desconectar();
    }

    public function deleteById(int $id) {
        $sql = "DELETE FROM categoria WHERE id = :id;";
    
        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        Conexao::desconectar();
    }

}
?>