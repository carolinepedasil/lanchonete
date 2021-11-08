<?php
    if(count($_POST) > 0) {
        // 1. Pegar os valores do formulário
        $nome  = $_POST["nome_produto"];
        $qtd   = $_POST["qtd_produto"];
        $obs   = $_POST["obs_produto"];
        $preco = $_POST["preco_produto"];
        // TODO pegar o código do usuário logado (chave estrangeira)
        
        // 2. Conexão com o banco de dados
        $servename = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servename;dbname=restaurante_bd", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Conexão realizada com sucesso.";

            // 3. Verificar se email e senha estão no banco de dados
            $sql = "INSERT INTO item_pedido 
                    (cod_usuario, nome_produto, observacao, preco_und, quantidade) 
                    VALUES 
                    (?,?,?,?,?)";
            $stmt= $conn->prepare($sql);
            // TODO pegar o código do usuário logado:
            $stmt->execute([null, $nome, $obs, $preco, $qtd ]);
        
            $resultado["msg"] = "Item inserido!";
            $resultado["cod"] = 1;
        }
        catch(PDOException $e){
            echo "Inserção no banco de dados falhou: " . $e->getMessage();
            $resultado["msg"] = "Item não inserido";
            $resultado["cod"] = 0;
        }
        $conn = null;
    }

?>