<?php

include 'config.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
if ($id > 0) {
    //abrir conexao com o banco

    $conexao = new PDO (dsn, usuario, senha);

    //montar consulta
    $sql = "DELETE FROM aluno 
            WHERE id = :id";

    //prepara consulta
    $comando = $conexao->prepare($sql);

    //enviar parametros da consulta
    $comando->bindValue(':id', $id);

    //executar consulta
    if($comando->execute()){
        header('Location: listar.php');
    } else {
        echo "Erro ao excluir o registro.";
    }
} else {
    echo "ID inválido.";
}




?>