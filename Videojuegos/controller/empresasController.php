<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dessarrolladoraController
 *
 * @author Cristian
 */
class empresasController implements Controller {

    //put your code here
    static function get($pet) {
        if (!array_key_exists(1, $pet)) {
            $desarrolladoras = EmpresaDAO::get_desarrolladoras();
            $editoras = EmpresaDAO::get_editoras();
            $empresas = EmpresaDAO::get_empresas();
            $data["empresas"] = $empresas;
            $data["desarrolladoras"] = $desarrolladoras;
            $data["editoras"] = $editoras;
            View::show("desarrolladora_list_view.php", $data);
        } else {
            if ($pet[1] == "nueva") {
                $data["hola"] = "hola";
                View::show("insert_desarrolladora.php", $data);
            } else {
                $desarrolladora = EmpresaDAO::get_empresas_by_id($pet[1]);
                if (EmpresaDAO::is_desarrolladora($pet[1])) {
                    $juegos = EmpresaDAO::get_juegos_of_desarrolladora($pet[1]);
                } else if (EmpresaDAO::is_productora($pet[1])) {
                    $juegos = EmpresaDAO::get_juegos_of_productora($pet[1]);
                } else{
                    $juegos=array();
                }
                $data["desarrolladora"] = $desarrolladora;
                $data["juegos"] = $juegos;
                View::show("desarrolladora_view.php", $data);
            }
        }
    }

    static function post($pet) {
        $name = $_POST["name"];
        EmpresaDAO::insert_empresa($name);
        $data["pet"] = $pet[0];
        View::show("redirect_page.php", $data);
    }

    public static function delete($pet) {
        
    }

    public static function put($pet) {
        
    }

}
