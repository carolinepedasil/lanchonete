<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/erro.log"); 

include "header.php";
include "modalAdicional.php";
require "../controller/adicionalController.php";

?>
<body class="container-fluid">

<h1> Cadastro de Adicional</h1>

<button type="button" class="btn btn-outline-primary" 
data-toggle="modal" data-target="#cadAdicional">Cadastrar</button>
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
    while ($objAdicional = $adicional -> fetch_object()) {
    ?> 
    <tr>
      <th scope="row"><?php echo $objAdicional->codigo;?></th>
      <td><?php echo $objAdicional->descricao;?></td>
      <td><?php echo $objAdicional->preco;?></td>
      <td> 
      <a href="editarAdicional.php?id=<?php echo $objAdicional->codigo?>&acao=editar">  
      <i class="bi bi-pencil-square"></i></a> 
        
      <a href="#" onclick="javascript: if (confirm('Você realmente deseja excluir este adicional'))location.href='../controller/adicionalController.php?id=<?php echo $objAdicional->codigo ?>&acao=excluir'">
      <i class="bi bi-trash"></i> </a> 
    </td>
    </tr>
    <?php }?>
  </tbody>
</table>


</div>

</body>
</html>