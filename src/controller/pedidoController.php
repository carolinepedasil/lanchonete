<?php
require "../model/conexao.php";
require "../model/pedido.php";
include "variaveisPedido.php";

$objPedido = new Pedido(); //instância da classe pedido

//popular o objeto
$objPedido->setCodigoPedido($codigoPedido);
$objPedido->setNomePedido($nomePedido);
$objPedido->setLanchePedido($lanchePedido);
$objPedido->setAdicionalPedido($adicionalPedido);
$objPedido->setBebidaPedido($bebidaPedido);
$objPedido->setBebidaGeladaPedido($bebidaGeladaPedido);
$objPedido->setBebidaTipoPedido($bebidaTipoPedido);
$objPedido->setAdicionalListaPedido($adicionalListaPedido);
$objPedido->setDataPedido($dataPedido);
$objPedido->setObservacoesPedido($observacoesPedido);
$objPedido->setTotalPedido($totalPedido);

//carrego todos os dados do cliente no vetor $dados
$pedido = $objPedido->listarTodos($conexao);

// echo "POST" . implode(',', $_POST) . "<br>";
// echo "GET" . implode(',', $_GET) . "<br>";
// echo "REQUEST" . implode(',', $_REQUEST) . "<br>";
// echo "ENV" . implode(',', $_ENV). "<br>";

// if(isset($_POST['codigo'])){

//     if($objPedido->inserirPedido($conexao, $objPedido)){
//         header("location:../view/index.php");
//     }
// }

if (isset($_POST['botaoNovo'])) {
    header("location:../view/index.php?pagina=pedido&codigo=" . $objPedido->ultimoId($conexao));
} elseif (isset($_POST['codigoPedido'])) {
    if ($objPedido->inserirPedido($conexao, $objPedido)) {
        header("location:../view/index.php");
    }
}
