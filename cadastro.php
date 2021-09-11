<?php
include('./config/config.php');
include('./includes/class/ver.class.php');
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
        <!--<script src="includes/js/main.js" type="text/javascript"></script>-->
        <link href="includes/css/general.main.css" rel="stylesheet" type="text/css"/>
        <link href="includes/css/cadastro.main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include('./includes/pages/header.php'); ?>
        <div class="center" id="center">
            <form method="post">
                <div class="space"></div>
                <input type="text" name="nome" placeholder="Nome" class="inpt_cadastro">
                <input type="text" name="usuario" placeholder="Usuário" class="inpt_cadastro">
                <input type="password" name="senha" placeholder="Senha" class="inpt_cadastro">
                <input type="text" name="email" placeholder="Email" class="inpt_cadastro">

                <label for="cargo">Cargo:</label>

                <select id="cargo" name="cargo">
                    <option value="0">Usuário</option>
                    <option value="10">Admin</option>

                </select>

                <input type="submit" name="acao" value="Criar">
                <?php include('./includes/class/cadastro.class.php'); ?>
                <br>
                <br>
               
                <p>Teste de saida PHP</p>
                <a>Nivel de SU - <?= $retorno1['su'] ?></a>
            </form>



        </div>
        
    </body>
</html>
