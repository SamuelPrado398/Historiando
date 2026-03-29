<?php


include 'config.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$aluno = array();
if ($id > 0) {
    //abrir conexao com o banco

    $conexao = new PDO (dsn, usuario, senha);

    //montar consulta
    $sql = "SELECT * FROM aluno WHERE id = :id";

    //prepara consulta
    $comando = $conexao->prepare($sql);

    //enviar parametros da consulta
    $comando->bindParam(':id', $id);

    //executar consulta
    $comando->execute();

    //listar os registros no banco
    $aluno = $comando->fetch();
}


//abrir conexao com o banco

$conexao = new PDO (dsn, usuario, senha);

//montar consulta
$sql = "SELECT * FROM aluno";

//prepara consulta
$comando = $conexao->prepare($sql);

//enviar parametros da consulta

//executar consulta
$comando->execute();

//listar os registros no banco
$registros = $comando->fetchAll();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Atividades Escolares</title>


    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20px;
    }
    div {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>


</head>
<body>
    <div>
    <form action="atualizar.php" method="post">
    <label for="id">ID:</label>
    <input type="number" name="id" id="id" value="<?= isset($aluno['id']) ? $aluno['id'] : 0 ?>" readonly>
    <br><br>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?= isset($aluno['nome']) ? $aluno['nome'] : '' ?>">
    <br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?= isset($aluno['email']) ? $aluno['email'] : '' ?>">
    <br><br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" value="<?= isset($aluno['senha']) ? $aluno['senha'] : '' ?>">
    <br><br>
    <label for="matricula">Matrícula:</label>
    <input type="number" name="matricula" id="matricula" value="<?= isset($aluno['matricula']) ? $aluno['matricula'] : '' ?>">
    <br><br>
    <label for="nome_atividade">Nome da Atividade:</label>
    <input type="text" name="nome_atividade" id="nome_atividade" value="<?=isset($aluno['nome_atividade']) ? $aluno['nome_atividade'] : '' ?>">
    <br><br>
    <label for="descricao">Descrição:</label>
    <textarea rows="4" cols="40" name="descricao" id="descricao" required><?= isset($aluno['descricao']) ? $aluno['descricao'] : '' ?></textarea>
    <br><br>
    <input type="submit" value="Alterar">
</form>
</div>

</body>
</html>