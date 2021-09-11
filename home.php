<?php
include('./config/config.php');
include('./includes/class/ver.class.php');


if (isset($_POST['enviar'])) {
    if ($msg != ''){
        $msg = $_POST['menssagem'];
    $autor = $_SESSION['usuario'];

    $sql = $pdo->prepare("INSERT INTO $tb_post (msg,autor,date) VALUES ('$msg', '$autor', NOW())");
    $sql->execute([$msg, $autor]);
    }else{
        javascript:alert('Campo menssagem não pode ficar vazio!');
    }
    
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

        .box{
            height: 200px;
            width: 135px;
            background: #dddddd;
            border-radius: 16px;
            margin-right: 35px;
        }

        .linha{
            height: 16px;
            width: 100%;

        }
        .linha p{
            font-family: monospace;
            font-size: 12px;
            margin-left: 5px;
        }

        #iframe{
            height: 800px;
            width: 100%;
            border: none;
        }
        form{
            background: #d0d0d0a8;
            height: 45px;
            width: 100%;
            justify-content: center;
            align-content: center;
            display: flex;
            border-radius: 6px 6px 0 0;
        }
    </style>
    <body>
        <?php include './includes/pages/header.php'; ?>

        <div class="center" style="margin-top: 70px; width: 80vw; height: 100%; display: flow-root;">   
            <form method="post">
                <input type="text" name="menssagem" autofocus style="margin-top: 3px; font-size: 15px;">
                <input type="submit" name="enviar" value="Enviar" style="margin-top: 3px;height: 35px; width: 120px; font-size: 15px; font-family: monospace;">
            </form>
            <iframe id="iframe" src="./includes/pages/chat.box.php"></iframe>

        </div>

        <script>
            window.setInterval(function () {
                reloadIFrame()
            }, 3000);

            function reloadIFrame() {
                document.getElementById('iframe').contentWindow.location.reload();
            }
        </script>
    </body>
</html>