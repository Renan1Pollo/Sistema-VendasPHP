<?php
include_once '../../bll/ProdutoBll.php';
include_once 'C:\xampp\htdocs\Sistema-VendasPHP\model\Produto.php';

use bll\ProdutoBll;
use model\Produto;

$produto = new Produto();
$produto->setDescricao($_POST['descricao']);
$produto->setQtdeEstoque($_POST['qtde_estoque']);
$produto->setValorUnitario($_POST['valor_unitario']);
$produto->setIdCategoria($_POST['idCategoria']);

$bll = new ProdutoBll();
$bll->save($produto);

header("location: lstProdutos.php");

?>