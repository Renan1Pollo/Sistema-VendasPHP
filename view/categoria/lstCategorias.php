<?php
include_once '../../bll/CategoriaBll.php';

use bll\CategoriaBll;

$bll = new CategoriaBll();

if (isset($_GET['busca']))
    $busca = $_GET['busca'];
else
    $busca = null;

if ($busca == null) {
    $lstCategoria = $bll->findAll();
} else {
    $categoria = $bll->findById($busca);
    if ($categoria !== null) {
        $lstCategoria = [$categoria];
    } else {
        $lstCategoria = [];
    }
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
    <link rel="stylesheet" href="../../view/css/categoria.css">
    <title>Listagem de Categorias</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Listagem de Categorias</h4>
                    </div>
                    <div class="card-search">
                        <form action="../categoria/lstCategorias.php" method="GET" id="" class="">
                            <h5>Pesquisa de Categorias</h5>
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
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lstCategoria as $categoria) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $categoria->getId(); ?>
                                        </td>
                                        <td>
                                            <?php echo $categoria->getDescricao(); ?>
                                        </td>
                                        <td>
                                            <a href="addCategoria.php" class="btn btn-primary btn-sm">Adicionar
                                                Categoria</a>
                                            <a href="attCategoria.php?id=<?= $categoria->getId(); ?>"
                                                class="btn btn-success btn-sm">Editar</a>
                                            <form action="categoria-delete.php" method="POST" class="d-inline">
                                                <input type="hidden" name="id" value="<?= $categoria->getId(); ?>">
                                                <button type="submit" name="delete_categoria"
                                                    class="btn btn-danger btn-sm">Excluir</button>
                                            </form>
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