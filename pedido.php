<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="cadastrar_pedido.php" method="POST">
        <h2>Escolha de itens do pedidos</h2>
        <br/>
        <div class="form-group">
            <label for="nome_produto">Nome do produto:</label>
            <input type="text" class="form-control" id="nome_produto" placeholder="Digite o produto">
        </div>
        <div class="form-group">
            <label for="qtd_produto">Quantidade:</label>
            <input type="number" class="form-control" id="qtd_produto" maxlengh="10">
        </div>
        <div class="form-group">
            <label for="obs_produto">Observação:</label>
            <input type="textarea" class="form-control" id="obs_produto" name="obs_produto">
        </div>
        <div class="form-group">
            <label for="preco_produto">Preço unitário:</label>
            <input type="text" class="form-control" id="preco_produto" name="preco_produto" >
        </div>
        <button type="submit" class="btn btn-primary">Adicionar item</button>
        <?php if(isset($resultado)): ?>
            <div class="alert <?= $resultado["style"] ?>">
                <?php $resultado["msg"]; ?>
            </div>
        <?php endif; ?>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>