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
        if (!array_key_exists("usuario", $_SESSION)) {
            $_SESSION["usuario"] = null;
        }
        if ($_SESSION["usuario"] == null) {
            ?>
            <div class="cont">
                <div class="img"><img src="/Videojuegos/data/img/fv_logo.png" alt="Logo" width="100" height="100"></div>
                <div class='bor'>
                    <h1>Iniciar Sesion</h1>
                    <form action="/Videojuegos/usuarios/pri" method="post">
                        <input type="text" name="nickname">
                        <input type="password" name="password">
                        <input type="submit" value="Login">
                        
                    </form>
                </div>
            </div>
        <?php } else { ?>
            <script src="http://localhost/Videojuegos/data/js/jquery.js" type="text/javascript"></script>
            <script type="text/javascript">
                function redireccionar() {
                    window.location = "http://localhost/Videojuegos/usuarios/pri";
                }
                setTimeout("redireccionar()", 10); //tiempo expresado en milisegundos
            </script>

        <?php } ?>
        <link href="/Videojuegos/data/css/inici.css" rel="stylesheet" type="text/css"/>
    </body>
</html>
