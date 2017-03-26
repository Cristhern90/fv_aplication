<?php

require '../libs/SPDO.php';
require '../DAO/EmpresaDAO.php';
require '../models/EmpresaModel.php';

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
            $ret.= '<div>Desarrolladora ' . $i . ' <select name="des' . $i . '">';
            $desarrolladoras = EmpresaDAO::get_empresas();
            foreach ($desarrolladoras as $desarrolladora) {
                $ret.='<option value="' . $desarrolladora->getId() . '">' . $desarrolladora->getName() . '</option>';
            }
            $ret.='</select></div>';
        }
        echo $ret;
    }

}

sel_plat::conection();
