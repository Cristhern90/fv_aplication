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
        <h1><?php echo $desarrolladora->getName(); ?></h1>
        <ul>
            <?php foreach ($juegos as $juego) { ?>
                <li><a href="/Videojuegos/juegos/<?php echo $juego->getId() ?>"><?php echo $juego->getCompleteName(); ?></a></li>
            <?php } ?>
        </ul>
    </body>
</html>
