<?php

if (isset($_POST['acao'])) {
    //$usuario = $_POST['usuario'];
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
    //$senha = $_POST['senha'];
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = $pdo->prepare("SELECT * FROM $tb_user WHERE usuario = ? or email = ?");
    $sql->execute([$usuario, $usuario]);


    if ($sql->rowCount() == 1) {
        $info = $sql->fetch();
        $banned = $info['ban'];
        if (password_verify($senha, $info['senha'])) {
            if ($banned == 1) {
                echo '<a class="index-erro">Usuário banido!</a>';
            } else {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $info['id'];
                $_SESSION['usuario'] = $info['usuario'];
                $_SESSION['nome'] = $info['nome'];
                header("Location: home.php");
                die();
            }
        } else {

            echo '<a class="index-erro">Usuário ou senha incorretos!</a>';
        }
    } else {
        echo '<a class="index-erro">Usuário não encontrado.</a>';
    }
}