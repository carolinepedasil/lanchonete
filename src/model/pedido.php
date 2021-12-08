<?php

class Pedido
{
    //atributos
    private $codigoPedido;
    private $nomePedido;
    private $lanchePedido;
    private $adicionalPedido;
    private $bebidaPedido;
    private $bebidaGeladaPedido;
    private $bebidaTipoPedido;
    private $adicionalListaPedido;
    private $dataPedido;
    private $observacoesPedido;
    private $totalPedido;

    /**
     * Get the value of codigoPedido
     */ 
    public function getCodigoPedido()
    {
        return $this->codigoPedido;
    }

    /**
     * Set the value of codigoPedido
     *
     * @return  self
     */ 
    public function setCodigoPedido($codigoPedido)
    {
        $this->codigoPedido = $codigoPedido;

        return $this;
    }

    /**
     * Get the value of nomePedido
     */ 
    public function getNomePedido()
    {
        return $this->nomePedido;
    }

    /**
     * Set the value of nomePedido
     *
     * @return  self
     */ 
    public function setNomePedido($nomePedido)
    {
        $this->nomePedido = $nomePedido;

        return $this;
    }

    /**
     * Get the value of lanchePedido
     */ 
    public function getLanchePedido()
    {
        return $this->lanchePedido;
    }

    /**
     * Set the value of lanchePedido
     *
     * @return  self
     */ 
    public function setLanchePedido($lanchePedido)
    {
        $this->lanchePedido = $lanchePedido;

        return $this;
    }

    /**
     * Get the value of adicionalPedido
     */ 
    public function getAdicionalPedido()
    {
        return $this->adicionalPedido;
    }

    /**
     * Set the value of adicionalPedido
     *
     * @return  self
     */ 
    public function setAdicionalPedido($adicionalPedido)
    {
        $this->adicionalPedido = $adicionalPedido;

        return $this;
    }

    /**
     * Get the value of bebidaPedido
     */ 
    public function getBebidaPedido()
    {
        return $this->bebidaPedido;
    }

    /**
     * Set the value of bebidaPedido
     *
     * @return  self
     */ 
    public function setBebidaPedido($bebidaPedido)
    {
        $this->bebidaPedido = $bebidaPedido;

        return $this;
    }

    /**
     * Get the value of bebidaGeladaPedido
     */ 
    public function getBebidaGeladaPedido()
    {
        return $this->bebidaGeladaPedido;
    }

    /**
     * Set the value of bebidaGeladaPedido
     *
     * @return  self
     */ 
    public function setBebidaGeladaPedido($bebidaGeladaPedido)
    {
        $this->bebidaGeladaPedido = $bebidaGeladaPedido;

        return $this;
    }

    /**
     * Get the value of bebidaTipoPedido
     */ 
    public function getBebidaTipoPedido()
    {
        return $this->bebidaTipoPedido;
    }

    /**
     * Set the value of bebidaTipoPedido
     *
     * @return  self
     */ 
    public function setBebidaTipoPedido($bebidaTipoPedido)
    {
        $this->bebidaTipoPedido = $bebidaTipoPedido;

        return $this;
    }

    /**
     * Get the value of adicionalListaPedido
     */ 
    public function getAdicionalListaPedido()
    {
        return $this->adicionalListaPedido;
    }

    /**
     * Set the value of adicionalListaPedido
     *
     * @return  self
     */ 
    public function setAdicionalListaPedido($adicionalListaPedido)
    {
        $this->adicionalListaPedido = $adicionalListaPedido;

        return $this;
    }

    /**
     * Get the value of dataPedido
     */ 
    public function getDataPedido()
    {
        return $this->dataPedido;
    }

    /**
     * Set the value of dataPedido
     *
     * @return  self
     */ 
    public function setDataPedido($dataPedido)
    {
        $this->dataPedido = $dataPedido;

        return $this;
    }

    /**
     * Get the value of observacoesPedido
     */ 
    public function getObservacoesPedido()
    {
        return $this->observacoesPedido;
    }

    /**
     * Set the value of observacoesPedido
     *
     * @return  self
     */ 
    public function setObservacoesPedido($observacoesPedido)
    {
        $this->observacoesPedido = $observacoesPedido;

        return $this;
    }

    /**
     * Get the value of totalPedido
     */ 
    public function getTotalPedido()
    {
        return $this->totalPedido;
    }

    /**
     * Set the value of totalPedido
     *
     * @return  self
     */ 
    public function setTotalPedido($totalPedido)
    {
        $this->totalPedido = $totalPedido;

        return $this;
    }

    public function listarTodos($conexao)
    {
        //consulta banco de dados e trazer todos os registros do pedido
        $comandosql = "Select * from pedido";
        $dados = $conexao->query($comandosql);
        return $dados;
    }

    public function fecharConexao($conexao, $dados = null)
    {
        if ($dados != null)
            $dados->free_result();
        $conexao->close();
    }

    public function inserirPedido($conexao, $obj)
    {
        $comandosql = "Insert into pedido(codigoPedido, nomePedido, lanchePedido, adicionalPedido, bebidaPedido, bebidaGeladaPedido, bebidaTipoPedido, adicionalListaPedido, dataPedido, observacoesPedido, totalPedido) values
        (null, '$obj->nomePedido', '$obj->lanchePedido', '$obj->adicionalPedido', '$obj->bebidaPedido', '$obj->bebidaGeladaPedido', '$obj->bebidaTipoPedido', '$obj->adicionalListaPedido', '$obj->dataPedido', '$obj->observacoesPedido', '$obj->totalPedido')";
        if ($conexao->query($comandosql))
            return true;
    }
    public function listarporCodigo($conexao, $codigo)
    {
        $comandosql = "Select * from pedido where codigo=$codigo";
        $dados = $conexao->query($comandosql);
        return $dados;
    }

    public function listarporTipo($conexao, $categoria)
    {
        $comandosql = "Select * from produto where idcategoria=$categoria";
        $dados = $conexao->query($comandosql);
        return $dados;
    }

    public function atualizarPedido($conexao, $obj)
    {
        $comandosql = "Update pedido set nomePedido = '$obj->nomePedido',
                        lanchePedido = '$obj->lanchePedido', 
                        adicionalPedido = '$obj->adicionalPedido',
                        bebidaPedido = '$obj->bebidaPedido',
                        bebidaGeladaPedido = '$obj->bebidaGeladaPedido',
                        bebidaTipoPedido = '$obj->bebidaTipoPedido',
                        adicionalListaPedido = '$obj->adicionalListaPedido',
                        dataPedido = '$obj->dataPedido',
                        observacoesPedido = '$obj->observacoesPedido',
                        totalPedido='$obj->totalPedido'
                        where codigo = $obj->codigo";   
        if ($conexao->query($comandosql))
            return true;
    }

    public function excluirPedido($conexao, $codigo)
    {
        $comandosql = "Delete from pedido where codigo = $codigo";
        if ($conexao->query($comandosql))
            return true;
    }

    public function ultimoId($conexao){
        $comandosql = "select ifnull(max(codigoPedido),0) + 1 as codigoPedido from pedido";
        $this->codigoPedido = $conexao->query($comandosql);
        return $this->codigoPedido;
    }

    public function listarItensPedido($conexao, $pedido)
    {
        $comandosql = "Select * from itensPedido where idPedido=$pedido";
        $dados = $conexao->query($comandosql);
        return $dados;
    }
}
    