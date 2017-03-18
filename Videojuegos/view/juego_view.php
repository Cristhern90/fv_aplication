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
        <h1><?php echo $juego->getTitulo() . ":" . $juego->getSubtitulo(); ?></h1>
        <ul>
            <li>Desarrolladora: <?php echo $juego->getDesarrolladora()->getname(); ?></li>
            <li>Plataformas
                <ul>
                    <?php foreach ($juego->getplataformas() as $plataforma) { ?>
                    <li><a href="/VideoJuegos/plataformas/<?php echo $plataforma->getId()?>"><?php echo $plataforma->getName() . " (" . $plataforma->getCompany() . ")" ?></a></li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
    </body>
</html>
