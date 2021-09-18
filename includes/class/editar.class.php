<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


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

    if ($query->rowCount() == 1) {
        $perfilInfo = $query->fetch();
    } else {
//Erro
        header('Location: home.php');
    }
}

if (isset($_POST['editar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $idade = $_POST['idade'];
    $pais = $_POST['pais'];
    $query = $pdo->prepare("UPDATE $tb_user SET nome='$nome', email='$email', sexo='$sexo', idade='$idade', pais='$pais' WHERE usuario = '$user'");
    //$query->execute([$nome], [$usu], [$email], [$sexo], [$idade], [$pais]);
    $query->execute();
    header('Location: editar?user=' . $user);
}