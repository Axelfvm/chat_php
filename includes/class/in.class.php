<?php

if (isset($_POST['acao'])) {
    //$usuario = $_POST['usuario'];
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
    //$senha = $_POST['senha'];
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = $pdo->prepare("SELECT * FROM $tb_user WHERE usuario = ?");
    $sql->execute([$usuario]);


    if ($sql->rowCount() == 1) {
        $info = $sql->fetch();
        if (password_verify($senha, $info['senha'])) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $info['id'];
            $_SESSION['usuario'] = $info['usuario'];
            $_SESSION['nome'] = $info['nome'];
            header("Location: home.php");
            die();
        } else {
            //Erro
            //echo '<div class="erro-index" id="erroIndex" style="height: 250px; width: 420px; background: gainsboro; border-radius: 16px; z-index: 1; position: absolute; margin-top: 5%; text-align: center;"><div style="position: absolute; height: 25px; width: 25px; background: #ff000070; border-radius: 100%;right: -5px;
            //top: -10px;"><a style="margin-top: 4px; position: absolute; margin-left: -5px; color: #636363;" onclick="closeIndex()">X</a></div><p> Usuário ou senha incorretos!</p></div>';

            echo 'Usuário ou senha incorretos!';
        }
    } else {
        //Erro
        //echo '<div class="erro-index" id="erroIndex" style="height: 250px; width: 420px; background: gainsboro; border-radius: 16px; z-index: 1; position: absolute; margin-top: 5%; text-align: center;"><div style="position: absolute; height: 25px; width: 25px; background: #ff000070; border-radius: 100%;right: -5px;
        // top: -10px;"><a style="margin-top: 4px; position: absolute; margin-left: -5px; color: #636363;">X</a></div><p> Usuário não encontrado.</p></div>';
        echo 'Usuário não encontrado.';
    }
}