<?php
include('../../config/config.php');
include('../class/chat.class.php');

// 

$lgnusr = $_SESSION['usuario'];
$query1 = $pdo->prepare("select * from $tb_user where usuario = '$lgnusr'");
$query1->execute();
$retorno1 = $query1->fetch();

if ($retorno1['ban'] == 1) {
    header('Location: 404.html');
    die();
}

if (count($retorno) > 0) {
    foreach ($retorno as $value) {

        if ($retorno1['su'] == 10) {
            if ($value['oculto'] == 1) {


                echo '<div class="linha" style="word-wrap: break-word;">';
                echo '' . '<p style="color: #cecece;">' . 'ID> ' . $value['id'] . '   (' . $value['date'] . ') ' . '<a href="../../perfil?user=' . $value['autor'] . '" target="_blank">' . $value['autor'] . '</a>: ' . $value['msg'] . '' . '<a href="?ocultar=' . $value['id'] . '" style="margin-left: 30px;"><input type="button" value="O"/></a> ' . ' <a href="?excluir=' . $value['id'] . '" style="margin-left: 30px;"><input type="button" value="X"/></a>' . '' . '</p>';
                echo '';
                echo '</div>';
            } else {
                echo '<div class="linha" style="word-wrap: break-word;">';
                echo '' . '<p>' . 'ID> ' . $value['id'] . '   (' . $value['date'] . ') ' . '<a href="../../perfil?user=' . $value['autor'] . '" target="_blank">' . $value['autor'] . '</a>: ' . $value['msg'] . '' . '<a href="?ocultar=' . $value['id'] . '" style="margin-left: 30px;"><input type="button" value="O"/></a>' . '<a href="?excluir=' . $value['id'] . '" style="margin-left: 30px;"><input type="button" value="X"/></a>' . '' . '</p>';
                echo '';
                echo '</div>';
            }
        } else {
            if ($value['oculto'] == 1) {
                echo '<p>Menssagem oculta pelo Administrador</p>';
            } else {
                echo '<div class="linha" style="word-wrap: break-word;">';
                echo '' . '<p>' . ' (' . $value['date'] . ') ' . '<a href="../../perfil?user=' . $value['autor'] . '" target="_blank">' . $value['autor'] . '</a>: ' . $value['msg'] . '' . '</p>';
                echo '';
                echo '</div>';
            }
        }
    }
} else {
    echo 'Sem dados para exibir';
}
?>
