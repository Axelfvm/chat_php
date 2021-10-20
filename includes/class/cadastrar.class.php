<?php


if (isset($_POST['acao'])) {
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $criptografada = password_hash($senha, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $pais = $_POST['pais'];
    $idade = $_POST['idade'];

    $query = $pdo->prepare("select * from $tb_user where usuario = '$usuario'");
    $query->execute();
    $retorno = $query->fetchAll();

    if (count($retorno) > 0) {
        //usuário está registrado
        echo 'Usuário existente!';
    } else if ($nome == '' || $usuario == '' || $senha == '' || $email == '') {
        echo 'Preencha o campo.';
    } else {

        $sql = $pdo->prepare("INSERT INTO $tb_user (nome,usuario,senha,email,sexo,idade,pais) VALUES ('$nome','$usuario','$criptografada', '$email', '$sexo', '$idade', '$pais')");
        $sql->execute([$nome, $usuario, $criptografada, $email, $sexo, $idade, $pais]);
        echo 'Usuário cadastrado com sucesso';
    }
}
?>