<?php
    
    include '../includes/bd/config.inc.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome_usuario = isset($_POST['nome_usuario']) ? $_POST['nome_usuario'] : '';
        $email_usuario = isset($_POST['email_usuario']) ? $_POST['email_usuario'] : '';
        $senha_usuario = isset($_POST['senha_usuario']) ? $_POST['senha_usuario'] : '';   
        
        $conexao = new PDO(dsn, usuario, senha);

        $sql = "INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario) 
                VALUES (:nome_usuario, :email_usuario, :senha_usuario)";
        $comando = $conexao->prepare($sql);

        $comando->bindValue(':nome_usuario', $nome_usuario);
        $comando->bindValue(':email_usuario', $email_usuario);
        $comando->bindValue(':senha_usuario', $senha_usuario);

        if ($comando->execute()) {
            echo "<script>alert('Aluno cadastrado com sucesso!');</script>";
            header('Location: login.html');
        } else {
            echo "<script>alert('Erro ao cadastrar aluno.');</script>";
        }
    } else {
        echo "Método inválido: utilize POST.";
    }

    
?>