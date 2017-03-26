<?php

require '../libs/SPDO.php';
require '../DAO/PlataformaDAO.php';
require '../models/PlataformaModel.php';

class sel_plat {

    static function conection() {
        $num = $_POST["num"];
        $ret = "";
        if($num>5){
            $num=5;
        }if($num<1){
            $num=1;
        }
        for ($i = 1; $i <= $num; $i++) {
            $ret.= '<div>Plataforma ' . $i . ' <select name="plat' . $i . '">';
            $plataformas = PlataformaDAO::get_plataformas();
            foreach ($plataformas as $plataforma) {
                $ret.='<option value="' . $plataforma->getId() . '">' . $plataforma->getName() . '</option>';
            }
            $ret.='</select></div>';
        }
        echo $ret;
    }

}

sel_plat::conection();
