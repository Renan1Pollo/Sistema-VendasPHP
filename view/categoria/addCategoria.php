<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../view/css/categoria.css">
    <title>Adicionar Categoria</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Adicionar Categoria</h3>
                    </div>
                    <div class="card-body">
                        <form action="../categoria/saveCategoria.php" method="POST">
                            <div class="mb-3">
                                <label>Descricao da Categoria</label>
                                <input type="text" name="descricao" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_categoria" class="btn btn-primary">Salvar</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>