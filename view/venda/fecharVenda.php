<?php

use bll\VendaBll;
use bll\ProdutoBll;

include_once '../../bll/VendaBll.php';
include_once '../../bll/ProdutoBll.php';

$id = $_GET['id'];

$vendaBll = new VendaBll();
$venda = $vendaBll->findById($id);

if ($venda !== null) {
    $produtoBll = new ProdutoBll();
    $produto = $produtoBll->findById($venda->getIdProduto());

    if ($produto !== null && $venda->getQtdeVendida() <= $produto->getQtdeEstoque()) {
        $produtoBll->updateEstoque($produto);
        $vendaBll->deleteById($venda->getId());
        header("location: lstVendas.php");
    } else {
        die('Produto com estoque baixo<p><a href="lstVendas.php">Voltar</a></p>');
        
    }
} else {
    header("location: idNotFound.php");
}
