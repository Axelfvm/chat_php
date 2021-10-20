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

if (isset($_GET['excluir'])) {

    $excluir = $pdo->prepare("DELETE FROM $tb_user WHERE id = ?");
    $id = (int) $_GET['excluir'];
    $excluir->execute([$id]);
    header('Location: buscar.php');
    die();
}

if (isset($_GET['ban'])) {
    $id = (int) $_GET['ban'];
    $query1 = $pdo->prepare("select * from $tb_user where id = '$id'");
    $query1->execute();
    $retorno1 = $query1->fetch();
    
    if ($retorno1['ban'] == 1) {
        $banir = $pdo->prepare("UPDATE $tb_user SET ban='0' WHERE id = '$id'");
        $banir->execute([$id]);
    } else {
        $banir = $pdo->prepare("UPDATE $tb_user SET ban='1' WHERE id = '$id'");
        $banir->execute([$id]);
    }
    header('Location: buscar.php');
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
            if ($value['su'] == 10) {
                $value['su'] = 'Administrador';
            } else if ($value['su'] == 0) {
                $value['su'] = 'Usuário';
            }

            if ($value['ban'] == 1) {
                $value['ban'] = 'Banido';
                $color = 'red';
            } else if ($value['ban'] == 0) {
                $value['ban'] = 'Normal';
                $color = 'green';
            }

            echo '<tr>';
            echo '' . '<td>' . $value['id'] . '</td>' . '<td>' . $value['nome'] . '</td>' . '<td>' . '<a href="perfil.php?user=' . $value['usuario'] . '" target="_blank">' . $value['usuario'] . '</a></td>' . '<td>' . $value['email'] . '</td>' . '<td>' . $value['su'] . '</td>' . '<td>' . '<a style="color: '. $color . '">'. $value['ban']. '</a>' . '</td>' . '<td><a href="msenha.php?user=' . $value['usuario'] . '" target="_blank"><input type="button" value="Mudar senha"></a> <a href="editar.php?user=' . $value['usuario'] . '"><input type="button" value="Editar perfil"/></a> <a href="cargo.php?user=' . $value['usuario'] . '"><input type="button" value="Editar cargo"></a> <a href="?excluir=' . $value['id'] . '"><input type="button" value="Excluir"/></a><a href="?ban=' . $value['id'] . '"><input type="button" value="Ban/Unban"/></a></td>' . '</tr>' . '';

            echo '</tr>';
        }
    }
}
?>