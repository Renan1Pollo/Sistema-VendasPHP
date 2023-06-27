<?php

use bll\ClienteBll;
use model\Cliente;

include_once '../../model/Cliente.php';
include_once '../../bll/ClienteBll.php';

$cliente = new Cliente();
$cliente->setId($_POST['txtId']);
$cliente->setNome($_POST['nome']);
$cliente->setDataNascimento($_POST['data_nascimento']);
$cliente->setCpf($_POST['cpf']);
$cliente->setEstado($_POST['estado']);
$cliente->setCidade($_POST['cidade']);
$cliente->setTelefone($_POST['telefone']);


$bll = new ClienteBll();
$bll->update($cliente);

header("location: lstClientes.php");
?>
