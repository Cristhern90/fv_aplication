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
        <h1>Perfil de <?php echo $usuario->getNick(); ?></h1>
        <ul>
            <li>Nombre: <?php echo utf8_encode($usuario->getName()); ?></li>
            <li>Apellidos: <?php echo utf8_encode($usuario->getSurnames()); ?></li>
            <li>Cargo: <?php echo utf8_encode($usuario->getCargo()); ?></li>
        </ul>
        <hr>
        <table border="black">
            <tr>
                <td>Titlo</td>
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
                </tr>
            <?php } ?>
        </table>
    </body>
</html>
