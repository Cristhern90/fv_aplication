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
        <link href="/Videojuegos/data/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <style>
            .fa-check{
                color: green;
            }
            .fa-close{
                color: red;
            }
        </style>
    </head>
    <body>
        <?php include_once 'header.php'; ?>
        <div class="cont">
            <div class="col-xs-10 col-xs-offset-1">
                <h1>Perfil Privado de <?php echo $usuario->getNick() ?></h1>

                <ul>
                    <li>Nombre: <?php echo utf8_encode($usuario->getName()); ?></li>
                    <li>Apellidos: <?php echo utf8_encode($usuario->getSurnames()); ?></li>
                    <li>Cargo: <?php echo utf8_encode($usuario->getCargo()); ?></li>
                </ul>
                <hr>
                <div class="row">
                    <table class="tablepri col-xs-10 col-xs-offset-1">
                        <tr>
                            <td>Titulo</td>
                            <td>Subtitulo</td>
                            <td>Terminado</td>
                        </tr>
                        <?php foreach ($juegos as $jueg) { ?>
                            <tr>
                                <td><?php echo $jueg["juego"]->getTitulo(); ?></td>
                                <td><?php echo $jueg["juego"]->getSubtitulo(); ?></td>
                                <td><?php
                                    if ($jueg["ter"] == 1) {
                                        echo "<i class='fa fa-check'></i>";
                                    } else {
                                        echo "<i class='fa fa-close'></i>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <form method="post" >
                                        <?php
                                        if ($jueg["ter"] == 1) {
                                            echo '<input type="hidden" name="terminado" value="0">';
                                        } else {
                                            echo '<input type="hidden" name="terminado" value="1">';
                                        }
                                        ?>
                                        <input type="hidden" name="juego" value="<?php echo $jueg["juego"]->getId(); ?>">
                                        <input type="submit" value="Terminado" class="termi">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <div class="col-xs-10 col-xs-offset-1 enlaces">
                        <a href="pri/añadir">Añadir Juego</a>
                        <br>
                        <a href="deslog">Salir</a>
                    </div>
                </div>

            </div>


        </div>
    </body>
</html>
