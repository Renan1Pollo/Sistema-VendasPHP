<?php
namespace bll;

use model\Cliente;
use dao\ClienteDao;

include_once 'C:\xampp\htdocs\Sistema-VendasPHP\dao\ClienteDao.php';

class ClienteBll {

    public function findAll() {
        $dao = new ClienteDao();
        return $dao->findAll();
    }

    public function findById(int $id) {
        $dao = new ClienteDao();
        return $dao->findById($id);
    }

    public function findByNome(string $nome) {
        $dao = new ClienteDao();
        return $dao->findByNome($nome);
    }

    public function save(Cliente $cliente) {
        $dao = new ClienteDao();
        return $dao->save($cliente);
    }

    public function update(Cliente $cliente) {
        $dao = new ClienteDao();
        return $dao->update($cliente);
    }

    public function deleteById(int $id) {
        $dao = new ClienteDao();
        return $dao->deleteById($id);
    }
}
?>