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
        <script src="http://localhost/Videojuegos/data/js/jquery.js" type="text/javascript"></script>
        <script type="text/javascript">
            function redireccionar() {
                window.location = "../<?php echo $pet ?>";
            }
            setTimeout("redireccionar()", 10); //tiempo expresado en milisegundos
        </script>
    </head>
    <body>
    </body>
</html>
