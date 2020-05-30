<?php


require __DIR__."/../Model/DataPhim.php";

class ControllerPhim
{

    /**
     * @return array
     */
    public function getAllPhim()
    {
        $a = getLengthPhim();
        return getPhims(0, $a);
    }

    public function getPhims($start, $quantity){
        return getPhims($start, $quantity);
    }

    public function getPhimDeCu(){
        return getPhimDeCu();
    }

    public function getPhim($id){
        return getPhim($id);
    }

    public function getLengthPhim(){
        return getLengthPhim();
    }

    public function addPhim($tenphimvn, $tenphimgoc, $trangthai, $namphathanh, $thoiluong, $chatluong,
                            $dophangiai, $ngonngu, $noidungphim, $duongdan, $trailer){
        return addPhim($tenphimvn, $tenphimgoc, $trangthai, $namphathanh, $thoiluong, $chatluong,
            $dophangiai, $ngonngu, $noidungphim, $duongdan, $trailer);
    }

    public function addAnhPhim($idphim, $anhphim){
        addAnhPhim($idphim, $anhphim);
    }

    public function updatePhim($idphim, $tenphimvn, $tenphimgoc, $trangthai, $namphathanh, $thoiluong, $chatluong,
                               $dophangiai, $ngonngu, $noidungphim, $duongdan, $trailer){
        updatePhim($idphim, $tenphimvn, $tenphimgoc, $trangthai, $namphathanh, $thoiluong, $chatluong,
            $dophangiai, $ngonngu, $noidungphim, $duongdan, $trailer);
    }


}