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
        <style type="text/css">
            .hide{
                display: none;
            }
            .show{
                visibility: visible;
            }
        </style>
    </head>
    <body>
        <?php include_once 'header.php';?>
        <h1>Añadir un juego nuevo</h1>
        <form method="post">
            <div>
                <label for="title">Titulo</label>
                <input name="titulo"></div>
            <div>
                <label for="subtitle">Subtitulo</label>
                <input name="subtitulo"></div>
            <div>
                <label for="platform">Desarrolladora</label>
                <select name="debelop" id="debelop1">
                    <?php foreach ($desarrolladoras as $desarrolladora) { ?>
                        <option value="<?php echo $desarrolladora->getId() ?>"><?php echo $desarrolladora->getName() ?></option>
                    <?php } ?>

                </select>
                <input type="button" value="Nueva desarroladora" id="but1">
                <input type="text" name="debelop2" id="debelop2">
            </div>
            <div>
                <?php foreach ($plataformas as $plataforma) { ?>

                    <input type="checkbox" value="<?php echo $plataforma->getId() ?>" name="plat<?php echo $plataforma->getId() ?>">
                    <label for="plat<?php echo $plataforma->getId() ?>"><?php echo $plataforma->getName() . "(" . $plataforma->getCompany() . ")"; ?></label>
                <?php } ?>
            </div>

            <div>
                <input type="submit" value="Guardar">
            </div>
        </form>
        <script src="../data/js/jquery.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $("#debelop2").addClass("hide");
                $("#but1").click(function () {
                    $("#debelop2").toggleClass("hide");
                    $("#debelop1").toggleClass("hide");
                });
            });
        </script>

    </body>

</html>