<?php
require __DIR__."/../Model/DataNguoi.php";

class ControllerNguoi
{
    public function getAllNguoi(){
        $a = getLengthNguoi();
        return getNguois(0, $a);
    }

    public function getAllDaoDien(){
        $a = getLengthDaoDien();
        $daoDien = getDaoDien(0, $a);
        return $daoDien;
    }

    public function addDaoDien($hoten, $ngaysinh, $quoctich,  $tieusu){
        $idDaoDien = addNguoi($hoten, $ngaysinh, $quoctich, $tieusu);
        addDaoDien($idDaoDien);
    }

    public function getAllDienVien(){
        $a = getLengthDienVien();
        $dienVien = getDienVien(0, $a);
        return $dienVien;
    }

    public function addDienVien($hoten, $ngaysinh, $quoctich,  $tieusu){
        $idDienVien = addNguoi($hoten, $ngaysinh, $quoctich, $tieusu);
        addDienVien($idDienVien);
    }

    public function addDaoDien2Phim($iddaodien, $idphim){
        addChiTietDaoDien($iddaodien, $idphim);
    }

    public function addDienVien2Phim($iddienvien, $idphim){
        addChiTietDienVien($iddienvien, $idphim);
    }

    public function getDaoDiensFormPhim($idphim){
        return getDaoDienbyIdPhim($idphim);
    }

    public function getDienViensFromPhim($idphim){
        return getDienVienbyIdPhim($idphim);
    }

    public function deleteDaoDienFromPhim($idphim){
        deleteDaoDienByIdPhim($idphim);
    }

    public function deleteDienVienFromPhim($idphim){
        deleteDienVienByIdPhim($idphim);
    }
    public function getNguoiByID($id){
        return getNguoiByID($id);
    }
}