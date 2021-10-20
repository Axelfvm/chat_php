<?php
include('./config/config.php');

if ($_SESSION['login'] != true) {
    header('Location: index.php');
    die();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?> - Painel Usuário</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="includes/css/main.css" rel="stylesheet" type="text/css"/>
        <link href="includes/css/general.main.css" rel="stylesheet" type="text/css"/>

    </head>
    <body style="background: <?= $cor_fundo ?>">
        <?php include './includes/pages/header.php'; ?>
        <div class="center" style="margin-top: 80px;">
            <form method="post" style="display: grid;">

                <a href="user/msenha.php">Mudar senha</a>
                <a href="user/mperfil.php">Editar perfil</a>

                <a href='home.php'>Voltar</a>
            </form>
        </div>
    </body>
</html>