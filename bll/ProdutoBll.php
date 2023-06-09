<?php
namespace bll;

use dao\ProdutoDao;
use model\Produto;

include_once 'C:\xampp\htdocs\Sistema-VendasPHP\dao\ProdutoDao.php';

class ProdutoBll {

    public function findAll() {
        $dao = new ProdutoDao();
        return $dao->findAll();
    }

    public function findById(int $id) {
        $dao = new ProdutoDao();
        return $dao->findById($id);
    }

    public function findByDescricao(string $descricao) {
        $dao = new ProdutoDao();
        return $dao->findByDescricao($descricao);
    }

    public function save(Produto $produto) {
        $dao = new ProdutoDao();
        return $dao->save($produto);
    }

    public function update(Produto $produto) {
        $dao = new ProdutoDao();
        return $dao->update($produto);
    }
    
    public function updateEstoque(Produto $produto) {
        $dao = new ProdutoDao();
        return $dao->updateEstoque($produto);
    }
    
    public function deleteById(int $id) {
        $dao = new ProdutoDao();
        return $dao->deleteById($id);
    }

}
?>