<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JuegoModel
 *
 * @author Cristian
 */
class JuegoModel {
    
    private $id;
    private $titulo;
    private $subtitulo;
    private $desarrolladora_id;
    private $desarrolladora;
    private $plataformas;
    
    function __construct($id, $titulo, $subtitulo, $desarrolladora_id) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $this->desarrolladora_id = $desarrolladora_id;
        $this->plataformas=array();
    }

    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getSubtitulo() {
        return $this->subtitulo;
    }

    function getDesarrolladora_id() {
        return $this->desarrolladora_id;
    }
    function setDesarrolladora() {
        $this->desarrolladora = DesarrolladoraDAO::get_desarrolladoras_by_id($this->desarrolladora_id);
    }

    function setPlataformas() {
        $this->plataformas = JuegoDAO::get_plat_juego_by_juego_id($this->id);
    }

    function getDesarrolladora() {
        return $this->desarrolladora;
    }

    function getPlataformas() {
        return $this->plataformas;
    }

    function getCompleteName(){
        $name=  $this->titulo;
        if($this->subtitulo!=""){
            $name.=": ".$this->subtitulo;
        }
        return $name;
    }

}
