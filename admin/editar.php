<?php
include('./../config/config.php');
include('./../includes/class/ver.class.php');
include('./../includes/class/editar.class.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?> - Editar perfil <?= $user ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../includes/css/main.css" rel="stylesheet" type="text/css"/>
        <link href="../includes/css/general.main.css" rel="stylesheet" type="text/css"/>

    </head>
    <style>

    </style>
    <body style="background: <?= $cor_fundo ?>">
        <?php include 'header.php'; ?>
        <div class="center" style="margin-top: 70px;">
            <form method="post">
                <h2><?= $user ?></h2>
                <br>
                <p>Nome:</p>
                <input type="text" value="<?= $perfilInfo['nome'] ?>" name="nome"/>
                <p>Email:</p>
                <input type="text" value="<?= $perfilInfo['email'] ?>" name="email"/>
                <p>Idade:</p>
                <input type="text" value="<?= $perfilInfo['idade'] ?>" name="idade"/>
                <p>Sexo:</p>
                <input type="text" value="<?= $perfilInfo['sexo'] ?>" name="sexo"/>
                <p>País:</p>
                <input type="text" value="<?= $perfilInfo['pais'] ?>" name="pais"/>
                <br>
                <br>
                <br>

                <input type="submit" value="Editar" name="editar"/>
                <br>
                <br>
                <a href='home.php'>Voltar</a>
            </form>
        </div>
    </body>
</html>