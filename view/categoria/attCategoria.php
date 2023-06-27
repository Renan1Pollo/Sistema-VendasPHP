<?php
use bll\CategoriaBll;
include_once '../../bll/CategoriaBll.php';
$id = $_GET['id'];

$bll = new  CategoriaBll();
$categoria = $bll->findById($id);

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
    <title>Editar Categoria</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Editar Categoria</h3>
                    </div>
                    <div class="card-body">
                        <form action="updateCategoria.php" method="POST">
                            <input type="hidden" name="txtId" value="<?= $categoria->getId(); ?>">

                            <div class="mb-3">
                                <label>Descrição da Categoria</label>
                                <input type="text" name="txtDescricao" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="atualizar-categoria" class="btn btn-primary">
                                    Atualizar
                                </button>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer">
                        <h4>
                            <a href="../../view/categoria/lstCategorias.php" class="btn btn-danger float-end">Voltar</a>
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