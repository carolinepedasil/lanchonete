<?php
require "../controller/adicionalController.php";
require "header.php";
?>

<body>
    <div class="container-fluid">
    <form action="../controller/adicionalController.php" method="post">
        <input type="hidden" name="edicao" value=<?php echo $edicao;?>>
        <label for="codigo">Código</label>
        <input type="number" class="form-control" id="codigo" name="codigo" value=<?php echo $codigo;?>>
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" value=<?php echo $descricao;?>>
        <label for="preco">Preço</label>
        <input type="text" class="form-control" id="preco" name="preco" value=<?php echo $preco;?>>
    
        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>
</div>
</body>

</html>