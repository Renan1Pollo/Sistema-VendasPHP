<?php

use bll\VendaBll;

include_once '../../bll/VendaBll.php';

$id = $_GET['id'];

$bll = new VendaBll();
$bll->deleteById($id);

header("location: lstVendas.php");

?>