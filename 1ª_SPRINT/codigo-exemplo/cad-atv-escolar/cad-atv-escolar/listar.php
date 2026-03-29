<?php
session_start();
if (!isset($_SESSION['id'])){
    header('Location: login.html?auth_error=Faça login para acessar a página');
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 90%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        button {
            background-color: #45a049;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4CAF50;
        }


    </style>
</head>
<body>
    <h1>Bem Vindo, <?php echo $_SESSION['nome']; ?></h1>
    <a href="sair.php"><button>Sair</button></a>
    
<form action="" method="get">
    <label for="tipo">Tipo</label>
    <select name="tipo" id="tipo">
        <option value="">Selecione</option>
        <option value="1">ID</option>
        <option value="2">Nome</option>
    </select>
    <input type="text" name="filtro" id="">
    <button type="submit">Filtrar</button>
</form>




<?php
$tipo = isset($_GET['tipo']) ?$_GET['tipo']:0;
$filtro = isset($_GET['filtro']) ?$_GET['filtro']:0;


include 'config.php';


//abrir conexao com o banco
$conexao = new PDO (dsn, usuario, senha);



//montar consulta
$sql = "SELECT * FROM aluno";
switch($tipo){
    case 1:
        $sql .= " WHERE id = :filtro";
        break;
    
    case 2:
        $sql .= " WHERE nome like :filtro";
        $filtro = '%' .$filtro.'%';
        break;
}
//echo $sql;

//prepara consulta
$comando = $conexao->prepare($sql);
if($tipo > 0)
    $comando ->bindValue(':filtro' , $filtro);
    

//enviar parametros da consulta

//executar consulta
$comando->execute();

//listar os registros no banco
$registros = $comando->fetchAll();
?>

<a href="index.html">Voltar</a>
<br><br>




<table border="1">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha</th>
        <th>ID</th>
        <th>Matricula</th>
        <th>Nome Atividade</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>




<?php

foreach ($registros as $aluno){
echo    "<tr>
            <td>" . $aluno ['nome'] . "</td>".
            "<td>" . $aluno ['email'] . "</td>".
            "<td>" . $aluno ['senha'] . "</td>".
            "<td>" . $aluno ['id'] . "</td>".
            "<td>" . $aluno ['matricula'] . "</td>".
            "<td>" . $aluno ['nome_atividade'] . "</td>".
            "<td>" . $aluno ['descricao'] . "</td>". 
            "<td>" . "<a href='editar.php?id=" . $aluno['id'] . "'>Editar</a>" . " | " . 
            "<a href='excluir.php?id=" . $aluno['id'] . "'>Excluir</a>" . "</td>
        </tr>";

}


?>
</table>

</body>
</html> 