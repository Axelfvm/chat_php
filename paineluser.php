<?php
include('./config/config.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?> - Painel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="includes/css/main.css" rel="stylesheet" type="text/css"/>
        <link href="includes/css/general.main.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <?php include './includes/pages/header.php'; ?>
        <div class="center" style="margin-top: 70px;">
            <form method="post" style="display: grid;">
                
                <a href="user/msenha.php">Mudar senha</a>
                <a href="user/mperfil.php">Editar perfil</a>
                
                <a href='home.php'>Voltar</a>
            </form>
        </div>
    </body>
</html>