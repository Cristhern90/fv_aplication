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
    private $fecha_lanzamiento;
    private $caratula;
    private $desarrolladoras;
    private $plataformas;
    private $productoras;

    function __construct($id, $titulo, $subtitulo, $fecha_lanzamiento, $caratula) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $this->fecha_lanzamiento = $fecha_lanzamiento;
        $this->caratula = $caratula;
        $this->plataformas = JuegoDAO::get_plat_juego_by_juego_id($this->id);
        $this->desarrolladoras = JuegoDAO::get_des_juego_by_juego_id($this->id);
        $this->productoras = JuegoDAO::get_prod_juego_by_juego_id($this->id);
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

    function getPlataformas() {
        $plataformas = $this->plataformas;
        $text = array();
        $count = 0;
        foreach ($plataformas as $plataforma) {
            $text[$count] = $plataforma->getName();
            $count++;
        }
        return implode(", ", $text);
    }

    function getCompleteName() {
        $name = $this->titulo;
        if ($this->subtitulo != "" || $this->subtitulo != null) {
            $name.=": " . $this->subtitulo;
        }
        return $name;
    }

    function getCaratula() {
        return $this->caratula;
    }

    function getFecha_lanzamiento() {
        return $this->fecha_lanzamiento;
    }

    function getDesarrolladoras() {
        $desarrolladoras = $this->desarrolladoras;
        $text = array();
        $count = 0;
        foreach ($desarrolladoras as $desarrolladora) {
            $text[$count] = $desarrolladora->getName();
            $count++;
        }
        return implode(",", $text);
    }

    function getProductoras() {
        $productoras = $this->productoras;
        $text = array();
        $count = 0;
        foreach ($productoras as $productora) {
            $text[$count] = $productora->getName();
            $count++;
        }
        return implode(",", $text);
    }

}
