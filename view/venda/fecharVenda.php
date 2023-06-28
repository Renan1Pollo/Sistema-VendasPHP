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

    if ($produto !== null) {
        $produtoBll->updateEstoque($produto);
        $vendaBll->deleteById($venda->getId());
        header("location: lstVendas.php");
    }
} else {
    header("location: idNotFound.php");
}
