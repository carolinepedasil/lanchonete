<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/erro.log");

include "header.php";
include "modalLanche.php";
require "../controller/lancheController.php";

?>

<body class="container-fluid">

  <h1> Cadastro de Lanche</h1>

  <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#cadLanche">Cadastrar</button>
  <div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Código</th>
          <th scope="col">Descrição</th>
          <th scope="col">Preço</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($objLanche = $lanche->fetch_object()) {
        ?>
          <tr>
            <th scope="row"><?php echo $objLanche->codigo; ?></th>
            <td><?php echo $objLanche->descricao; ?></td>
            <td><?php echo $objLanche->preco; ?></td>
            <td>
              <a href="editarLanche.php?id=<?php echo $objLanche->codigo ?>&acao=editar">
                <i class="bi bi-pencil-square"></i></a>

              <a href="#" onclick="javascript: if (confirm('Você realmente deseja excluir este lanche'))location.href='../controller/lancheController.php?id=<?php echo $objLanche->codigo ?>&acao=excluir'">
                <i class="bi bi-trash"></i> </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>


  </div>

</body>

</html>