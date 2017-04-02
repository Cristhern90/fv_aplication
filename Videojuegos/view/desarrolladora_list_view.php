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
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                   <h1>Desarrolladoras</h1>
                    <ul>
                    <?php
                    // put your code here
                    foreach ($desarrolladoras as $desarrolladora) {
                        ?>
                        <li><a href="empresas/<?php echo $desarrolladora->getId(); ?>"><?php echo $desarrolladora->getName(); ?></a></li>
                    <?php } ?>
                    </ul>
                    <h1>Editoras</h1>
                    <ul>
                    <?php
                    // put your code here
                    foreach ($editoras as $editora) {
                        ?>
                        <li><a href="empresas/<?php echo $editora->getId(); ?>"><?php echo $editora->getName(); ?></a></li>
                    <?php } ?>
                    </ul>
                    <h1>Otras</h1>
                    <ul>
                    <?php
                    // put your code here
                    foreach ($empresas as $empresa) {
                        ?>
                        <li><a href="empresas/<?php echo $empresa->getId(); ?>"><?php echo $empresa->getName(); ?></a></li>
                    <?php } ?>
                    </ul>
                    <div class="enlaces">
                        <a href="empresas/nueva">Nueva Empresas</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
