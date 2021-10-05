<?php

session_start();
const host = 'localhost';
const dbname = 'login';
const user = 'root';
const senha = '';
const porta = '3306';

$title = 'Teste';
$tb_user = 'usuarios';
$tb_post = 'post';

$programador = "Axel";
$git = "https://github.com/Axelfvm";

try {
    $pdo = new PDO('mysql:host=' . host . ';port=' . porta . ';dbname=' . dbname . '', user, senha, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Vai mostrar erros caso exista.
} catch (Exception $e) { /* Pegue a exception e coloque na variável $e */
    echo 'Erro ao conectar ao banco de dados';
    echo $e;
}
?>