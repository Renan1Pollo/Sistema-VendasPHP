<?php

use bll\ClienteBll;

include_once '../../bll/ClienteBll.php';

$id = $_GET['id'];

$bll = new ClienteBll();
$bll->deleteById($id);

header("location: lstClientes.php");

?>