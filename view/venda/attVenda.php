<?php

use bll\VendaBll;

include('../../bll/protected.php');
include_once '../../bll/VendaBll.php';

$id = $_GET['id'];

$bll = new VendaBll();
$venda = $bll->findById($id);
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../view/css/formatacao.css">
    <title>Editar Venda</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Editar Venda</h3>
                    </div>
                    <div class="card-body">
                        <form action="updateVenda.php" method="POST">
                            <input type="hidden" name="txtId" value="<?= $venda->getId(); ?>">

                            <div class="mb-3">
                                <label>ID do Cliente</label>
                                <input type="number" name="idCliente" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label>ID do Produto</label>
                                <input type="number" name="idProduto" class="form-control" placeholder="<?php echo $venda->getIdProduto(); ?>">
                            </div>

                            <div class="mb-3">
                                <label>Data da Venda</label>
                                <input type="date" name="data_venda" class="form-control" placeholder="<?php echo $venda->getDataVenda(); ?>">
                            </div>

                            <div class="mb-3">
                                <label>Quantidade Vendida</label>
                                <input type="number" name="qtde_vendida" class="form-control" placeholder="<?php echo $venda->getQtdeVendida(); ?>">
                            </div>

                            <div class="mb-3">
                                <label>Valor</label>
                                <input type="number" name="valor" class="form-control" placeholder="<?php echo $venda->getValorTotal(); ?>">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="atualizar-venda" class="btn btn-primary">
                                    Atualizar
                                </button>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer">
                        <h4>
                            <a href="../../view/venda/lstVendas.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer" class="footer white-bg">
        <p>Feito com <span class="heart">♥</span> <a href="https://beacons.ai/renanpollo" target="_blank">Renan Pollo Benelli</a></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>