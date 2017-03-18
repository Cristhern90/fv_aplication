<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PlataformaDAO
 *
 * @author Cristian
 */
class PlataformaDAO {

    //put your code here

    static function get_plataformas() {
        $con = SPDO::singleton();
        $query = "select * from plataforma order by name";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $p = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $plataformas = array();
        $count = 0;
        foreach ($p as $pla) {
            $plataforma = new PlataformaModel($pla["id"], $pla["name"], $pla["company"]);
            $plataformas[$count] = $plataforma;
            $count++;
        }
        return $plataformas;
    }

    static function get_plataforma_by_id($id) {
        $con = SPDO::singleton();
        $query = "select * from plataforma where id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $pla = $stmt->fetch(PDO::FETCH_ASSOC);
        $plataforma = new PlataformaModel($pla["id"], $pla["name"], $pla["company"]);
        return $plataforma;
    }

    static function insert_platafora($name, $company) {
        $con = SPDO::singleton();
        $query = "insert into plataforma (name,company) values (:name, :company)";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":company", $company, PDO::PARAM_STR);
        $stmt->execute();
    }

    static function count_platforms() {
        $con = SPDO::singleton();
        $query = "select * from plataforma order by name";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $p = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $plataformas = array();
        $count = 0;
        foreach ($p as $pla) {
            $plataforma = new PlataformaModel($pla["id"], $pla["name"], $pla["company"]);
            $plataformas[$count] = $plataforma;
            $count++;
        }
        return sizeof($plataformas);
    }

    
    static function get_juegos_by_plataforma_id($id){
        $con = SPDO::singleton();
        $query = "SELECT * FROM `plataforma_has_juegos` WHERE plataforma_id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $j = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $juegos = array();
        $count = 0;
        foreach ($j as $jue) {
            $juego = JuegoDAO::get_juego_by_id($jue["juegos_id"]);
            $juegos[$count]=$juego;
            $count++;
        }
        return $juegos;
    }
}
