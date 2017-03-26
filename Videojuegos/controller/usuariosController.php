<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioController
 *
 * @author Cristian
 */
class usuariosController implements Controller {

    public static function delete($pet) {
        
    }

    public static function get($pet) {
        if (!array_key_exists(1, $pet)) {
            $usuarios = UsuarioDAO::get_usuarios();
            $data["usuarios"] = $usuarios;
            View::show("perfil_publico_list.php", $data);
        } else {
            if ($pet[1] == "pri") {
                $usuario = unserialize($_SESSION["usuario"]);
                $juegos = UsuarioDAO::juegos_by_usuario_id($usuario->getId());
                if (!array_key_exists(2, $pet)) {
                    $data["usuario"] = $usuario;
                    $data["juegos"] = $juegos;
                    View::show("perfil_privado.php", $data);
                } else {
                    if ($pet[2] == "añadir") {
                        $data["juegos_exist"] = $juegos;
                        $data["juegos"] = JuegoDAO::get_juegos();
                        $data["usuario"] = $usuario;
                        View::show("add_juego_usuario.php", $data);
                    } else if ($pet[2] == "plataforma") {
                        $juego = JuegoDAO::get_juego_by_id($_SESSION["juego_id"]);
                        $data["juego"] = $juego;
                        $plataformas = JuegoDAO::get_plat_juego_by_juego_id($_SESSION["juego_id"]);
                        $data["plataformas"] = $plataformas;
                        View::show("select_platform.php", $data);
                    }
                }
            } else if ($pet[1] == "deslog") {
                $_SESSION["usuario"] = null;
                $data["pet"] = "";
                View::show("redirect_page.php", $data);
            } else {
                $usuario = UsuarioDAO::get_usuario_by_id($pet[1]);
                $juegos = UsuarioDAO::juegos_by_usuario_id($pet[1]);
                $data["usuario"] = $usuario;
                $data["juegos"] = $juegos;
                View::show("perfil_publico.php", $data);
            }
        }
    }

    public static function post($pet) {
        echo "hola";
        if (!array_key_exists(1, $pet)) {
            $nick = $_POST["nickname"];
            $pass = $_POST["password"];
            $usuario = UsuarioDAO::login($nick, $pass);
            if ($usuario == "error") {
                $_SESSION["error"] = "Nick o contraseña incorrectas";
            } else {
                $_SESSION["error"] = null;
                $_SESSION["usuario"] = serialize($usuario);

                $data["usuario"] = $usuario;
                $juegos = UsuarioDAO::juegos_by_usuario_id($usuario->getId());
                $data["juegos"] = $juegos;
                View::show("perfil_privado.php", $data);
            }
        } else {
            
            if ($pet[1] == "pri") {
                
                if (array_key_exists(2, $pet)) {

                    if ($pet[2] == "añadir") {
                        $juego_id = $_POST["juego"];
                        $usuario = unserialize($_SESSION["usuario"]);
                        UsuarioDAO::jugar_juego($usuario->getId(), $juego_id);
                        if (array_key_exists("terminado", $_POST)) {
                            UsuarioDAO::terminar_juego($juego_id, $usuario->getId());
                        }
                        $_SESSION["juego_id"] = $juego_id;
                        $data["pet"] = $pet[1] . "/plataforma";
                        View::show("redirect_page.php", $data);
                    } else if ($pet[2] == "plataforma") {
                        $juego = JuegoDAO::get_juego_by_id($_SESSION["juego_id"]);
                        $usuario = unserialize($_SESSION["usuario"]);
                        //$data["juego"] = $juego;
                        $plataformas = JuegoDAO::get_plat_juego_by_juego_id($_SESSION["juego_id"]);
                        //$data["plataformas"] = $plataformas;
                        foreach ($plataformas as $plataforma) {
                            $name = "plat" . $plataforma->getId();
                            if (array_key_exists($name, $_POST)) {
                                $usuario_id= $usuario->getId();
                                $juego_id= $juego->getId();
                                $plataforma_id= $plataforma->getId();
                                PlataformaDAO::insert_plataforma_jugada($usuario_id, $juego_id, $plataforma_id);
                            }
                        }
                        View::show("inici.php", $data);
                    }
                } else if (!array_key_exists("juego", $_POST)) {
                    
                    $nick = $_POST["nickname"];
                    $pass = $_POST["password"];
                    $usuario = UsuarioDAO::login($nick, $pass);
                    $_SESSION["usuario"] = serialize($usuario);
                    $_SESSION["regist"] = 1;
                    $data["usuario"] = $usuario;
                    $juegos = UsuarioDAO::juegos_by_usuario_id($usuario->getId());
                    $data["juegos"] = $juegos;
                    View::show("perfil_privado.php", $data);
                } else {
                    
                    $usuario = unserialize($_SESSION["usuario"]);
                    $juego_id = $_POST["juego"];
                    $ter = $_POST["terminado"];
                    UsuarioDAO::terminar_juego($juego_id, $usuario->getId(), $ter);
                    $juegos = UsuarioDAO::juegos_by_usuario_id($usuario->getId());
                    $data["juegos"] = $juegos;
                    $data["usuario"] = $usuario;
                    View::show("perfil_privado.php", $data);
                }
            }
        }
    }

    public static function put($pet) {
        
    }

//put your code here
}
