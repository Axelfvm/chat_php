<?php
include('./../config/config.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?> - Painel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../includes/css/main.css" rel="stylesheet" type="text/css"/>
        <link href="../includes/css/general.main.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <div class="center" style="margin-top: 70px;">
            <form method="post" style="display: grid;">
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