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
        <link href="/Videojuegos/data/css/juegos.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
        <?php include_once 'header.php'; ?>
        <div class="lista-juegos">
            <h1>Juegos disponibles</h1>
            <div class="juegos">        
                <?php foreach ($juegos as $juego) { ?>
                <div class="juego">
                    <a href="juegos/<?php echo $juego->getId(); ?>">
                        <div class="jue">
                            <img src="/Videojuegos/data/img/<?php echo $juego->getCaratula()?>" alt="<?php echo $juego->getCaratula()?>">
                            <h3><?php echo $juego->getCompleteName(); ?></h3>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
            <div class="nuevo">
                <a href="juegos/nuevo">Añadir juego</a>
            </div>
        </div>
    </body>
</html>
