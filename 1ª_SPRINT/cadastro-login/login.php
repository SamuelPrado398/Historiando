<?php
include '../includes/verificacao/start.php';
include '../includes/bd/config.inc.php';


$email_usuario = isset($_POST['email_usuario']) ? $_POST['email_usuario'] : "";
$senha_usuario = isset($_POST['senha_usuario']) ? $_POST['senha_usuario'] : "";


$conexao = new PDO(dsn, usuario, senha);

$sql = "SELECT id_usuario,nome_usuario,email_usuario,senha_usuario
        FROM usuario
        WHERE email_usuario = :email_usuario 
        AND senha_usuario = :senha_usuario";

$comando = $conexao->prepare($sql);
$comando->bindValue(':email_usuario', $email_usuario);
$comando->bindValue(':senha_usuario', $senha_usuario);
$comando->execute();
$registro = $comando->fetch();
if($registro){
    session_start();
    $_SESSION['id_usuario'] = $registro['id_usuario'];
    $_SESSION['nome_usuario'] = $registro['nome_usuario'];
    header('Location: ../index.php');
} else {
    echo "<script>alert('Nome ou senha inválidos');</script>";
    header('Location: login.html');
}



?>