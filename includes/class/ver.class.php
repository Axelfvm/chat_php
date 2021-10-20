<?php

if ($_SESSION['login'] != true) {
    header('Location: index.php');
    die();
}

$lgnusr = $_SESSION['usuario'];
$query1 = $pdo->prepare("select * from $tb_user where usuario = '$lgnusr'");
$query1->execute();
$retorno1 = $query1->fetch();

if ($retorno1['ban'] == 1) {
    header('Location: index.php');
    die();
}

if (isset($_POST['enviar'])) {
    $msg = filter_input(INPUT_POST, 'menssagem', FILTER_SANITIZE_SPECIAL_CHARS);
    //$msg = $_POST['menssagem'];
    $autor = $_SESSION['usuario'];
    $userip = $_POST['userIP'];
    if ($msg != '') {
        $sql = $pdo->prepare("INSERT INTO $tb_post (msg,autor,date) VALUES ('$msg', '$autor', NOW())");
        $sql->execute([$msg, $autor]);
        $sql1 = $pdo->prepare("UPDATE $tb_user SET lastIP='$userip' WHERE usuario = '$autor'");
        $sql1->execute();
    }
}

if (isset($_GET['sair'])) {
    session_destroy();
    header('Location: index.php');
    die();
}
?>