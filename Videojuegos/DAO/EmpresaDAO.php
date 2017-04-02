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
        $query = "select DISTINCT * from empresa ";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $des = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $empresas = array();
        $count = 0;
        foreach ($des as $de) {
            $empresa = new EmpresaModel($de["id"], $de["name"]);
            if (!self::is_desarrolladora($empresa->getId())) {
                if (!self::is_productora($empresa->getId())) {
                    $empresas[$count] = $empresa;
                    $count++;
                }
            }
        }
        return $empresas;
    }

//return list of business

    static function get_desarrolladoras() {
        $con = SPDO::singleton();
        $query = "select DISTINCT em.* from empresa as em, desarrolla as de where em.id=de.empresa_id";
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
    }

    static function get_editoras() {
        $con = SPDO::singleton();
        $query = "select DISTINCT em.* from empresa as em, produce as pr where em.id=pr.empresa_id";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $des = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $editoras = array();
        $count = 0;
        foreach ($des as $de) {
            $editora = new EmpresaModel($de["id"], $de["name"]);
            $editoras[$count] = $editora;
            $count++;
        }
        return $editoras;
    }

    static function get_empresas_by_id($id) {
        $con = SPDO::singleton();
        $query = "select * from empresa where id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $des = $stmt->fetch(PDO::FETCH_ASSOC);
        $desarrolladora = new EmpresaModel($des["id"], $des["name"]);
        return $desarrolladora;
    }

//return one business

    static function insert_empresa($name) {
        $con = SPDO::singleton();
        $query = "insert into empresa (name) values (:name)";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
    }

//insert a new business in the data base

    static function get_juegos_of_desarrolladora($id) {
        $con = SPDO::singleton();
        $query = "select ju.* from juegos as ju, desarrolla as de "
                . "where de.empresa_id=:id  and ju.id=de.juegos_id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $ju = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $juegos = array();
        $count = 0;
        foreach ($ju as $jue) {
            $juego = new JuegoModel($jue["id"], $jue["titulo"], $jue["subtitulo"], $jue["fecha_lanzamiento"], $jue["caratula"]);
            $juegos[$count] = $juego;
            $count++;
        }
        return $juegos;
    }

    static function get_juegos_of_productora($id) {
        $con = SPDO::singleton();
        $query = "select ju.* from juegos as ju, empresa as em, produce as pro "
                . "where em.id=pro.empresa_id and ju.id=pro.juegos_id and em.id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $ju = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $juegos = array();
        $count = 0;
        foreach ($ju as $jue) {
            $juego = new JuegoModel($jue["id"], $jue["titulo"], $jue["subtitulo"], $jue["fecha_lanzamiento"], $jue["caratula"]);
            $juegos[$count] = $juego;
            $count++;
        }
        return $juegos;
    }

    static function is_desarrolladora($id) {
        $con = SPDO::singleton();
        $query = "SELECT count(Empresa_id) FROM desarrolla WHERE desarrolla.Empresa_id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $em = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($em["count(Empresa_id)"] > 0) {
            return true;
        } else {
            return false;
        }
    }

    static function is_productora($id) {
        $con = SPDO::singleton();
        $query = "SELECT count(Empresa_id) FROM produce WHERE produce.Empresa_id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $em = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($em["count(Empresa_id)"] > 0) {
            return true;
        } else {
            return false;
        }
    }

}
