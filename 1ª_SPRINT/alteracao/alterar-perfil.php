<?php

include '../includes/verificacao/start.php';
include '../includes/bd/config.inc.php';

$id_usuario = 0;
if (isset($_GET['id_usuario']) && is_numeric($_GET['id_usuario'])) {
    $id_usuario = intval($_GET['id_usuario']);
}

$usuario = array();
if ($id_usuario > 0) {
    $conexao = new PDO(dsn, usuario, senha);

    $sql = "SELECT *
            FROM usuario
            WHERE id_usuario = :id_usuario";

    $comando = $conexao->prepare($sql);
    $comando->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $comando->execute();
    $usuario = $comando->fetch(PDO::FETCH_ASSOC);
}

// Não é necessário pesquisar todos os registros aqui para edição de perfil.
// Se quiser manter listagem, use equipamento separado.


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background-color:beige;
            justify-content: center;
            display: flex;
            min-height: 100px;

        }

        .formulario {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.473);
            background-color: white ;
        }

        .formulario label {
            display: block;
            margin-bottom: 5px;
        }

        .formulario input[type="text"],
        .formulario input[type="number"],
        .formulario input[type="email"],
        .formulario input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            
        }

        .formulario input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: 0.7s;
        }

        .formulario input[type="submit"]:hover {
            background-color: #2f8733;
            transform: scale(1.06);
            transition: 0.7s;
        }
        
        .cadastro{
            text-align: center;
            
        }

        .titulo{
            text-align: center;
            color: #4CAF50;
        }

        label[for="id_usuario"],
        label[for="nome_usuario"],
        label[for="email_usuario"],
        label[for="senha_usuario"]{
            color: #4CAF50;
        }
    </style>

</head>
<body>
    <a href="../index.php"><button>Voltar</button></a>
    <div class="formulario">
        <h2 class="titulo">ALTERAR PERFIL</h2>
        <form action="acao-alterar-perfil.php" method="POST">
            <label for="id_usuario">ID:</label>
            <input type="number" name="id_usuario" value="<?= isset($usuario['id_usuario']) ? $usuario['id_usuario'] : 0; ?>" readonly>
            <br>
            <label for="nome_usuario">Nome:</label>
            <input type="text" id="nome_usuario" name="nome_usuario" value="<?= isset($usuario['nome_usuario']) ? $usuario['nome_usuario'] : ''; ?>" required>
            <br>
            <label for="email_usuario">Email:</label>
            <input type="email" id="email_usuario" name="email_usuario" value="<?= isset($usuario['email_usuario']) ? $usuario['email_usuario'] : ''; ?>" required>
            <br>
            <label for="senha_usuario">Senha:</label>
            <input type="password" id="senha_usuario" name="senha_usuario" value="<?= isset($usuario['senha_usuario']) ? $usuario['senha_usuario'] : ''; ?>" required>
            <br><br>
            <input type="submit" value="Salvar Alterações">
        </form>
    </div>
    
</body>
</html>