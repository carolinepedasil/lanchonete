<?php
    if(count($_POST) > 0) {
        // 1. Pegar os valores do formulário
        $nome  = $_POST["nome_produto"];
        $qtd   = $_POST["qtd_produto"];
        $obs   = $_POST["obs_produto"];
        $preco = $_POST["preco_produto"];
        // TODO pegar o código do usuário logado (chave estrangeira)

        try {
            include("conexao_bd.php");

            // 3. Verificar se email e senha estão no banco de dados
            $sql = "INSERT INTO item_pedido 
                    (cod_usuario, nome_produto, observacao, preco_und, quantidade) 
                    VALUES 
                    (?,?,?,?,?)";
            $stmt= $conn->prepare($sql);
            // TODO pegar o código do usuário logado:
            $stmt->execute([null, $nome, $obs, $preco, $qtd ]);
        
            $resultado["msg"] = "Item inserido com sucesso!";
            $resultado["cod"] = 1;
            $resultado["style"] = "alert-success";
        }
        catch(PDOException $e){
            $resultado["msg"] = "Inserção no banco de dados falhou: " . $e->getMessage();
            $resultado["cod"] = 0;
            $resultado["style"] = "alert-danger";
        }
        $conn = null;
    }

    include("pedido.php");

?>