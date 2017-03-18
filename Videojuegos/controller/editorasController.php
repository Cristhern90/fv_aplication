<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of editorasController
 *
 * @author Cristian
 */
class editorasController implements Controller{
    public static function delete($pet) {
        
    }

    public static function get($pet) {
        $editoras = EditoraDAO::get_editoras();
        $data["edits"]=$editoras;
        View::show("editora_list_view.php", $data);
    }

    public static function post($pet) {
        
    }

    public static function put($pet) {
        
    }

//put your code here
}
