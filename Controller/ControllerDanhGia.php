<?php
require_once __DIR__."/../Model/DataDanhGia.php";

class ControllerDanhGia
{
    public function setDanhGia($email, $idphim, $danhgia){
        deleteDanhGiaByIdPhim($email, $idphim);
        addChiTietDanhGia($email, $idphim, $danhgia);
    }

    public function getDanhGiaFromPhim($idphim){
        $danhgias = getDanhGiaByIdPhim($idphim);
        $tb = 0;
        $i = 0;
        foreach ($danhgias as $danhgia) {
            $i++;
            $tb = $tb + $danhgia['DANHGIA'];
        }
        if ($tb == 0)
            return 0;
        return round($tb/$i, 1);
    }
}