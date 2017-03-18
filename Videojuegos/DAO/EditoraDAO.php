<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EditoraDAO
 *
 * @author Cristian
 */
class EditoraDAO {
    
    static function get_editoras(){
        $con = SPDO::singleton();
        $query="SELECT * FROM editora";
        $stmt=$con->prepare($query);
        $stmt->execute();
        $e=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $count=0;
        $editoras=array();
        foreach ($e as $ed) {
            $editora = new EditoraModel($ed["id"], $ed["name"], $ed["desarrolladora_id"]);
            $editoras[$count]=$editora;
            $count++;
        }
        return $editoras;
    }
    
}
