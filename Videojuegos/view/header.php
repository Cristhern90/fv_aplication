<header>
    <a href="/Videojuegos">Inicio</a>
    <a href="/Videojuegos/juegos">Juegos</a>
    <a href="/Videojuegos/desarrolladoras">Desarrolladoras</a>
    <a href="/Videojuegos/editoras">Editoras</a> 
    <a href="/Videojuegos/plataformas">Plataformas</a> 
    <a href="/Videojuegos/usuarios">Usuarios</a> 
    
    <div>
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
            <a href="usuarios/pri"><?php
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
