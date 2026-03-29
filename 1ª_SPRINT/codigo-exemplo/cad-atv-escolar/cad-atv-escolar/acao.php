<?php
/*
define('usuario', 'root');
define('senha', 'Sharon12&');
define('host', 'localhost');
define('porta', '3306');
define('bd', 'atvesc');
define('dsn', 'mysql:host=' . host . ';port=' . porta . ';dbname=' . bd);
*/

include 'config.php';

$usuario = 'root';
$senha = 'Sharon12&';



//CRUD de aluno

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$matricula = isset($_POST['matricula']) ? $_POST['matricula'] : '';
$nome_atividade = isset($_POST['nome_atividade']) ? $_POST['nome_atividade'] : '';
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';


if ($nome != ''){


    //conectar com o banco de dados
    try {
        $conexao = new PDO (dsn, usuario, senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
        exit();
    }


    //create
    //montar sql

    $sql = "INSERT INTO aluno (nome, email, matricula, nome_atividade, descricao) VALUES (:nome, :email, :matricula, :nome_atividade, :descricao)";

    //preparar comando para executar no banco de dados

    $comando = $conexao->prepare($sql);




    //informar parâmetros
    $comando->bindValue(':nome', $nome);
    $comando->bindValue(':email', $email);
    $comando->bindValue(':matricula', $matricula);
    $comando->bindValue(':nome_atividade', $nome_atividade);
    $comando->bindValue(':descricao', $descricao);
    //executar um comando
    try {
        if($comando->execute())
            echo "Dados inseridos com sucesso";
        else
            echo "Erro ao inserir dados no banco";
    } catch (PDOException $e) {
        echo "Erro ao executar: " . $e->getMessage();
    }
}

else 
    echo "Informe um nome válido";

?>


