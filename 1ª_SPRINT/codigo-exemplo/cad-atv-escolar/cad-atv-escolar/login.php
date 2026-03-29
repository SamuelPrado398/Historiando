<?php

$email = isset($_POST['email']) ? $_POST['email'] : "";
$senha = isset($_POST['senha']) ? $_POST['senha'] : "";

include 'config.php';

$conexao = new PDO(dsn, usuario, senha);

$sql = "SELECT id,nome
        FROM aluno
        WHERE email = :email 
        AND senha = :senha";

$comando = $conexao->prepare($sql);
$comando->bindValue(':email', $email);
$comando->bindValue(':senha', $senha);
$comando->execute();
$registro = $comando->fetch();
if($registro){
    session_start();
    $_SESSION['id'] = $registro['id'];
    $_SESSION['nome'] = $registro['nome'];
    header('Location: listar.php');
} else {
    echo "<script>alert('Nome ou senha inválidos');</script>";
    header('Location: login.html');
}



?>