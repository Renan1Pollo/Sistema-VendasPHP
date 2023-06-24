<?php
include_once '../../bll/CategoriaBll.php';
include_once 'C:\xampp\htdocs\Sistema-VendasPHP\model\Categoria.php';
use bll\CategoriaBll;
use model\Categoria;

$categoria = new Categoria();

$categoria->setDescricao($_POST['descricao']);

$bll = new CategoriaBll();
$bll->save($categoria);

header("location: lstCategorias.php");

?>