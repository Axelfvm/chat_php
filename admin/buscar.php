<?php
include('./../config/config.php');
include('./../includes/class/ver.class.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?> - Buscar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../includes/css/search.main.css" rel="stylesheet" type="text/css"/>
        <link href="../includes/css/general.main.css" rel="stylesheet" type="text/css"/>
    </head>
    <style>

        body{
            background: radial-gradient(circle, rgba(38,232,255,1) 0%, rgba(138,83,255,1) 100%);
            display: flex;
            justify-content: center;
        }

        .center{
            display: flex;
            justify-content: center;
            background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 100%);
            height: 102%;
            width: 80vw;
            min-width: 700px;
            border-radius: 6px;
            margin-top: 80px;
        }

        form{
            text-align: center;
        }

        .tbsearch{
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .tbsearch td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .tbsearch tr:nth-child(even) {
            background-color: #dddddd;
        }

        .inpt_search{
            margin-top: 25px;
            border-radius: 16px;
            width: 200px;
            border: 1px solid grey;
            text-align: center;
            font-family: monospace;
            font-size: 15px;
        }
        .inpt_search:focus{
            outline: 0;
            box-shadow: 0 0 0 0;
        }

    </style>
    <body style="background: <?= $cor_fundo ?>">
        <?php include('header.php'); ?>
        <div class="center" id="center">
            <form method="post">
                <input type="text" name="busca" class="inpt_search" placeholder="Nome" autofocus>
                <input type="submit" name="acao" value="Buscar">
                <br>
                <br>
                <table class="tbsearch">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Usuário</th>
                        <th>Email</th>
                        <th>Cargo</th>
                        <th>Banido</th>
                        <th></th>
                    </tr>
                    <?php
                    include('./../includes/class/busca.class.php');
                    ?>
                </table>
                <br>
                <br>
                <p>Teste de saida PHP</p>
                <a>Nivel de SU - <?= $retorno1['su'] ?> - <?= $retorno1['nome'] ?></a>
            </form>

        </div>
        <?php include '../includes/pages/footer.php'; ?>
    </body>
</html>