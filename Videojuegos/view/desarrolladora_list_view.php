<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php include_once 'header.php';?>
        <h1>Desarrolladoras</h1>
        <ul>
            <?php
            // put your code here
            foreach ($desarrolladoras as $desarrolladora) {
                ?>
            <li><a href="empresas/<?php echo $desarrolladora->getId(); ?>"><?php echo $desarrolladora->getName(); ?></a></li>
            <?php } ?>
        </ul>
        <div>
            <a href="empresas/nueva">Nueva Empresa</a>
        </div>
    </body>
</html>
