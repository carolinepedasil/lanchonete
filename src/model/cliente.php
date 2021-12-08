<?php

class Cliente
{

    //atributos
    private $codigo;
    private $nome;
    private $endereco;
    private $telefone;

    //getters and setters
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
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
     * Get the value of endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function listarTodos($conexao)
    {
        //consulta banco de dados e trazer todos os registros do cliente
        $comandosql = "Select * from cliente";
        $dados = $conexao->query($comandosql);
        return $dados;
    }

    public function fecharConexao($conexao, $dados = null)
    {
        if ($dados != null)
            $dados->free_result();
        $conexao->close();
    }

    public function inserirCliente($conexao, $obj)
    {
        $comandosql = "Insert into cliente(codigo, nome, endereco, telefone) values
        (null, '$obj->nome', '$obj->endereco', '$obj->telefone')";
        if ($conexao->query($comandosql))
            return true;
    }
    public function listarporCodigo($conexao, $codigo)
    {
        $comandosql = "Select * from cliente where codigo=$codigo";
        $dados = $conexao->query($comandosql);
        return $dados;
    }

    public function listarporTipo($conexao, $categoria)
    {
        $comandosql = "Select * from produto where idcategoria=$categoria";
        $dados = $conexao->query($comandosql);
        return $dados;
    }

    public function atualizarCliente($conexao, $obj)
    {
        $comandosql = "Update cliente set nome = '$obj->nome',
                        endereco = '$obj->endereco', telefone='$obj->telefone'
                        where codigo = $obj->codigo";   
        if ($conexao->query($comandosql))
            return true;
    }

    public function excluirCliente($conexao, $codigo)
    {
        $comandosql = "Delete from cliente where codigo = $codigo";
        if ($conexao->query($comandosql))
            return true;
    }

    public function ultimoId($conexao){
        $comandosql = "select max(id)+1 as id from cliente";
        $dados=$conexao->query($comandosql);
        return $dados;

    }
}
