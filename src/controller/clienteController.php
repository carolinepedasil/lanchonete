<?php
require "../model/conexao.php";
require "../model/cliente.php";
include "variaveisCliente.php";

$objCliente = new Cliente(); //instância da classe cliente

//popular o objeto
$objCliente->setCodigo($codigo);
$objCliente->setNome($nome);
$objCliente->setEndereco($endereco);
$objCliente->setTelefone($telefone);

//carrego todos os dados do cliente no vetor $dados
$cliente = $objCliente->listarTodos($conexao);

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $acao = $_GET['acao'];

    if ($acao == 'excluir') {
        if ($objCliente->excluirCliente($conexao, $codigo))
            header("location:../view/index.php"); //redireciono para página inicial
    }
    elseif($acao == 'editar'){
        $dadoscodigo = $objCliente->listarporCodigo($conexao, $codigo);
        while($dadosCliente=$dadoscodigo->fetch_object()){
            //variaveis
            $codigo = $dadosCliente->codigo;
            $nome = $dadosCliente->nome;
            $endereco = $dadosCliente->endereco;
            $telefone = $dadosCliente->telefone;
            $edicao = true;
        }
    }
}elseif(isset($_POST['edicao'])){
    echo 'chegou';
        if($objCliente->atualizarCliente($conexao, $objCliente)){
        header("location:../view/index.php");
    }else{
        echo "Erro ao inserir!";
    }
}elseif(isset($_POST['codigo'])){
    if($objCliente->inserirCliente($conexao, $objCliente)){
        header("location:../view/index.php");
    }
}
