<?php
include_once '../../bll/CategoriaBll.php';

use bll\CategoriaBll;

if (isset($_GET['busca'])) {
    $busca = $_GET['busca'];
} else {
    $busca = null;
}

$bll = new CategoriaBll();
if ($busca == null) {
    $lstCategoria = $bll->findAll();
} else {
    $lstCategoria = $bll->findById($busca);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
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
                        <h4>Listagem de Categorias
                            <a href="categoria-create.php" class="btn btn-primary float-end">Adicionar Categoria</a>
                        </h4>
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
                                        <td><?php echo $categoria->getId(); ?></td>
                                        <td><?php echo $categoria->getDescricao(); ?></td>
                                        <td>
                                            <a href="categoria-view.php?id=<?= $categoria->getId(); ?>" class="btn btn-info btn-sm">Visualizar</a>
                                            <a href="categoria-edit.php?id=<?= $categoria->getId(); ?>" class="btn btn-success btn-sm">Editar</a>
                                            <form action="categoria-delete.php" method="POST" class="d-inline">
                                                <input type="hidden" name="id" value="<?= $categoria->getId(); ?>">
                                                <button type="submit" name="delete_categoria" class="btn btn-danger btn-sm">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
