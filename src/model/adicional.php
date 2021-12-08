<?php

class Adicional
{

    //atributos
    private $codigo;
    private $descricao;
    private $preco;

    //getters and setters
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }


    /**
     * Get the value of codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of preco
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * Set the value of preco
     *
     * @return  self
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }

    public function listarTodos($conexao)
    {
        //consulta banco de dados e trazer todos os registros do adicional
        $comandosql = "Select * from adicional";
        $dados = $conexao->query($comandosql);
        return $dados;
    }

    public function fecharConexao($conexao, $dados = null)
    {
        if ($dados != null)
            $dados->free_result();
        $conexao->close();
    }

    public function inserirAdicional($conexao, $obj)
    {
        $comandosql = "Insert into adicional(codigo, descricao, preco) values
        (null, '$obj->descricao', '$obj->preco')";
        if ($conexao->query($comandosql))
            return true;
    }
    public function listarporCodigo($conexao, $codigo)
    {
        $comandosql = "Select * from adicional where codigo=$codigo";
        $dados = $conexao->query($comandosql);
        return $dados;
    }

    public function listarporTipo($conexao, $categoria)
    {
        $comandosql = "Select * from produto where idcategoria=$categoria";
        $dados = $conexao->query($comandosql);
        return $dados;
    }

    public function atualizarAdicional($conexao, $obj)
    {
        $comandosql = "Update adicional set descricao = '$obj->descricao',
                        preco = '$obj->preco'
                        where codigo = $obj->codigo";   
        if ($conexao->query($comandosql))
            return true;
    }

    public function excluirAdicional($conexao, $codigo)
    {
        $comandosql = "Delete from adicional where codigo = $codigo";
        if ($conexao->query($comandosql))
            return true;
    }

    public function ultimoId($conexao){
        $comandosql = "select max(id)+1 as id from adicional";
        $dados=$conexao->query($comandosql);
        return $dados;

    }
}
