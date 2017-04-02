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
        <?php include_once 'header.php'; ?>
        <div class="cont">
            <div class="col-xs-10 col-xs-offset-1">
                <h1><?php echo $plataforma->getName() . " (" . $plataforma->getCompany() . ")"; ?></h1>
                <ul>
                    <?php foreach ($juegos as $juego) { ?>
                        <li><a href="/Videojuegos/juegos/<?php echo $juego->getId(); ?>"><?php echo $juego->getCompleteName(); ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </body>
</html>
