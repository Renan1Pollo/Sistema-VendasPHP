<?php
include_once '../../bll/ClienteBll.php';
include_once 'C:\xampp\htdocs\Sistema-VendasPHP\model\Cliente.php';

use bll\ClienteBll;
use model\Cliente;

$cliente = new Cliente();
$cliente->setNome($_POST['nome']);
$cliente->setDataNascimento($_POST['data_nascimento']);
$cliente->setCpf($_POST['cpf']);
$cliente->setEstado($_POST['estado']);
$cliente->setCidade($_POST['cidade']);
$cliente->setTelefone($_POST['telefone']);

$bll = new ClienteBll();
$bll->save($cliente);

header("location: lstClientes.php");

?>