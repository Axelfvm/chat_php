<?php
include('./config/config.php');
include('./includes/class/ver.class.php');

$lgnusr = $_SESSION['usuario'];
$query1 = $pdo->prepare("select * from $tb_user where usuario = '$lgnusr'");
//$query->bindParam($usuario, PDO::PARAM_INT);
$query1->execute();
$retorno1 = $query1->fetch();
if ($retorno1['su'] != 10) {
    header('Location: index.php');
    die();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?> - Buscar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="includes/css/search.main.css" rel="stylesheet" type="text/css"/>
    </head>
    <style>

    </style>
    <body>
        <?php include('./includes/pages/header.php'); ?>
        <div class="center" id="center">
            <form method="post">
                <input type="text" name="busca" class="inpt_search" placeholder="Nome">
                <input type="submit" name="acao" value="Buscar">
                <br>
                <br>
                <table class="tbsearch">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Usuário</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    <?php
                    include('./includes/class/busca.class.php');
                    ?>
                </table>
                <br>
                <br>
                <p>Teste de saida PHP</p>
                <a>Nivel de SU - <?= $retorno1['su'] ?> - <?= $retorno1['nome'] ?></a>
            </form>
        </div>
    </body>
</html>