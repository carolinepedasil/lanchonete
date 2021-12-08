<?php
require "../controller/clienteController.php";
require "header.php";
?>

<body>
    <div class="container-fluid">
    <form action="../controller/clienteController.php" method="post">
        
        <input type="hidden" name="edicao" value=<?php echo $edicao;?>>
        <label for="codigo">Código</label>
        <input type="number" class="form-control" id="codigo" name="codigo" value=<?php echo $codigo;?>>
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value=<?php echo $nome;?>>
        <label for="endereco">Endereço</label>
        <input type="text" class="form-control" id="endereco" name="endereco" value=<?php echo $endereco;?>>
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone" value=<?php echo $telefone;?>>
    
        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>
</div>
</body>

</html>