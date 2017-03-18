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
class DesarrolladoraDAO {

    //put your code here

    static function get_desarrolladoras() {
        $con = SPDO::singleton();
        $query = "select * from desarrolladora";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $des = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $desarrolladoras = array();
        $count = 0;
        foreach ($des as $de) {
            $desarrolladora = new DesarrolladoraModel($de["id"], $de["name"]);
            $desarrolladoras[$count] = $desarrolladora;
            $count++;
        }
        return $desarrolladoras;
    }

    static function get_desarrolladoras_by_id($id) {
        $con = SPDO::singleton();
        $query = "select * from desarrolladora where id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $des = $stmt->fetch(PDO::FETCH_ASSOC);
        $desarrolladora = new DesarrolladoraModel($des["id"], $des["name"]);
        return $desarrolladora;
    }

    static function insert_desarrolladora($name) {
        $con = SPDO::singleton();
        $query = "insert into desarrolladora (name) values (:name)";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
    }
    
    static function get_juegos_by_desarrolladora_id($id){
        $con = SPDO::singleton();
        $query = "select * from juegos where desarrolladora_id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $j = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $juegos = array();
        $count = 0;
        foreach ($j as $ju) {
            $juego = new JuegoModel($ju["id"], $ju["titulo"], $ju["subtitulo"], $ju["desarrolladora_id"]);
            $juego->setDesarrolladora();
            $juego->setPlataformas();
            $juegos[$count] = $juego;
            $count++;
        }
        return $juegos;
    }

}
