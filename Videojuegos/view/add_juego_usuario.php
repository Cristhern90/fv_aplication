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
        <h1>Añadir un nuevo juego al usuario</h1>
        <form method="post" action="">

            <select name="juego">
                <?php
                foreach ($juegos as $juego) {
                    $bool = true;
                    if (sizeof($juegos_exist)) {
                        foreach ($juegos_exist as $ju) {
                            $id1 = $juego->getId();
                            $id2 = $ju["juego"]->getId();
                            if ($id1 != $id2) {
                                $bool = true;
                            } else {
                                $bool = false;
                                break;
                            }
                        }
                    }
                    if ($bool) {
                        echo '<option value="' . $juego->getId() . '">' . $juego->getCompleteName() . '</option>';
                    }
                }
                ?>
            </select>
            <div>
                <input type="checkbox" name="terminado">
                <label for="terminado">Terminado?</label>
            </div>
            <input type="submit" value="Añadir">
        </form>
    </body>
</html>
