<?php

if ($_SESSION['login'] != true) {
    header('Location: index.php');
    die();
}

$lgnusr = $_SESSION['usuario'];
$query1 = $pdo->prepare("select * from $tb_user where usuario = '$lgnusr'");
$query1->execute();
$retorno1 = $query1->fetch();


if (isset($_POST['enviar'])) {

    $msg = $_POST['menssagem'];
    $autor = $_SESSION['usuario'];
    if ($msg != '') {
        $sql = $pdo->prepare("INSERT INTO $tb_post (msg,autor,date) VALUES ('$msg', '$autor', NOW())");
        $sql->execute([$msg, $autor]);
    }
}

if (isset($_GET['sair'])) {
    session_destroy();
    header('Location: index.php');
    die();
}
?>