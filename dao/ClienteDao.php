<?php
namespace dao;
use model\Cliente;

include_once 'C:\xampp\htdocs\Sistema-VendasPHP\dao\conexao.php';
include_once 'C:\xampp\htdocs\Sistema-VendasPHP\model\Cliente.php';

class ClienteDao {

    public function findAll() {
        $sql = "SELECT * FROM `cliente`;";

        $conn = Conexao::conectar(); 
        $result = $conn->query($sql); 
        Conexao::desconectar();

        $lstClientes = []; 

        foreach ($result as $linha) {
            $cliente = new Cliente();
            $cliente->setId($linha['id']);
            $cliente->setNome($linha['nome']);
            $cliente->setDataNascimento($linha['data_nascimento']);
            $cliente->setCpf($linha['cpf']);
            $cliente->setEstado($linha['estado']);
            $cliente->setCidade($linha['cidade']);
            $cliente->setTelefone($linha['telefone']);

            $lstClientes[] = $cliente;
        }

        return $lstClientes;
    }

    public function findById(int $id) {
        $sql = "SELECT * FROM cliente WHERE id = :id;";
    
        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        Conexao::desconectar();
    
        if (!$linha) {
            return null;
        }
    
        $cliente = new Cliente();
        $cliente->setId($linha['id']);
        $cliente->setNome($linha['nome']);
        $cliente->setDataNascimento($linha['data_nascimento']);
        $cliente->setCpf($linha['cpf']);
        $cliente->setEstado($linha['estado']);
        $cliente->setCidade($linha['cidade']);
        $cliente->setTelefone($linha['telefone']);
    
        return $cliente; 
    }

    public function findByNome(string $nome) {
        $sql = "SELECT * FROM cliente WHERE nome LIKE :nome ORDER BY nome;";
    
        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);      // Trazer todos os produtos que contem oq foi digitado
        $query->bindValue(':nome', '%' . $nome . '%', \PDO::PARAM_STR);
        $query->execute();
        $linhas = $query->fetchAll(\PDO::FETCH_ASSOC);
        Conexao::desconectar();
    
        $lstClientes = [];
        foreach ($linhas as $linha) {
            $cliente = new Cliente();
            $cliente->setId($linha['id']);
            $cliente->setNome($linha['nome']);
            $cliente->setDataNascimento($linha['data_nascimento']);
            $cliente->setCpf($linha['cpf']);
            $cliente->setEstado($linha['estado']);
            $cliente->setCidade($linha['cidade']);
            $cliente->setTelefone($linha['telefone']);
    
            $lstClientes[] = $cliente;
        }
    
        return $lstClientes;
    }
    
    public function save(Cliente $cliente) {
        $sql = "INSERT INTO cliente (nome, data_nascimento, cpf, estado, cidade, telefone) 
                VALUES (:nome, :dataNascimento, :cpf, :estado, :cidade, :telefone);";
    
        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':nome', $cliente->getNome(), \PDO::PARAM_STR);
        $query->bindValue(':dataNascimento', $cliente->getDataNascimento(), \PDO::PARAM_STR);
        $query->bindValue(':cpf', $cliente->getCpf(), \PDO::PARAM_STR);
        $query->bindValue(':estado', $cliente->getEstado(), \PDO::PARAM_STR);
        $query->bindValue(':cidade', $cliente->getCidade(), \PDO::PARAM_STR);
        $query->bindValue(':telefone', $cliente->getTelefone(), \PDO::PARAM_STR);
        $query->execute();
        Conexao::desconectar();
    }
    
    public function update(Cliente $cliente) {
        $sql = "UPDATE cliente SET nome = :nome, data_nascimento = :dataNascimento, cpf = :cpf, estado = :estado, cidade = :cidade, telefone = :telefone 
                WHERE id = :id;";
    
        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':id', $cliente->getId(), \PDO::PARAM_INT);
        $query->bindValue(':nome', $cliente->getNome(), \PDO::PARAM_STR);
        $query->bindValue(':dataNascimento', $cliente->getDataNascimento(), \PDO::PARAM_STR);
        $query->bindValue(':cpf', $cliente->getCpf(), \PDO::PARAM_STR);
        $query->bindValue(':estado', $cliente->getEstado(), \PDO::PARAM_STR);
        $query->bindValue(':cidade', $cliente->getCidade(), \PDO::PARAM_STR);
        $query->bindValue(':telefone', $cliente->getTelefone(), \PDO::PARAM_STR);
        $query->execute();
        Conexao::desconectar();
    }
    
    public function deleteById(int $id) {
        $sql = "DELETE FROM cliente WHERE id = :id;";

        $conn = Conexao::conectar();
        $query = $conn->prepare($sql);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        Conexao::desconectar();
    }

}
?>