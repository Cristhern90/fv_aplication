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
class empresasController implements Controller{

    //put your code here
    static function get($pet) {
        if (!array_key_exists(1, $pet)) {
            $desarrolladoras = EmpresaDAO::get_empresas();
            $data["desarrolladoras"] = $desarrolladoras;
            View::show("desarrolladora_list_view.php", $data);
        } else {
            if ($pet[1] == "nueva") {
                $data["hola"] = "hola";
                View::show("insert_desarrolladora.php", $data);
            }else{
                $desarrolladora=  EmpresaDAO::get_empresas_by_id($pet[1]);
                $juegos=  EmpresaDAO::get_juegos_by_desarrolladora_id($pet[1]);
                $data["desarrolladora"]=$desarrolladora;
                $data["juegos"]=$juegos;
                View::show("desarrolladora_view.php", $data);
            }
        }
    }

    static function post($pet) {
        $name = $_POST["name"];
        EmpresaDAO::insert_empresa($name);
        $data["pet"]=$pet[0];
        View::show("redirect_page.php", $data);
    }

    public static function delete($pet) {
        
    }

    public static function put($pet) {
        
    }

}
