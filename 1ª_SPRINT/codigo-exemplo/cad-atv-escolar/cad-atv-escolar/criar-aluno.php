<?php
    
    include 'config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';     

        $conexao = new PDO(dsn, usuario, senha);

        $sql = "INSERT INTO aluno (nome, email, senha) 
                VALUES (:nome, :email, :senha)";
        $comando = $conexao->prepare($sql);

        $comando->bindValue(':nome', $nome);
        $comando->bindValue(':email', $email);
        $comando->bindValue(':senha', $senha);


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
