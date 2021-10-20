<?php
include('./includes/class/query.class.php');
if ($_SESSION['login'] != true) {
    header('Location: index.php');
    die();
}

if ($retornoUser['ban'] == 1) {
    header('Location: index.php');
    die();
}

if (isset ($_GET['about'])){
    if(isset ($_GET['about'])== 'version'){
        header('Location: about.php');
    }
    
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