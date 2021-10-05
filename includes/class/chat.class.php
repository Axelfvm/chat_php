<?php

$lgnusr = $_SESSION['usuario'];
$query1 = $pdo->prepare("select * from $tb_user where usuario = '$lgnusr'");
$query1->execute();
$retorno1 = $query1->fetch();


$query = $pdo->prepare("SELECT * FROM $tb_post ORDER BY
  id DESC");
$query->execute();
$retorno = $query->fetchAll();

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($_SESSION['login'] != true) {
    header('Location: index.php');
    die();
}


if (isset($_GET['ocultar'])) {
    if ($retorno1['su'] != 10) {
        header('Location: index.php');
        die();
    } else {
        $queryOcult = $pdo->prepare("SELECT * FROM $tb_post WHERE id = ?");
        $id = (int) $_GET['ocultar'];
        $queryOcult->execute([$id]);
        $retornoOcult = $queryOcult->fetch();

        if ($retornoOcult['oculto'] == 1) {
            $ocultar = $pdo->prepare("UPDATE $tb_post SET oculto='0' WHERE id = ?");
            $id = (int) $_GET['ocultar'];
            $ocultar->execute([$id]);
            header('Location: ../pages/chat.box.php');
            die();
        } else {
            $ocultar = $pdo->prepare("UPDATE $tb_post SET oculto='1' WHERE id = ?");
            $id = (int) $_GET['ocultar'];
            $ocultar->execute([$id]);
            header('Location: ../pages/chat.box.php');
            die();
        }
    }
}

if (isset($_GET['excluir'])) {
    if ($retorno1['su'] != 10) {
        header('Location: index.php');
        die();
    } else {


        $excluir = $pdo->prepare("DELETE FROM $tb_post WHERE id = ?");
        $id = (int) $_GET['excluir'];
        $excluir->execute([$id]);
    }
}

