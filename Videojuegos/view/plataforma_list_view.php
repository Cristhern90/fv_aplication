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
        <h1>Plataformas</h1>
        <ul>
            <?php foreach ($plataformas as $plataforma) { ?>
            <li><a href="plataformas/<?php echo $plataforma->getId()?>"><?php echo $plataforma->getName() . " (" . $plataforma->getCompany() . ")"; ?></a></li>
            <?php } ?>
        </ul>
        <div>
            <a href="plataformas/nueva">Nueva Plataforma</a>
        </div>
    </body>
</html>
