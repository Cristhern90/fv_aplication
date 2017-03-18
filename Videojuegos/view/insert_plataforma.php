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
        <h1>Añadir una nueva desarrolladora</h1>
        <form method="post">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name">
            <label for="company">Compania</label>
            <input type="text" name="company" id="name">
            <input type="submit" value="Guardar">
        </form>
    </body>
</html>
