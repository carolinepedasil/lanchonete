<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Escolha de itens do pedido</h2>
        <br/>
        <form action="cadastar_pedido.php" method="POST">
            <div class="form-group">
                <label for="nome_produto">Nome do produto: </label>
                <input type="text" class="form-control" id="nome_produto" name="nome_produto" placeholder="Digite produto">
            </div>
            <div class="form-group">
                <label for="qtd_produto">Quantidade: </label>
                <input type="number" class="form-control" id="qnt_produto" name="qtd_produto" maxlength="10">
            </div>
            <div class="form-group">
                <label for="qtd_produto">Observação: </label>
                <input type="text" class="form-control" id="obs_produto" name="obs_produto">
            </div>
            <div class="form-group">
                <label for="preco_produto">Preço: </label>
                <input type="text" class="form-control" id="preco_produto" name="preco_produto"> <!--- type="number" não permitiu adicionar virgula, então coloquei type="text" mesmo -->
            </div>
            <button type="submit" class="btn btn-primary">Adicionar item</button>
            <?php if( isset($resultado) ): ?>
                    <div class="alert <?=$resultado["style"]?> ">
                        <?php echo $resultado["msg"]; ?>
                    </div>
            <?php endif; ?>
        </form>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>