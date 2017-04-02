<link href="/Videojuegos/data/css/header-footer.css" rel="stylesheet" type="text/css"/>
<header class="container-fluid">
    <div class="menu" >
        <?php
        //$_SESSION["usuario"] = null;
        if (!array_key_exists("usuario", $_SESSION)) {
            $_SESSION["usuario"] = null;
        }
        if ($_SESSION["usuario"] == null) {
            ?>
            <form action="/Videojuegos/usuarios/pri" method="post">
                <input type="text" name="nickname">
                <input type="password" name="password">
                <input type="submit" value="Login">
            </form>
            <?php
            if (!array_key_exists("error", $_SESSION)) {
                $_SESSION["error"] = null;
            }
            if ($_SESSION["error"] != null) {
                echo "<p class='error'>" . $_SESSION["error"] . "</p>";
            }
            ?>
        <?php } else { ?>
            <a class="item1" href="/Videojuegos">Inicio</a>
            <a class="item1" href="/Videojuegos/juegos">Juegos</a>
            <a class="item1" href="/Videojuegos/empresas">Empresas</a>
            <a class="item1" href="/Videojuegos/plataformas">Plataformas</a> 
            <a class="item1" href="/Videojuegos/usuarios">Usuarios</a> 
            <a class="item1" href="/Videojuegos/usuarios/pri"><?php
                $usuario = unserialize($_SESSION["usuario"]);
                echo $usuario->getNick();
                ?></a>
        <?php } ?>

    </div>
</header>
<style>
    .error{
        color:red;
    }
</style>
