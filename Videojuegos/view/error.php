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
        <?php
        switch ($error) {
            case 1:
                ?>
                <p style="color: red">Session no iniciada, imposible acceder a la aplicación</p>
                <form action="/Videojuegos/usuarios/pri" method="post">
                    <input type="text" name="nickname">
                    <input type="password" name="password">
                    <input type="submit" value="Login">
                </form>
                <?php
                break;
            default:
                break;
        }
        ?>
    </body>
</html>
