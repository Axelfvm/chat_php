<link href="includes/css/general.main.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
$lgnusr = $_SESSION['usuario'];
$query1 = $pdo->prepare("select * from $tb_user where usuario = '$lgnusr'");
$query1->execute();
$retorno1 = $query1->fetch();

if ($_SESSION['login'] != true) {
    header('Location: index.php');
    die();
}

if (isset($_GET['sair'])) {
    session_destroy();
    header('Location: index.php');
    die();
}
if ($retorno1['su'] == 10) {
    echo '<div class="topnav" id="myTopnav">';
    echo '<a class="active"> ' . $_SESSION['nome'] . '</a>';
    echo '    <a href="home.php">Home</a>';
    echo '    <a href="admin/painel.php">Painel Admin</a>';
    echo '    <a href="painel.php">Painel Usuário</a>';
    echo '    <a href="admin/buscar.php">Buscar Usuário</a>';
    echo '    <a href="admin/cadastro.php">Cadastrar Usuário</a>';
    echo '    <a href="?sair">Sair</a>';
    echo ' <a href = "javascript:void(0);" class = "icon" onclick = "myFunction()">
    <i class = "fa fa-bars"></i></a>';
    echo '</div>';
} else {
    echo '<div class = "topnav" id = "myTopnav">';
    echo '<a class="active"> ' . $_SESSION['nome'] . '</a>';
    echo ' <a href = "home.php">Home</a>';
    echo ' <a href = "painel.php">Painel Usuário</a>';
    echo ' <a href = "?sair">Sair</a>';
    echo ' <a href = "javascript:void(0);" class = "icon" onclick = "myFunction()">
    <i class = "fa fa-bars"></i></a>';
    echo '</div>';
}
?>

<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>