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
                $desarrolladoras = EmpresaDAO::get_empresas();
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
        $fecha_lanzamiento=$_POST["fecha"];
        $lista_desarrolladoras=array();
        $lista_productoras=array();
        $lista_plataformas=array();
        $countd = 0;
        $countpr = 0;
        $countp = 0;
        for ($i = 1; $i <= 5; $i++) {
            $arr_key = "des" . $i;
            if (array_key_exists($arr_key, $_POST)) {
                $desarrolladora = EmpresaDAO::get_empresas_by_id($_POST[$arr_key]);
                $lista_desarrolladoras[$countd] = $desarrolladora;
                $countd++;
            }
        }
        for ($i = 1; $i <= 5; $i++) {
            $arr_key = "pro" . $i;
            if (array_key_exists($arr_key, $_POST)) {
                $productora = EmpresaDAO::get_empresas_by_id($_POST[$arr_key]);
                $lista_productoras[$countpr] = $productora;
                $countpr++;
            }
        }
        for ($i = 1; $i <= 5; $i++) {
            $arr_key = "plat" . $i;
            if (array_key_exists($arr_key, $_POST)) {
                $plataforma = PlataformaDAO::get_plataforma_by_id($_POST[$arr_key]);
                $lista_plataformas[$countp] = $plataforma;
                $countp++;
            }
        }
        $dir_subida = 'C:\\xampp\\htdocs\\Videojuegos\\data\\img';
        $fichero_subido = $dir_subida . "\\" . basename($_FILES['imagen']['name']);
        echo '<pre>';
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], utf8_decode($fichero_subido))) {
            echo "El fichero es válido y se subió con éxito.\n";
        } else {
            echo "¡Posible ataque de subida de ficheros!\n";
        }
        print "</pre>";


        $caratula = $_FILES["imagen"]["name"];
        JuegoDAO::insert_juego($titulo, $subtitulo, $fecha_lanzamiento, $lista_desarrolladoras, $lista_productoras, $lista_plataformas, $caratula);
        $data["pet"] = $pet[0];
        View::show("redirect_page.php", $data);
    }

    public static function delete($pet) {
        
    }

    public static function put($pet) {
        
    }

}
