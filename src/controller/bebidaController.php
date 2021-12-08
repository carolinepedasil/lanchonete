<?php
require "../model/conexao.php";
require "../model/bebida.php";
include "variaveisBebida.php";

$objBebida = new Bebida(); //instância da classe bebida

//popular o objeto
$objBebida->setCodigo($codigo);
$objBebida->setDescricao($descricao);
$objBebida->setPreco($preco);

//carrego todos os dados do bebida no vetor $dados
$bebida = $objBebida->listarTodos($conexao);

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $acao = $_GET['acao'];

    if ($acao == 'excluir') {
        if ($objBebida->excluirBebida($conexao, $codigo))
            header("location:../view/index.php"); //redireciono para página inicial
    }
    elseif($acao == 'editar'){
        $dadoscodigo = $objBebida->listarporCodigo($conexao, $codigo);
        while($dadosBebida=$dadoscodigo->fetch_object()){
            //variaveis
            $codigo = $dadosBebida->codigo;
            $descricao = $dadosBebida->descricao;
            $preco = $dadosBebida->preco;
            $edicao = true;
        }
    }
}elseif(isset($_POST['edicao'])){
    echo 'chegou';
        if($objBebida->atualizarBebida($conexao, $objBebida)){
        header("location:../view/index.php");
    }else{
        echo "Erro ao inserir!";
    }
}elseif(isset($_POST['codigo'])){
    if($objBebida->inserirBebida($conexao, $objBebida)){
        header("location:../view/index.php");
    }
}
