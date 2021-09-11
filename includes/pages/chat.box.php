<?php

include('../../config/config.php');
if ($_SESSION['login'] != true) {
    header('Location: index.php');
    die();
}
$query = $pdo->prepare("SELECT * FROM $tb_post ORDER BY
  id DESC");
$query->execute();
$retorno = $query->fetchAll();

if (count($retorno) > 0) {
    foreach ($retorno as $value) {

        echo '<div class="linha">';
        echo '' . '<p>' . ' (' . $value['date'] . ') ' . $value['autor'] . ': ' . $value['msg'] . '' . '' . '' . '' . '</p>';
        echo '</div>';
        //echo '<br>';
    }
} else {
    echo 'Sem dados para exibir';
}
?>