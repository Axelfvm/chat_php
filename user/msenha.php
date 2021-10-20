<?php
include('./../config/config.php');
include('./../includes/class/ver.class.php');
//include('./../includes/class/editar.class.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?> - Mudar senha</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../includes/css/main.css" rel="stylesheet" type="text/css"/>
        <link href="../includes/css/general.main.css" rel="stylesheet" type="text/css"/>

    </head>
    <body style="background: <?= $cor_fundo ?>">
        <?php include 'header.php'; ?>
        <div class="center" style="margin-top: 70px;">
            <form method="post" style="display: block;">
                <br>
                <input type="password" name="changesenha" id="changesenha" placeholder="Nova senha">
                <br>
                <br>
                <input type="password" name="rechangesenha" id="rechangesenha" placeholder="Digite novamente">
                <br>
                <br>
                <input type="submit" name="mudarsenha" value="Confirmar" onclick="checar()">
                <br>
                <?php
                if (isset($_POST['mudarsenha'])) {
                    if ($_POST['changesenha'] != $_POST['rechangesenha']) {
                        echo 'Erro';
                    } else {
                        $user = $_SESSION['usuario'];
                        $senha = $_POST['rechangesenha'];
                        $criptografada = password_hash($senha, PASSWORD_DEFAULT);


                        $queryChange = $pdo->prepare("UPDATE $tb_user SET senha='$criptografada' WHERE usuario = '$user'");
                        $queryChange->execute([$tb_user, $criptografada, $user]);
                        echo 'Senha trocada com sucesso!';
                    }
                }
                ?>
                <a href = '../home.php'>Voltar</a>
            </form>
        </div>
    </body>
</html>