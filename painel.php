<?php
include('./config/config.php');

if ($_SESSION['login'] != true) {
    header('Location: index.php');
    die();
}

$lgnusr = $_SESSION['usuario'];
$query1 = $pdo->prepare("select * from $tb_user where usuario = '$lgnusr'");
$query1->execute();
$retorno1 = $query1->fetch();

if ($retorno1['su'] != 10) {
    header('Location: index.php');
    die();
}

$query = $pdo->prepare("select * from painel where id = 1");
$query->execute();
$retorno = $query->fetch();


if (isset($_POST['salvar_painel'])) {
    $cadastro = $_POST['cadastro'];
    $manutencao = $_POST['manutencao'];
    $query = $pdo->prepare("UPDATE painel SET cadastro_enable='$cadastro', manutencao='$manutencao' WHERE id = '1'");
    //$query->execute([$nome], [$usu], [$email], [$sexo], [$idade], [$pais]);
    $query->execute();
}

if ($retorno['cadastro_enable'] == 1) {
    $cadastro_select = 'selected';
    $cadastro_select1 = '';
} else {
    $cadastro_select = '';
    $cadastro_select1 = 'selected';
}

if ($retorno['manutencao'] == 1) {
    $manutencao_select = 'selected';
    $manutencao_select1 = '';
} else {
    $manutencao_select = '';
    $manutencao_select1 = 'selected';
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
        <title><?= $title ?> - Cadastro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="includes/css/general.main.css" rel="stylesheet" type="text/css"/>
        <link href="includes/css/cadastro.main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include('./includes/pages/header.php'); ?>
        <div class="center" id="center">
            <form method="post">
                <label for="cadastro">Cadastro ativado:</label>

                <select name="cadastro" id="cadastro">
                    <option value="1" <?= $cadastro_select ?>>Sim</option>
                    <option value="0" <?= $cadastro_select1 ?>>Não</option>

                </select>

                <label for="manutencao">Manutenção ativado:</label>

                <select name="manutencao" id="manutencao">
                    <option value="1" <?= $manutencao_select ?>>Sim</option>
                    <option value="0" <?= $manutencao_select1 ?>>Não</option>

                </select>

                <input type="submit" value="Salvar" name="salvar_painel"/>
            </form>



        </div>

    </body>
</html>
