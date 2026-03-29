<?php

include 'config.php';


$id = isset($_POST['id']) ? $_POST['id'] : 0;
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$matricula = isset($_POST['matricula']) ? $_POST['matricula'] : '';
$nome_atividade = isset($_POST['nome_atividade']) ? $_POST['nome_atividade'] : '';
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
if($nome != '' && $email != '' && $matricula != '' && $nome_atividade != '' && $descricao != ''){

$conexao = new PDO (dsn, usuario, senha);

$sql = "UPDATE aluno SET 
        nome = :nome,
        email = :email,
        matricula = :matricula,
        nome_atividade = :nome_atividade,
        descricao = :descricao 
        WHERE id = :id";

    
    $comando = $conexao->prepare($sql);

    $comando->bindValue(':nome', $nome);
    $comando->bindValue(':email', $email);
    $comando->bindValue(':matricula', $matricula);
    $comando->bindValue(':nome_atividade', $nome_atividade);
    $comando->bindValue(':descricao', $descricao);
    $comando->bindValue(':id', $_POST['id']);


    if($comando->execute()){
        header('Location: listar.php');
    } else {
        echo "<script>alert('Erro ao atualizar o registro.');</script>";
    }
    //$comando->execute();
} else {
    echo "<script>alert('Preencha todos os campos.');</script>";
}



?>