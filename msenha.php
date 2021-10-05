<?php
include('./config/config.php');
include('./includes/class/ver.class.php');

if ($retorno1['su'] != 10) {
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
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?> - Mudar senha</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="includes/css/search.main.css" rel="stylesheet" type="text/css"/>
        <link href="includes/css/general.main.css" rel="stylesheet" type="text/css"/>
    </head>
    <script>
        function checar() {
            var campo1 = document.getElementById('changesenha').value;
            var campo2 = document.getElementById('rechangesenha').value;
            if (campo1 != campo2) {

            }
        }

    </script>
    <body>
        <?php include './includes/pages/header.php'; ?>
        <div class="center" style="margin-top: 70px;">
            <form method="post">
                <h2><?= $user ?></h2>
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
                        $senha = $_POST['rechangesenha'];
                        $criptografada = password_hash($senha, PASSWORD_DEFAULT);


                        $queryChange = $pdo->prepare("UPDATE $tb_user SET senha='$criptografada' WHERE usuario = '$user'");
                        $queryChange->execute([$tb_user, $criptografada, $user]);
                        echo 'Senha trocada com sucesso!';
                    }
                }
                ?>
                <br>
                <a href='home.php'>Voltar</a>
            </form>
        </div>
    </body>
</html>