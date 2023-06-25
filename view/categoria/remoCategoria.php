<?php

use bll\CategoriaBll;

include_once '../../bll/CategoriaBll.php';

$id = $_GET['id'];

$bll = new CategoriaBll();
$bll->deleteById($id);

header("location: lstCategorias.php");

?>