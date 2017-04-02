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
                <h1>Usuarios</h1>
                <ul>
                    <?php foreach ($usuarios as $usuario) { ?>
                        <li><a href="usuarios/<?php echo $usuario->getId() ?>"><?php echo $usuario->getNick() ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </body>
</html>
