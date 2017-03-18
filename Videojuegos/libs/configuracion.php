<?php
$config=  Config::singleton();

$config->set("ControllerFolder" , "controller/");
$config->set("ModelFolder" ,"model/");
$config->set("ViewFolder","view/");

$config->set("dbhost","localhost");
$config->set("dbname","db_hotel_p");
$config->set("dbuser","root");
$config->set("dbpass","");