<?php
include_once '../../bll/VendaBll.php';
include_once 'C:\xampp\htdocs\Sistema-VendasPHP\model\Venda.php';

use bll\VendaBll;
use model\Venda;

$venda = new Venda();
$venda->setIdCliente($_POST['idCliente']);
$venda->setIdProduto($_POST['idProduto']);
$venda->setDataVenda($_POST['data_venda']);
$venda->setQtdeVendida($_POST['qtde_vendida']);
$venda->setValorTotal($_POST['valor']);
$venda->setDataVenda($_POST['data_venda']);



$bll = new VendaBll();
$bll->save($venda);

header("location: lstVendas.php");

?>