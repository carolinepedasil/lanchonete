<?php
require "../model/conexao.php";
require "../model/adicional.php";
include "variaveisAdicional.php";

$objAdicional = new Adicional(); //instância da classe adicional

//popular o objeto
$objAdicional->setCodigo($codigo);
$objAdicional->setDescricao($descricao);
$objAdicional->setPreco($preco);

//carrego todos os dados do adicional no vetor $dados
$adicional = $objAdicional->listarTodos($conexao);

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $acao = $_GET['acao'];

    if ($acao == 'excluir') {
        if ($objAdicional->excluirAdicional($conexao, $codigo))
            header("location:../view/index.php"); //redireciono para página inicial
    }
    elseif($acao == 'editar'){
        $dadoscodigo = $objAdicional->listarporCodigo($conexao, $codigo);
        while($dadosAdicional=$dadoscodigo->fetch_object()){
            //variaveis
            $codigo = $dadosAdicional->codigo;
            $descricao = $dadosAdicional->descricao;
            $preco = $dadosAdicional->preco;
            $edicao = true;
        }
    }
}elseif(isset($_POST['edicao'])){
    echo 'chegou';
        if($objAdicional->atualizarAdicional($conexao, $objAdicional)){
        header("location:../view/index.php");
    }else{
        echo "Erro ao inserir!";
    }
}elseif(isset($_POST['codigo'])){
    if($objAdicional->inserirAdicional($conexao, $objAdicional)){
        header("location:../view/index.php");
    }
}
