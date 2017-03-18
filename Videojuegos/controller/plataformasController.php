<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of plataformasController
 *
 * @author Cristian
 */
class plataformasController implements Controller {

    public static function get($pet) {
        if (!array_key_exists(1, $pet)) {
            $plataformas = PlataformaDAO::get_plataformas();
            $data["plataformas"] = $plataformas;
            View::show("plataforma_list_view.php", $data);
        }else{
            if ($pet[1] == "nueva") {
                $data["hola"] = "hola";
                View::show("insert_plataforma.php", $data);
            }else{
                $plataforma = PlataformaDAO::get_plataforma_by_id($pet[1]);
                $juegos = PlataformaDAO::get_juegos_by_plataforma_id($pet[1]);
                $data["plataforma"]=$plataforma;
                $data["juegos"]=$juegos;
                View::show("plataforma_view.php", $data);
            }
        }
    }

    static function post($pet) {
        $name = $_POST["name"];
        $company = $_POST["company"];
        PlataformaDAO::insert_platafora($name, $company);
        $data["pet"] = $pet[0];
        View::show("redirect_page.php", $data);
    }

    public static function put($pet) {
        
    }

    public static function delete($pet) {
        
    }

}
