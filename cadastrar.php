<?php
include('./config/config.php');

$query = $pdo->prepare("select * from painel where id = 1");
$query->execute();
$retorno = $query->fetch();

if ($retorno['cadastro_enable'] != 1) {
    session_destroy();
    header('Location: includes/pages/manutencao.html');
    die();
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
        <div class="center" id="center">
            <form method="post">
                <div class="space"></div>
                <input type="text" name="nome" placeholder="Nome" class="inpt_cadastro">
                <input type="text" name="usuario" placeholder="Usuário" class="inpt_cadastro">
                <input type="password" name="senha" placeholder="Senha" class="inpt_cadastro">
                <input type="text" name="email" placeholder="Email" class="inpt_cadastro">
                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>

                </select>
                <input type="text" name="idade" placeholder="Idade" class="inpt_cadastro">
                <input type="text" name="pais" placeholder="País" class="inpt_cadastro">

                <input type="submit" name="acao" value="Criar">
                <?php include('./includes/class/cadastrar.class.php'); ?>
                <br>
                <br>
                <a href="index.php">Voltar</a>
            </form>



        </div>

    </body>
</html>
