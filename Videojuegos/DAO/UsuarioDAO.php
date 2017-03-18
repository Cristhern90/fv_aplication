<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author Cristian
 */
class UsuarioDAO {

    static function get_usuario_by_id($id) {
        $con = SPDO::singleton();
        $query = "select * from usuario where id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $u = $stmt->fetch(PDO::FETCH_ASSOC);
        $usuario = new UsuarioModel($u["id"], $u["nick"], $u["name"], $u["surnames"], $u["cargo"], $u["password"]);
        return $usuario;
    }

    static function get_usuarios() {
        $con = SPDO::singleton();
        $query = "select * from usuario";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $u = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usuarios = array();
        $count = 0;
        foreach ($u as $us) {
            $usuario = new UsuarioModel($us["id"], $us["nick"], $us["name"], $us["surnames"], $us["cargo"], $us["password"]);
            $usuarios[$count] = $usuario;
            $count++;
        }
        return $usuarios;
    }

    static function juegos_by_usuario_id($id) {
        $con = SPDO::singleton();
        $query = "select * from jugados where usuario_id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $ju = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $juegos = array();
        $count = 0;
        foreach ($ju as $jue) {
            $juego = JuegoDAO::get_juego_by_id($jue["juegos_id"]);
            $juego_ter["juego"] = $juego;
            $juego_ter["ter"] = $jue["terminado"];
            $juegos[$count] = $juego_ter;
            $count++;
        }
        return $juegos;
    }

    static function login($nick, $pass) {
        $con = SPDO::singleton();
        $query = "select * from usuario where nick=:nick";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":nick", $nick, PDO::PARAM_STR);
        $stmt->execute();
        $l = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($l["id"] != null) {
            if ($pass == $l["password"]) {
                
                $usuario=  UsuarioDAO::get_usuario_by_id($l["id"]);
                return $usuario;
            } else {
                return "error";
            }
        } else {
            return "error";
        }
    }
    
    

    static function jugar_juego($usuario_id, $juego_id) {
        $con = SPDO::singleton();
        $query = "insert into jugados (juegos_id,usuario_id,terminado) values (:juegos_id,:usuario_id,0)";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":juegos_id",$juego_id,PDO::PARAM_INT);
        $stmt->bindParam(":usuario_id",$usuario_id,PDO::PARAM_INT);
        $stmt->execute();
    }
    
    static function terminar_juego($juego_id, $usuario_id,$ter){
        $con = SPDO::singleton();
        $query = "UPDATE `jugados` SET terminado=:ter WHERE juegos_id=:juegos_id and usuario_id=:usuario_id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":juegos_id",$juego_id,PDO::PARAM_INT);
        $stmt->bindParam(":usuario_id",$usuario_id,PDO::PARAM_INT);
        $stmt->bindParam(":ter",$ter,PDO::PARAM_INT);
        $stmt->execute();
    }

}
