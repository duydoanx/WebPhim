<?php
require __DIR__."/../Model/DataNguoi.php";

class ControllerNguoi
{
    public function getAllNguoi(){
        $a = getLengthNguoi();
        return getNguois(0, $a);
    }

    public function getAlDaoDien(){
        $a = getLengthDaoDien();
        $daoDien = getDaoDien(0, $a);
        return $daoDien;
    }

    public function addDaoDien($hoten, $ngaysinh, $quoctich,  $tieusu){
        $idDaoDien = addNguoi($hoten, $ngaysinh, $quoctich, $tieusu);
        addDaoDien($idDaoDien);
    }
}