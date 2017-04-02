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

                <h1>Añadir una nueva plataforma</h1>
                <form method="post">
                    <div class="col-xs-3 col-xs-offset-3">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="col-xs-3">
                        <label for="company">Compania</label>
                        <input type="text" name="company" id="name">
                    </div>
                    <div class="col-xs-2 col-xs-offset-5">
                        <input type="submit" value="Guardar" style="margin: 25%;">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
