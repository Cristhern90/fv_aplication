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
        <h1>Editores</h1>
        <ul>
            <?php foreach ($edits as $edi) { ?>
                <li><a href="<?php echo $edi->getId() ?>"><?php echo $edi->getName() ?></a></li>
            <?php } ?>
        </ul>
        <a href="editoras/nueva">Nueva Editora</a>
    </body>
</html>
