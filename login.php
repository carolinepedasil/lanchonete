<?php
    if(count($_POST) > 0) {
        // 1. Pegar os valores do formulário
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        try {
            include("conexao_bd.php");

            // 3. Verificar se email e senha estão no banco de dados
            $consulta = $conn->prepare("SELECT codigo FROM usuario WHERE email=:email AND senha=md5(:senha)"); //md5 é para criptografar a senha
            $consulta->bindParam(':email', $email, PDO::PARAM_STR);
            $consulta->bindParam(':senha', $senha, PDO::PARAM_STR);
            $consulta->execute();
        
            $r = $consulta->fetchAll(); 
            $qtd_usuarios = count($r);
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