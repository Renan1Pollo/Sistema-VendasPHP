<?php

use bll\VendaBll;
use model\Venda;

include_once '../../model/Venda.php';
include_once '../../bll/VendaBll.php';

$venda = new Venda();
$venda->setId($_POST['txtId']);
$venda->setIdCliente($_POST['idCliente']);
$venda->setIdProduto($_POST['idProduto']);
$venda->setDataVenda($_POST['data_venda']);
$venda->setQtdeVendida($_POST['qtde_vendida']);
$venda->setValor($_POST['valor']);
$venda->setValor($_POST['valor']);
$venda->setDataVenda($_POST['data_venda']);


$bll = new VendaBll();
$bll->update($venda);

header("location: lstVendas.php");

?>