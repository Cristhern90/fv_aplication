<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PlataformaModel
 *
 * @author Cristian
 */
class PlataformaModel {
    
    private $id;
    private $name;
    private $company;
    
    function __construct($id, $name, $company) {
        $this->id = $id;
        $this->name = $name;
        $this->company = $company;
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getCompany() {
        return $this->company;
    }


    
}
