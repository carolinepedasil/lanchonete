<?php
require "../model/conexao.php";
require "../model/lanche.php";
include "variaveisLanche.php";

$objLanche = new Lanche(); //instância da classe lanche

//popular o objeto
$objLanche->setCodigo($codigo);
$objLanche->setDescricao($descricao);
$objLanche->setPreco($preco);

//carrego todos os dados do lanche no vetor $dados
$lanche = $objLanche->listarTodos($conexao);

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $acao = $_GET['acao'];

    if ($acao == 'excluir') {
        if ($objLanche->excluirLanche($conexao, $codigo))
            header("location:../view/index.php"); //redireciono para página inicial
    }
    elseif($acao == 'editar'){
        $dadoscodigo = $objLanche->listarporCodigo($conexao, $codigo);
        while($dadosLanche=$dadoscodigo->fetch_object()){
            //variaveis
            $codigo = $dadosLanche->codigo;
            $descricao = $dadosLanche->descricao;
            $preco = $dadosLanche->preco;
            $edicao = true;
        }
    }
}elseif(isset($_POST['edicao'])){
    echo 'chegou';
        if($objLanche->atualizarLanche($conexao, $objLanche)){
        header("location:../view/index.php");
    }else{
        echo "Erro ao inserir!";
    }
}elseif(isset($_POST['codigo'])){
    if($objLanche->inserirLanche($conexao, $objLanche)){
        header("location:../view/index.php");
    }
}
