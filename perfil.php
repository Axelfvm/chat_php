<?php
include('./config/config.php');
include('./includes/class/ver.class.php');

if (isset($_GET['sair'])) {
    session_destroy();
    header('Location: index.php');
    die();
}

if (isset($_GET['user'])) {
    $user = $_GET['user'];
    $query = $pdo->prepare("select * from $tb_user where usuario = '$user'");
    $query->execute();
    $retorno = $query1->fetch();

    if ($query->rowCount() == 1) {
        $perfilInfo = $query->fetch();
    } else {
//Erro
        header('Location: home.php');
    }
}
if ($perfilInfo['email'] == '') {
    $perfilInfo['email'] = 'Nao definido';
}if ($perfilInfo['idade'] == '') {
    $perfilInfo['idade'] = 'Nao definido';
} if ($perfilInfo['sexo'] == '') {
    $perfilInfo['sexo'] = 'Nao definido';
} if ($perfilInfo['pais'] == '') {
    $perfilInfo['pais'] = 'Nao definido';
}
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
    <style>

    </style>
    <body>
        <div class="center">
            <form>
                <h2><?= $user ?></h2>
                <br>
                <p>Nome: <?= $perfilInfo['nome'] ?></p>
                <p>Email: <?= $perfilInfo['email'] ?></p>
                <p>Idade: <?= $perfilInfo['idade'] ?></p>
                <p>Sexo: <?= $perfilInfo['sexo'] ?></p>
                <p>País: <?= $perfilInfo['pais'] ?></p>
                <a href='home.php'>Voltar</a>
            </form>
        </div>
    </body>
</html>