<?php
namespace bll;

use dao\CategoriaDao;
use model\Categoria;

include_once 'C:\xampp\htdocs\Sistema-VendasPHP\dao\CategoriaDao.php';

class CategoriaBll {
    
    public function findAll() {
        $dao = new CategoriaDao();
        return $dao->findAll();
    }

    public function findById(int $id) {
        $dao = new CategoriaDao();
        return $dao->findById($id);
    }

    public function save(Categoria $categoria) {
        $dao = new CategoriaDao();
        return $dao->save($categoria);
    }

    public function update(Categoria $categoria) {
        $dao = new CategoriaDao();
        return $dao->update($categoria);
    }

    public function deleteById(int $id) {
        $dao = new CategoriaDao();
        return $dao->findAll();
    }
}
?>