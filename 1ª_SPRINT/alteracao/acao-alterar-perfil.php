<?php
    include '../includes/verificacao/start.php';
    include '../includes/bd/config.inc.php';

    $id_usuario = isset($_POST['id_usuario']) ? intval($_POST['id_usuario']) : 0;
    $nome_usuario = isset($_POST['nome_usuario']) ? trim($_POST['nome_usuario']) : "";
    $email_usuario = isset($_POST['email_usuario']) ? trim($_POST['email_usuario']) : "";
    $senha_usuario = isset($_POST['senha_usuario']) ? trim($_POST['senha_usuario']) : "";

    if ($id_usuario > 0 && $nome_usuario !== "" && $email_usuario !== "" && $senha_usuario !== "") {

        $conexao = new PDO(dsn, usuario, senha);

        $sql = "UPDATE usuario SET
                nome_usuario = :nome_usuario,
                email_usuario = :email_usuario,
                senha_usuario = :senha_usuario
                WHERE id_usuario = :id_usuario";

        $comando = $conexao->prepare($sql);

        $comando->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $comando->bindValue(':nome_usuario', $nome_usuario, PDO::PARAM_STR);
        $comando->bindValue(':email_usuario', $email_usuario, PDO::PARAM_STR);
        $comando->bindValue(':senha_usuario', $senha_usuario, PDO::PARAM_STR);

        if ($comando->execute()) {
            // Atualiza a sessão para refletir o novo nome imediatamente.
            $_SESSION['nome_usuario'] = $nome_usuario;

            header('Location: ../index.php');
            exit;
        } else {
            echo "<script>alert('Erro ao atualizar perfil.');</script>";
            echo "<a href='alterar-perfil.php?id_usuario=$id_usuario'>Voltar</a>";
            exit;
        }
    } else {
        echo "<script>alert('Preencha todos os campos corretamente.'); window.history.back();</script>";
        exit;
    }


?>
