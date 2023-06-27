<?php
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
                        <h3>Lista de Produtos</h4>
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
                                
                                    <tr>
                                        <td>
                                     a
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            <a class="btn btn-danger btn-sm">Excluir</a>
                                        </td>
                                    </tr>
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
            location.href = 'remoProduto.php?id=' + id;
        }
    }
</script>