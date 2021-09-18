<link href="../css/general.main.css" rel="stylesheet" type="text/css"/>
<?php
$lgnusr = $_SESSION['usuario'];
$query1 = $pdo->prepare("select * from $tb_user where usuario = '$lgnusr'");
$query1->execute();
$retorno1 = $query1->fetch();

if (isset($_GET['sair'])) {
    session_destroy();
    header('Location: index.php');
    die();
}
if ($retorno1['su'] == 10) {
    echo '<div class="header">';
    echo '<ul>';
    echo '<li><a> ' . $_SESSION['nome'] . '</a></li>';
    echo '    <li><a href="home.php">Home</a></li>';
    echo '    <li><a href="buscar.php">Buscar Usuário</a></li>';
    echo '    <li><a href="cadastro.php">Cadastrar Usuário</a></li>';
    echo '    <li><a href="?sair">Sair</a></li>';
    echo '</ul>';

    echo '</div>';
} else {
    echo '<div class="header">';
    echo '<ul>';
    echo '    <li><a href="home.php">Home</a></li>';
    echo '    <li><a href="?sair">Sair</a></li>';
    echo '</ul>';

    echo '</div>';
}
?>