<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$lgnusr = $_SESSION['usuario'];
$query1 = $pdo->prepare("select * from $tb_user where usuario = '$lgnusr'");
//$query->bindParam($usuario, PDO::PARAM_INT);
$query1->execute();
$retorno1 = $query1->fetch();
if ($retorno1['su'] != 10) {
    header('Location: index.php');
    die();
}

if (isset($_POST['acao'])) {
    $busca = $_POST['busca'];

    $query = $pdo->prepare("SELECT * FROM $tb_user WHERE id LIKE '%$busca%' OR nome LIKE '%$busca%' OR usuario LIKE '%$busca%' OR email LIKE '%$busca%'");
    $query->bindParam(':busca', $busca, PDO::PARAM_STR);
    $query->execute();
    $retorno = $query->fetchAll();

    if (count($retorno) > 0) {
        foreach ($retorno as $value) {
            echo '<tr>';
            echo '' . '<td>' . $value['id'] . '</td>' . '<td>' . $value['nome'] . '</td>' . '<td>' . $value['usuario'] . '</td>' . '<td>' . $value['email'] . '</td>' . '<td><input type="button" value="Mudar senha"> <input type="button" value="Editar cargo"> <input type="button" value="Excluir"> </td>' . '</tr>';
            echo '</tr>';
        }
    }
}
?>