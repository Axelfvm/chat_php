<?php

if (isset($_GET['sair'])) {
    session_destroy();
    header('Location: index.php');
    die();
}
if ($retorno1['su'] != 10) {
    header('Location: index.php');
    die();
}
if (isset($_GET['user'])) {
    $user = $_GET['user'];
    $query = $pdo->prepare("select * from $tb_user where usuario = '$user'");
    $query->execute();
    $retorno = $query1->fetch();
    $perfilInfo = "";

    if ($query->rowCount() == 1) {
        $perfilInfo = $query->fetch();
    } else {
//Erro
        header('Location: home.php');
    }
}

if ($perfilInfo['su'] == 10) {
    $perfilInfo['su'] = 'Administrador';
} else if ($perfilInfo['su'] == 0) {
    $perfilInfo['su'] = 'Usuário';
}

if (isset($_POST['mudar'])) {
    $su = $_POST['cargo'];
    //$sql = $pdo->prepare("INSERT INTO $tb_user (su) VALUES ('$su') WHERE = '$user'");
    $queryCargo = $pdo->prepare("UPDATE $tb_user SET su='$su' WHERE usuario = '$user'");
    $queryCargo->execute([$su]);
    //echo 'Usuário cadastrado com sucesso';
    header('Location: cargo.php?user='.$user);
}
