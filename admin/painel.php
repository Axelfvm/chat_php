<?php
include('./../config/config.php');

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
    $nomechat = $_POST['nome_chat'];
    $corfundo = $_POST['colorpicker'];
    $debug = $_POST['debug'];

    $query = $pdo->prepare("UPDATE painel SET cadastro_enable='$cadastro', manutencao='$manutencao', n_chat='$nomechat', cor_fundo='$corfundo', debug='$debug' WHERE id = '1'");
    //$query->execute([$nome], [$usu], [$email], [$sexo], [$idade], [$pais]);
    $query->execute();
    header('Location: painel.php');
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

if ($retorno['debug'] == 'on') {
    $debug_inpt = 'checked';
} else {
    $debug_inpt = '';
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
        <title><?= $title ?> - Painel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../includes/css/general.main.css" rel="stylesheet" type="text/css"/>
        <link href="../includes/css/cadastro.main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background: <?= $cor_fundo ?>">
        <?php include('header.php'); ?>
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

                <label for="nome_chat">Nome Chat:</label>
                <input type="text" name="nome_chat" id="nome_chat" placeholder="Nome chat" value="<?= $title ?>">

                <label for="colorpicker">Cor de fundo:</label>
                <input type="color" id="colorpicker" name="colorpicker" value="<?= $cor_fundo ?>">

                <label for="debug">Debug:</label>
                <input type="checkbox" id="debug" name="debug" <?= $debug_inpt ?>>

                <input type="submit" value="Salvar" name="salvar_painel"/>
            </form>
            <p>Versão: <?= $version ?></p>
        </div>
        <?php include '../includes/pages/footer.php'; ?>
    </body>
</html>
