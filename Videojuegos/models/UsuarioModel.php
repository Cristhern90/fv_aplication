<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioModel
 *
 * @author Cristian
 */
class UsuarioModel {
    
    private $id;
    private $nick;
    private $name;
    private $surnames;
    private $cargo;
    private $password;
    
    function __construct($id, $nick, $name, $surnames, $cargo, $password) {
        $this->id = $id;
        $this->nick = $nick;
        $this->name = $name;
        $this->surnames = $surnames;
        $this->cargo = $cargo;
        $this->password = $password;
    }

    function getId() {
        return $this->id;
    }

    function getNick() {
        return $this->nick;
    }

    function getName() {
        return $this->name;
    }

    function getSurnames() {
        return $this->surnames;
    }

    function getCargo() {
        $f=strtoupper(substr($this->cargo, 0, 1));
        $e=  substr($this->cargo, 1);
        $cargo=$f.$e;
        return $cargo;
    }

    function getPassword() {
        return $this->password;
    }


}
