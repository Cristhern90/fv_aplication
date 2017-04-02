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
                <div class="col-xs-10 col-xs-offset-1">
                    <h1>Añadir un juego nuevo</h1>
                    <form method="post"  enctype="multipart/form-data">
                        <div class="col-xs-4">
                            <h2>Titulo</h2>
                            <input name="titulo">
                        </div>
                        <div class="col-xs-4">
                            <h2>Subtitulo</h2>
                            <input name="subtitulo">
                        </div>
                        <div class="col-xs-4">
                            <h2>Fecha de estreno</h2>
                            <input name="fecha">
                        </div>
                        <div class="col-xs-4">
                            <h2>Desarrolladoras</h2>
                            <input type="number" id="num_des" value="1" max="5" min="1">
                            <input type="button" id="sel_num_des" value="seleccionar">
                            <div id="des"></div>
                        </div>
                        <div class="col-xs-4">
                            <h2>Productoras</h2>
                            <input type="number" id="num_pro" value="1" max="5" min="1">
                            <input type="button" id="sel_num_pro" value="seleccionar">
                            <div id="pro"></div>
                        </div>
                        <div class="col-xs-4">
                            <h2>Plataformas</h2>
                            <input type="number" id="num_plats" value="1" max="5" min="1">
                            <input type="button" id="sel_num_plats" value="seleccionar">
                            <div id="plats"></div>
                        </div>
                        <div class="col-xs-6 col-xs-offset-3">
                            <h2>Caratula</h2>
                            <input type="file" name="imagen">
                        </div>
                        <div class="col-xs-4 col-xs-offset-8" style="padding-top: 1%;">
                            <input type="submit" value="Guardar">
                        </div>
                    </form>
                    <script src="../data/js/jquery.js" type="text/javascript"></script>
                    <script>
                        $(document).ready(function () {
                            function plataformas_num(num) {
                                var parametros = {"num": num};
                                $.ajax({
                                    data: parametros,
                                    type: "post",
                                    url: "http://localhost/Videojuegos/ajax/sel_plataformas.php",
                                    success: function (response) {
                                        $("#plats").html(response);
                                    },
                                    error: function () {
                                        alert("error");
                                    }
                                });
                            }
                            function desarrolladoras_num(num) {
                                var parametros = {"num": num};
                                $.ajax({
                                    data: parametros,
                                    type: "post",
                                    url: "http://localhost/Videojuegos/ajax/sel_desarrolladoras.php",
                                    success: function (response) {
                                        $("#des").html(response);
                                    },
                                    error: function () {
                                        alert("error");
                                    }
                                });
                            }
                            function productoras_num(num) {
                                var parametros = {"num": num};
                                $.ajax({
                                    data: parametros,
                                    type: "post",
                                    url: "http://localhost/Videojuegos/ajax/sel_productoras.php",
                                    success: function (response) {
                                        $("#pro").html(response);
                                    },
                                    error: function () {
                                        alert("error");
                                    }
                                });
                            }

                            $("#sel_num_plats").click(function () {
                                var plats = $("#num_plats").val();
                                plataformas_num(plats);
                            });

                            $("#sel_num_des").click(function () {
                                var des = $("#num_des").val();
                                desarrolladoras_num(des);
                            });

                            $("#sel_num_pro").click(function () {
                                var pro = $("#num_pro").val();
                                productoras_num(pro);
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </body>

</html>