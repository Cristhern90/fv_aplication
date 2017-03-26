<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DesarrolladoraDAO
 *
 * @author Cristian
 */
class EmpresaDAO {

    //put your code here

    static function get_empresas() {
        $con = SPDO::singleton();
        $query = "select * from empresa";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $des = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $desarrolladoras = array();
        $count = 0;
        foreach ($des as $de) {
            $desarrolladora = new EmpresaModel($de["id"], $de["name"]);
            $desarrolladoras[$count] = $desarrolladora;
            $count++;
        }
        return $desarrolladoras;
    }//return list of business

    static function get_empresas_by_id($id) {
        $con = SPDO::singleton();
        $query = "select * from empresa where id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $des = $stmt->fetch(PDO::FETCH_ASSOC);
        $desarrolladora = new EmpresaModel($des["id"], $des["name"]);
        return $desarrolladora;
    }//return one business

    static function insert_empresa($name) {
        $con = SPDO::singleton();
        $query = "insert into empresa (name) values (:name)";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
    }//insert a new business in the data base
    
    

}
