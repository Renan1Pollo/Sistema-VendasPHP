<?php

use bll\CategoriaBll;
use model\Categoria;

include_once '../../model/Categoria.php';
include_once '../../bll/CategoriaBll.php';

$categoria = new Categoria();

$categoria->setId($_POST['txtId']);
$categoria->setDescricao($_POST['txtDescricao']);

$bll = new CategoriaBll();
$bll->update($categoria);

header("location: lstCategorias.php");

?>