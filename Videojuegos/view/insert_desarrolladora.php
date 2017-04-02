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
            <h1>Añadir una nueva empresa</h1>
            <div class="row">
                <form method="post">
                    <div class="col-xs-4 col-xs-offset-4">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name">
                    </div>
                </form>
                <div class="col-xs-4 col-xs-offset-8" style="padding-top: 1%;">
                    <input type="submit" value="Guardar">
                </div>
            </div>
        </div>
    </body>
</html>
