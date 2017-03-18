<?php

class View {

    public function __construct() {
        
    }

    public static function show($name, $vars = "") {
        $config = Config::singleton();
        $path = $config->get("ViewFolder") . $name;
        if (file_exists($path) == false) {
            trigger_error("Template " . $path . " does not exist", E_USER_NOTICE);
            return false;
        }
        if (is_array($vars)) {
            foreach ($vars as $key => $value) {
                ${$key} = $value;
            }
        }
        include($path);
    }

}
