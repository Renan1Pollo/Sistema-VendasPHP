<?php
include_once '../../bll/ProdutoBll.php';
include_once '../../bll/CategoriaBll.php';

use BLL\CategoriaBll;
use bll\ProdutoBll;

$bll = new ProdutoBll();
$categoriaBll = new CategoriaBll();

if (isset($_GET['busca'])) {
    $busca = $_GET['busca'];
} else {
    $busca = null;
}

// verificação para o tipo de busca
if ($busca == null) {
    $lstProduto = $bll->findAll();
} else {
    $lstProduto = $bll->findByDescricao($busca);
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
    <title>Listagem de Produtos</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Listagem de Produtos</h4>
                    </div>
                    <div class="card-search">
                        <form action="../produto/lstProdutos.php" method="GET" id="" class="">
                            <h5>Pesquisa de Produtos</h5>
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
                                    <th>ID</th>
                                    <th>Descrição</th>
                                    <th>Categoria</th>
                                    <th>Qtde em Estoque</th>
                                    <th>Valor Unitário</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lstProduto as $produto) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $produto->getId(); ?>
                                        </td>
                                        <td>
                                            <?php echo $produto->getDescricao(); ?>
                                        </td>
                                        <td>
                                            <?php $categoria = $categoriaBll->findById($produto->getIdCategoria());
                                            echo $categoria->getDescricao();
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $produto->getQtdeEstoque(); ?>
                                        </td>
                                        <td>
                                            <?php echo $produto->getValorUnitario(); ?>
                                        </td>
                                        <td>
                                            <a href="addProduto.php" class="btn btn-primary btn-sm">Adicionar
                                                Produtos</a>

                                            <a href="attCategoria.php?id=<?= $produto->getId(); ?>"
                                                class="btn btn-success btn-sm">Editar</a>

                                            <a onclick="JavaScript:remover(<?php echo $produto->getId(); ?>)"
                                                class="btn btn-danger btn-sm">Excluir</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>

<script>
    function remover(id) {
        if (confirm('Excluir o Produto ' + id + '?')) {
            location.href = 'remoCategoria.php?id=' + id;
        }
    }
</script>