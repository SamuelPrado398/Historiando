<?php
    include 'includes/verificacao/start.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-Vindo</title>

    <style>
        body{
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center; 
            justify-content: center;
            background-color: beige;
        }

        h1,h2{
            color: #4CAF50;
        }

        button{
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2f8733;
        }

        .perfil {
            position: absolute;
            top: 20px;
            right: 20px;
            margin: 0;
        }

        .sair {
            position: absolute;
            top: 20px;
            left: 20px;
            margin: 0;
        }

         .nome {
            margin-top: 100px;
            text-align: center;
        }

        .corpo {
            max-width: 600px;
            text-align: center;
            margin-top: 50px;
            background-color: #bdffcba6;
            border-radius: 20px;
        }

    </style>


</head>
<body>
    
    <div class="sair">
        <a href="cadastro-login/sair.php"><button>Sair</button></a>
    </div>

    <div class="nome">
        <h2>Bem-Vindo ao Historiando, </h2>
        <h1 style="color: #2f8733;"><?php echo $_SESSION['nome_usuario']; ?></h1>
    </div>    
    
    <div class="perfil">
        <a href="alteracao/alterar-perfil.php?id_usuario=<?= $_SESSION['id_usuario'] ?>"><img src="imagens/icone-perfil.webp" alt="Perfil" width="75" height="75"></a>
    </div>

    <div class="corpo">
        <h2 style="color: #4CAF50;"></h2>
        <p style="padding: 25px; color: #15741a;">O Historiando é um site dedicado a compartilhar histórias e experiências de vida. Aqui, você pode encontrar uma variedade de narrativas inspiradoras, emocionantes e educativas, todas contadas por pessoas reais. Nosso objetivo é criar um espaço onde as pessoas possam se conectar através de suas histórias, aprendendo umas com as outras e encontrando inspiração para suas próprias jornadas.</p>
    </div>


    
</body>
</html>