<?php

session_start();
const host = 'localhost';
const dbname = 'login';
const user = 'root';
const senha = '';
const porta = '3306';

$tb_user = 'usuarios';
$tb_post = 'post';

$programador = "Axel";
$git = "https://github.com/Axelfvm";
$version = '1.4';

try {
    $pdo = new PDO('mysql:host=' . host . ';port=' . porta . ';dbname=' . dbname . '', user, senha, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Vai mostrar erros caso exista.
} catch (Exception $e) { /* Pegue a exception e coloque na variável $e */
    echo '<p style="
    margin-top: 15px;
    color: red; 
    background: black; 
    border-radius: 16px;
    width: 100%; 
    text-align: center;">Erro ao conectar ao banco de dados</p>';
    //echo $e;
}

$query = $pdo->prepare("select * from painel where id = 1");
$query->execute();
$retorno = $query->fetch();
$title = $retorno['n_chat'];
$cor_fundo = $retorno['cor_fundo'];
?>