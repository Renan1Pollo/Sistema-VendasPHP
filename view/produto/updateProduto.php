<?php

use bll\ProdutoBll;
use model\Produto;

include_once '../../model/Produto.php';
include_once '../../bll/ProdutoBll.php';

$produto = new Produto();
$produto->setId($_POST['txtId']);
$produto->setDescricao($_POST['descricao']);
$produto->setQtdeEstoque($_POST['qtde_estoque']);
$produto->setValorUnitario($_POST['valor_unitario']);
$produto->setIdCategoria($_POST['idCategoria']);

$bll = new ProdutoBll();
$bll->update($produto);

header("location: lstProdutos.php");
?>
