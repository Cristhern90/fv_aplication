<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EditoraModel
 *
 * @author Cristian
 */
class EditoraModel {
    
    private $id;
    private $name;
    private $desarrolladora_id;
    
    function __construct($id, $name, $desarrolladora_id) {
        $this->id = $id;
        $this->name = $name;
        $this->desarrolladora_id = $desarrolladora_id;
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDesarrolladora_id() {
        return $this->desarrolladora_id;
    }

}
