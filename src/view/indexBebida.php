<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/erro.log"); 

include "header.php";
include "modalBebida.php";
require "../controller/bebidaController.php";

?>
<body class="container-fluid">

<h1> Cadastro de Bebida</h1>

<button type="button" class="btn btn-outline-primary" 
data-toggle="modal" data-target="#cadBebida">Cadastrar</button>
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
      while ($objBebida = $bebida -> fetch_object()) {
    ?> 
    <tr>
      <th scope="row"><?php echo $objBebida->codigo;?></th>
      <td><?php echo $objBebida->descricao;?></td>
      <td><?php echo $objBebida->preco;?></td>
      <td> 
      <a href="editarBebida.php?id=<?php echo $objBebida->codigo?>&acao=editar">  
      <i class="bi bi-pencil-square"></i></a> 
        
      <a href="#" onclick="javascript: if (confirm('Você realmente deseja excluir este bebida'))location.href='../controller/bebidaController.php?id=<?php echo $objBebida->codigo ?>&acao=excluir'">
      <i class="bi bi-trash"></i> </a> 
    </td>
    </tr>
    <?php }?>
  </tbody>
</table>


</div>

</body>
</html>