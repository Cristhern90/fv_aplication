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
            <h1><?php echo $juego->getCompleteName(); ?></h1>

            <ul>
                <li>Fecha de estreno: <?php echo $juego->getFecha_lanzamiento(); ?></li>
                <li>Desarrolladora: <?php echo $juego->getDesarrolladoras(); ?></li>
                <li>Productoras: <?php echo $juego->getProductoras(); ?></li>
                <li>Plataformas: <?php echo $juego->getPlataformas(); ?></li>
                <li><img src="/Videojuegos/data/img/<?php echo $juego->getCaratula() ?>" alt="<?php echo $juego->getCaratula() ?>"></li>
            </ul>
        </div>
    </body>
</html>
