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
        <h1>Seleccione las plataformas para:</h1>
        <h2><?php echo $juego->getCompleteName(); ?></h2>
        <form method="post">
            <ul>
                <?php foreach ($plataformas as $plataforma) { ?>
                    <li><input type="checkbox" value="<?php echo $plataforma->getId() ?>" name="plat<?php echo $plataforma->getId() ?>"><?php echo $plataforma->getName() . "(" . $plataforma->getCompany() . ")" ?></li>
                <?php }
                ?>
            </ul>
            <input type="submit" value="Guardar">
        </form>
    </body>
</html>
