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
            $ret.= '<div>Productora ' . $i . ' <select name="pro' . $i . '">';
            $empresas = EmpresaDAO::get_empresas();
            foreach ($empresas as $empresa) {
                $ret.='<option value="' . $empresa->getId() . '">' . $empresa->getName() . '</option>';
            }
            $ret.='</select></div>';
        }
        echo $ret;
    }

}

sel_plat::conection();
