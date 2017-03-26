<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FrontController
 *
 * @author Cristian
 */
class FrontController {

    //put your code here

    static function main() {
        session_start();
        require 'DAO/JuegoDAO.php';
        require 'DAO/EmpresaDAO.php';
        require 'DAO/PlataformaDAO.php';
        require 'DAO/UsuarioDAO.php';
        require 'DAO/EditoraDAO.php';
        require 'libs/SPDO.php';
        require 'libs/View.php';
        require 'libs/Config.php';
        require 'libs/configuracion.php';
        require 'models/JuegoModel.php';
        require 'models/EmpresaModel.php';
        require 'models/PlataformaModel.php';
        require 'models/UsuarioModel.php';
        require 'models/EditoraModel.php';
        require 'controller/Controller.php';
        require 'controller/juegosController.php';
        require 'controller/empresasController.php';
        require 'controller/plataformasController.php';
        require 'controller/usuariosController.php';


        if (!array_key_exists("PATH_INFO", $_GET)) {
            $data["hola"] = "hola";
            View::show("inici.php", $data);
        } else {

            $pet = $_GET["PATH_INFO"];
            $peticion = explode("/", $pet);
            $cont = $peticion[0] . "Controller";
            $metodo = strtolower($_SERVER['REQUEST_METHOD']);
            switch ($metodo) {
                case "get":
                    $cont::get($peticion);
                    break;
                case "post":
                    $cont::post($peticion);
                    break;
            }
        }
    }

}
