<style>
    .header{
        background: #8ce3ff;
        height: 62px;
        width: 100vw;
        margin-top: -8px;
        margin-left: -8px;
        display: flex;
        justify-content: center;
        position: absolute;
    }
    .header ul{
        text-align: center;
        display: flex;
        justify-content: center;
    }
    .header li{
        margin-right: 30px;
        font-family: monospace;
        font-size: 16px;
    }
</style>


<?php
$lgnusr = $_SESSION['usuario'];
$query1 = $pdo->prepare("select * from $tb_user where usuario = '$lgnusr'");
//$query->bindParam($usuario, PDO::PARAM_INT);
$query1->execute();
$retorno1 = $query1->fetch();
if ($retorno1['su'] == 10) {
    echo '<div class="header">';
    echo '<ul>';
    echo '    <li><a href="home">Home</a></li>';
    echo '    <li><a href="buscar">Buscar Usuário</a></li>';
    echo '    <li><a href="cadastro">Cadastrar Usuário</a></li>';
    echo '    <li>Sair</li>';
    echo '</ul>';

    echo '</div>';
} else {
    echo '<div class="header">';
    echo '<ul>';
    echo '    <li>Home</li>';
    echo '    <li>Sair</li>';
    echo '</ul>';

    echo '</div>';
}


//}
?>