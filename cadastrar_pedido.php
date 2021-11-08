<?php

    if(count($_POST) > 0) {
        // 1. Pegar os dados do formulário
        $email = $_POST['nome_produto'];
        $qtd = $_POST['qtd_produto'];
        $obs = $_POST['obs_produto'];
        $preco = $_POST['preco_produto'];
        // Pegar o código do usuário logado (chave)

        // Nas linhas de baixo vai tentar fazer conexão
        try {
            include("conexao_bd.php");
            // echo "Conexão realizada com sucesso!"; 

            // 3. Verificar se o email e a senha estão no banco de dados
            $sql = "INSERT INTO item_pedido 
                    (cod_usuario, nome_produto, observacao, preco, quantidade) 
                    VALUES 
                    (?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([null, $nome, $obs, $preco, $qtd]);

            //se der certo:
            $resultado["msg"] = "Item inserido com sucesso!";
            $resultado["cod"] = 1;
            $resultado["style"] = "alert-success";

        }
        //se falhar:
        catch(PDOException $e) {
            $resultado["msg"] = "Inserção no Banco de Dados falhou: " . $e->getMessage();
            $resultado["cod"] = 0;
            $resultado["style"] = "alert-danger";
        }
        $conn = null;
    }

    include("pedido.php");

?>