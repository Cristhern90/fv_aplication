<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JuegoDAO
 *
 * @author Cristian
 */
class JuegoDAO {

    //put your code here

    static function get_juegos() {
        $con = SPDO::singleton();
        $query = "select * from juegos";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $a = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $juegos = array();
        $count = 0;
        foreach ($a as $as) {
            $juego = new JuegoModel($as["id"], $as["titulo"], $as["subtitulo"], $as["fecha_lanzamiento"], $as["caratula"]);
            $juegos[$count] = $juego;
            $count++;
        }
        return $juegos;
    }

    static function get_juego_by_id($id) {
        $con = SPDO::singleton();
        $query = "select * from juegos where id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $as = $stmt->fetch(PDO::FETCH_ASSOC);
        $juego = new JuegoModel($as["id"], $as["titulo"], $as["subtitulo"], $as["fecha_lanzamiento"], $as["caratula"]);
        return $juego;
    }

    static function insert_juego($titulo, $subtitulo,$fecha_lanzamiento, $lista_desarrolladoras, $lista_productoras, $lista_plataformas, $caratula) {
        $con = SPDO::singleton();
        $query = "insert into juegos (titulo,subtitulo,fecha_lanzamiento, caratula) values (:titulo,:subtitulo,:fecha_lanzamiento, :caratula)";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);
        $stmt->bindParam(":subtitulo", $subtitulo, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_lanzamiento", $fecha_lanzamiento, PDO::PARAM_STR);
        $stmt->bindParam(":caratula", $caratula, PDO::PARAM_STR);
        $stmt->execute();
        $juego_id = self::get_juego_id($titulo, $subtitulo);
        foreach ($lista_plataformas as $plataforma) {
            $plataforma_id = $plataforma->getId();
            $query = "insert into plataforma_has_juegos (plataforma_id, juegos_id) values (:plataforma_id, :juego_id)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(":plataforma_id", $plataforma_id, PDO::PARAM_INT);
            $stmt->bindParam(":juego_id", $juego_id, PDO::PARAM_INT);
            $stmt->execute();
        }
        foreach ($lista_desarrolladoras as $desarrolladora) {
            $desarrolladora_id = $desarrolladora->getId();
            $query = "insert into desarrolla (empresa_id, juegos_id) values (:plataforma_id, :juego_id)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(":plataforma_id", $desarrolladora_id, PDO::PARAM_INT);
            $stmt->bindParam(":juego_id", $juego_id, PDO::PARAM_INT);
            $stmt->execute();
        }
        foreach ($lista_productoras as $productora) {
            $productora_id = $productora->getId();
            echo $productora_id;
            $query="INSERT INTO `produce`(`juegos_id`, `empresa_id`) VALUES (:juego_id,:plataforma_id)";
            $stmt = $con->prepare($query);
            $stmt->bindParam(":plataforma_id", $productora_id, PDO::PARAM_INT);
            $stmt->bindParam(":juego_id", $juego_id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    private static function get_juego_id($titulo, $subtitulo) {
        $con = SPDO::singleton();
        $query = "select * from juegos where titulo=:titulo and subtitulo=:subtitulo";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);
        $stmt->bindParam(":subtitulo", $subtitulo, PDO::PARAM_STR);
        $stmt->execute();
        $as = $stmt->fetch(PDO::FETCH_ASSOC);
        return $as["id"];
    }

    static function get_plat_juego_by_juego_id($id) {
        $con = SPDO::singleton();
        $query = "SELECT * FROM `plataforma_has_juegos` WHERE juegos_id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $p = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $plataforas = array();
        $count = 0;
        foreach ($p as $plat) {
            $plataforma = PlataformaDAO::get_plataforma_by_id($plat["plataforma_id"]);
            $plataforas[$count] = $plataforma;
            $count++;
        }
        return $plataforas;
    }

    static function get_prod_juego_by_juego_id($id){
        $con = SPDO::singleton();
        $query = "SELECT * FROM `produce` WHERE juegos_id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $p = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $productoras = array();
        $count = 0;
        foreach ($p as $pro) {
            $productora = EmpresaDAO::get_empresas_by_id($pro["empresa_id"]);
            $productoras[$count] = $productora;
            $count++;
        }
        return $productoras;
    }
    
    static function get_des_juego_by_juego_id($id){
        $con = SPDO::singleton();
        $query = "SELECT * FROM `desarrolla` WHERE juegos_id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $d = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $desarrolladoras = array();
        $count = 0;
        foreach ($d as $des) {
            $desarrolladora = EmpresaDAO::get_empresas_by_id($des["Empresa_id"]);
            $desarrolladoras[$count] = $desarrolladora;
            $count++;
        }
        return $desarrolladoras;
    }
    
}
