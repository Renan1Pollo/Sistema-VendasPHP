<?php
include_once '../../bll/ClienteBll.php';

use bll\ClienteBll;

$bll = new ClienteBll();

if (isset($_GET['busca'])) {
    $busca = $_GET['busca'];
} else {
    $busca = null;
}

// verificação para o tipo de busca
if ($busca == null) {
    $lstCliente = $bll->findAll();
} else {
    $lstCliente = $bll->findByNome($busca);
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
    <title>Listagem de Clientes</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Listagem de Clientes</h4>
                    </div>
                    <div class="card-search">
                        <form action="../cliente/lstClientes.php" method="GET" id="" class="">
                            <h5>Pesquisa de Clientes</h5>
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
                                    <th>Nome</th>
                                    <th>Data de Nascimento</th>
                                    <th>cpf</th>
                                    <th>estado</th>
                                    <th>cidade</th>
                                    <th>telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lstCliente as $cliente) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $cliente->getId(); ?>
                                        </td>
                                        <td>
                                            <?php echo $cliente->getNome(); ?>
                                        </td>
                                        <td>
                                            <?php echo $cliente->getDataNascimento(); ?>
                                        </td>
                                        <td>
                                            <?php echo $cliente->getCpf(); ?>
                                        </td>
                                        <td>
                                            <?php echo $cliente->getEstado(); ?>
                                        </td>
                                        <td>
                                            <?php echo $cliente->getCidade(); ?>
                                        </td>
                                        <td>
                                            <?php echo $cliente->getTelefone(); ?>
                                        </td>
                                        <td>
                                            <a href="addCliente.php" class="btn btn-primary btn-sm">Adicionar
                                                Clientes</a>

                                            <a href="attProduto.php?id=<?= $cliente->getId(); ?>"
                                                class="btn btn-success btn-sm">Editar</a>

                                            <a onclick="JavaScript:remover(<?php echo $cliente->getId(); ?>)"
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
        if (confirm('Excluir o Cliente ' + id + '?')) {
            location.href = 'remoProduto.php?id=' + id;
        }
    }
</script>