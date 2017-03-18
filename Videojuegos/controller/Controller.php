<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Cristian
 */
interface Controller {
    //put your code here
    static function get($pet);
    static function post($pet);
    static function put($pet);
    static function delete($pet);
}
