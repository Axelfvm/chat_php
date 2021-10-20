<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of query
 *
 * @author Axel
 */
$lgnusr = $_SESSION['usuario'];
$queryUser = $pdo->prepare("select * from $tb_user where usuario = '$lgnusr'");
$queryUser->execute();
$retornoUser = $queryUser->fetch();



$queryPainel = $pdo->prepare("select * from painel where id = 1");
$queryPainel->execute();
$retornoPainel = $queryPainel->fetch();


