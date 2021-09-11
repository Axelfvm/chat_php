<?php
include('./config/config.php');

if (isset($_POST['acao'])) {
    $usuario = $_POST['usuario'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
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
            echo '<div class="box_erro_login"><p><i class="fas fa-exclamation-circle"></i> Usuário ou senha incorretos!</p></div>';
        }
    } else {
        //Erro
        echo '<div class="box_erro_login"><p><i class="fas fa-exclamation-circle"></i> Usuário não encontrado.</p></div>';
    }
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title><?= $title ?> - Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="includes/css/main.css" rel="stylesheet" type="text/css"/>
        <!--<script src="includes/js/main.js" type="text/javascript"></script>-->
        <link href="includes/css/general.main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <div class="center" id="center">
            <form name="flex" method="post">
                <div class="logo"></div>
                <p>Login</p>
                <input name="usuario">


                <p>Password</p>
                <input type="password" name="senha">


                <input class="logar" name="acao" value="Logar" type="submit">

                <a class="wrong1" id="usrwrong">Usuário Invalido</a>
                <a class="wrong2" id="passwrong">Senha Incorreta</a>

                <div class="footer">
                    <a href="/">← Voltar</a>
                </div>
            </form>


        </div>
    </body>
</html>
