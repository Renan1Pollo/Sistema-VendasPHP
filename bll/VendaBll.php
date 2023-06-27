<?php
namespace bll;

use dao\VendaDao;
use model\Venda;

include_once 'C:\xampp\htdocs\Sistema-VendasPHP\dao\VendaDao.php';

class ProdutoBll {

    public function findAll() {
        $dao = new VendaDao();
        return $dao->findAll();
    }

    public function findById(int $id) {
        $dao = new VendaDao();
        return $dao->findById($id);
    }

    public function save(Venda $venda) {
        $dao = new VendaDao();
        return $dao->save($venda);
    }

    public function update(Venda $venda) {
        $dao = new VendaDao();
        return $dao->update($venda);
    }

    public function deleteById(int $id) {
        $dao = new VendaDao();
        return $dao->deleteById($id);
    }
}
?>