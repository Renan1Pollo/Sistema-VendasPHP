<?php

use bll\VendaBll;
use bll\ProdutoBll;
use bll\ClienteBll;

include_once '../../bll/VendaBll.php';
include_once '../../bll/ProdutoBll.php';
include_once '../../bll/ClienteBll.php';


if (isset($_GET['busca']))
    $busca = $_GET['busca'];
else
    $busca = null;

$bll = new VendaBll();
$produtoBll = new ProdutoBll();
$clienteBll = new ClienteBll();

if ($busca == null) {
    $lstVenda = $bll->findAll();
} elseif (is_numeric($busca)) {
    $venda = $bll->findById($busca);
    if ($venda != null)
        $lstVenda = [$venda];
    else
        $lstVenda = [];
} else {
    $lstVenda = $bll->findByDataVenda($busca);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../view/css/formatacao.css">
    <title>Listar Vendas</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Vendas</h4>
                    </div>
                    <div class="card-search">
                        <form action="../venda/lstVendas.php" method="GET" id="" class="">
                            <h5>Pesquisa de Vendas</h5>
                            <div class="teste">
                                <input type="text" class="input-pesquisa" id="txtBusca" name="busca">
                                <button type="submit" class="btn btn-primary float-end"><span>Pesquisar</span></button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID da Venda</th>
                                    <th>Produto</th>
                                    <th>Cliente</th>
                                    <th>Data</th>
                                    <th>Qtde Vendida</th>
                                    <th>Valor</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lstVenda as $venda) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $venda->getId(); ?>
                                        </td>
                                        <td>
                                            <?php
                                            $produto = $produtoBll->findById($venda->getIdProduto());
                                            echo $produto->getDescricao();
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $cliente = $clienteBll->findById($venda->getIdCliente());
                                            echo $cliente->getNome();
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $venda->getDataVenda(); ?>
                                        </td>
                                        <td>
                                            <?php echo $venda->getQtdeVendida(); ?>
                                        </td>
                                        <td>
                                            <?php echo $venda->getValor(); ?>
                                        </td>
                                        <td>
                                            <a href="addVenda.php" class="btn btn-primary btn-sm">Adicionar
                                                Venda</a>

                                            <a href="attVenda.php?id=<?= $venda->getId(); ?>" class="btn btn-success btn-sm">Editar</a>

                                            <a onclick="JavaScript:remover(<?php echo $venda->getId(); ?>)" class="btn btn-danger btn-sm">Excluir</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="card-compra">
                            <a onclick="JavaScript:updateEstoque()" href="index.php" class="btn btn-primary">Vender</a>
                            <?php
                                $valorTotal = 0;
                                foreach ($lstVenda as $venda) {
                                    $produto = $produtoBll->findById($venda->getIdProduto());
                                    $valorTotal += $venda->getValor() * $produto->getQtdeEstoque();
                                } 
                            ?>
                            <input type="text" class="float-end" value="<?php echo $valorTotal; ?>" readonly>
                            <label id="valor-total" class="float-end ">Valor Total da Compra:</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <h4>
                            <a href="../control-painel/controlPainel.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer" class="footer white-bg">
        <p>Feito com <span class="heart">♥</span> <a href="https://beacons.ai/renanpollo" target="_blank">Renan Pollo
                Benelli</a></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>

<script>
    function remover(id) {
        if (confirm('Excluir a Venda ' + id + '?')) {
            location.href = 'remoVenda.php?id=' + id;
        }
    }

    function updateEstoque() {
        let resposta = prompt("Digite o id da Venda: ");
        location.href = 'updateVenda.php?id=' + id;
    }
</script>