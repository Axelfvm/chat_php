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
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $criptografada = password_hash($senha, PASSWORD_DEFAULT);
    $su = $_POST['cargo'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $pais = $_POST['pais'];
    $idade = $_POST['idade'];
    


    $query = $pdo->prepare("select * from $tb_user where usuario = '$usuario'");
    //$query->bindParam($usuario, PDO::PARAM_INT);
    $query->execute();
    $retorno = $query->fetchAll();

    if (count($retorno) > 0) {
        //usuário está registrado
        echo 'Usuário existente!';
    } else if ($nome == '' || $usuario == '' || $senha == '' || $email == '') {
        echo 'Preencha o campo.';
    } else {

        $sql = $pdo->prepare("INSERT INTO $tb_user (nome,usuario,senha,su,email,sexo,idade,pais) VALUES ('$nome','$usuario','$criptografada', '$su','$email', '$sexo', '$idade', '$pais')");
        $sql->execute([$nome, $usuario, $criptografada, $su, $email, $sexo, $idade, $pais]);
        echo 'Usuário cadastrado com sucesso';
    }
}


?>