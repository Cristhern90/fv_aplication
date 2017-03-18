<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of juegosController
 *
 * @author Cristian
 */
class juegosController implements Controller {

    //put your code here

    static function get($pet) {
        if (!array_key_exists(1, $pet)) {
            $juegos = JuegoDAO::get_juegos();

            $data["juegos"] = $juegos;
            View::show("juego_list_view.php", $data);
        } else {
            if ($pet[1] == "nuevo") {
                $desarrolladoras = DesarrolladoraDAO::get_desarrolladoras();
                $plataformas = PlataformaDAO::get_plataformas();
                $data["desarrolladoras"] = $desarrolladoras;
                $data["plataformas"] = $plataformas;
                View::show("insert_juego.php", $data);
            } else {
                $juego = JuegoDAO::get_juego_by_id($pet[1]);
                $data["juego"] = $juego;
                View::show("juego_view.php", $data);
            }
        }
    }

    public static function post($pet) {
        $titulo = $_POST["titulo"];
        $subtitulo = $_POST["subtitulo"];
        $desarrolladora_id = $_POST["debelop"];
        $lista_plataformas = array();
        $count_plataformas = PlataformaDAO::count_platforms();
        
        $count = 0;
        for ($i = 0; $i <= $count_plataformas; $i++) {
            $arr_key = "plat" . $i;
            if (array_key_exists($arr_key, $_POST)) {
                $plataforma = PlataformaDAO::get_plataforma_by_id($_POST[$arr_key]);
                $lista_plataformas[$count] = $plataforma;
                $count++;
            }
        }
        JuegoDAO::insert_juego($titulo, $subtitulo, $desarrolladora_id, $lista_plataformas);
        $data["pet"] = $pet[0];
        View::show("redirect_page.php", $data);
    }

    public static function delete($pet) {
        
    }

    public static function put($pet) {
        
    }

}
