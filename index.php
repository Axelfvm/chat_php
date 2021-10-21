<?php
require('./config/config.php');
//include './config/config.php';

$query = $pdo->prepare("select * from painel where id = 1");
$query->execute();
$retorno = $query->fetch();

if ($retorno['manutencao'] == 1) {
    header('Location: includes/pages/manutencao.php');
}
if ($_SESSION['login'] == true) {
    header('Location: home.php');
}

if (isset($_GET['about'])) {
    if (isset($_GET['about']) == 'version') {
        header('Location: about.php');
    }
}
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
    <body style="background: <?= $cor_fundo ?>; height: 95vh; align-items: center;">

        <div class="center" id="center" style="width: 450px;     height: 100%;
             max-height: 600px;">
            <form name="flex" method="post">
                <div class="logo"></div>
                <p>Login</p>
                <input name="usuario" placeholder="Usuário ou Email">


                <p>Password</p>
                <input type="password" name="senha" placeholder="Senha">

                <div>
                    <style>
                        .logar{
                            height: 30px;
                            font-size: 22px;
                            margin-bottom: 5px;
                            margin-top: 10px;
                            color: black;
                        }
                    </style>

                    <input class="logar" name="acao" value="Logar" type="submit">
                    <p style="margin-top: 5px; margin-bottom: 5px;">OU</p>
                    <a href="cadastrar.php" style="text-decoration: none;"><input class="logar" value="Cadastrar" type="button"></a>
                </div>

                <?php include('./includes/class/in.class.php'); ?>

                <!--<a class="wrong1" id="usrwrong">Usuário Invalido</a>
                <a class="wrong2" id="passwrong">Senha Incorreta</a>

                <div class="footer">
                    <a href="/">← Voltar</a>
                    <a href="cadastrar.php">Cadastro</a>
                </div>-->
            </form>


        </div>
    </body>
</html>
