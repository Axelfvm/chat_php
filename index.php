<?php
include('./config/config.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?> - Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="includes/css/main.css" rel="stylesheet" type="text/css"/>
        <link href="includes/css/general.main.css" rel="stylesheet" type="text/css"/>
        <script src="includes/js/main.js" type="text/javascript"></script>
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
                
                <?php include('./includes/class/in.class.php'); ?>
                
                <a class="wrong1" id="usrwrong">Usuário Invalido</a>
                <a class="wrong2" id="passwrong">Senha Incorreta</a>

                <div class="footer">
                    <a href="/">← Voltar</a>
                    <a href="cadastrar.php">Cadastro</a>
                </div>
            </form>


        </div>
    </body>
</html>
