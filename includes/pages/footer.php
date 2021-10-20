<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<footer>
    <ul>
        <li> Criado por <a href="<?= $git ?>" target="_blank"><?= $programador ?></a> </li>
        <li> zChat - Sistema Open Source </li>
    </ul>
</footer>

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