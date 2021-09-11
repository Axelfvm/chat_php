<?php
if ($_SESSION['login'] != true) {
    header('Location: index.php');
    die();
}

?>