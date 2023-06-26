<?php

use bll\ProdutoBll;

include_once '../../bll/ProdutoBll.php';

$id = $_GET['id'];

$bll = new ProdutoBll();
$bll->deleteById($id);

header("location: lstProdutos.php");

?>