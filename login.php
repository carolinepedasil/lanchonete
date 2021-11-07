<?php
    if(count($_POST) > 0) {
        // 1. Pegar os valores do formulário
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        // 2. Conexão com o banco de dados
        $servename = "localhost";
        $username = "root";
        $password = ""; //não tem senha, por isso está vazio

        try {
            $conn = new PDO("mysql:host=$servename;dbname=restaurante_bd", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Conexão realizada com sucesso.";

            // 3. Verificar se email e senha estão no banco de dados
            $stmt = $conn->prepare("SELECT codigo FROM usuario WHERE email=:email AND senha=md5(:senha)"); //md5 é para criptografar a senha
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
            $stmt->execute();
        
            $result = $stmt->fetchAll(); 
            $qtd_usuarios = count($result);
            if($qtd_usuarios == 1) {
                // TODO substituir pelo redirecionamento...
                $resultado["msg"] = "Usuário encontrado!";
                $resultado["cod"] = 1;
            } else if($qtd_usuarios == 0) {
                $resultado["msg"] = "E-mail e senha não conferem.";
                $resultado["cod"] = 0;
            }
        }
        catch(PDOException $e){
            echo "Conexão falhou: " . $e->getMessage();
        }
        $conn = null; //fechar a conexão

    }

    include("index.php");

?>