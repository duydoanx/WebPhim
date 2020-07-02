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

    public function getPhimsFromQuocGia($idquocgia, $a, $b){
        return getPhimByIdQuocGia($idquocgia, $a, $b);
    }

    public function getLengthPhimsFromQuocGia($idquocgia){
        return getLengthQuocGia($idquocgia);
    }

    public function getPhimsFromTheLoai($idtheloai, $a, $b){
        return getPhimByIdTheLoai($idtheloai, $a, $b);
    }

    public function getLengthPhimsFromTheLoai($idtheloai){
        return getLengthTheLoai($idtheloai);
    }

    public function timkiemPhims($key, $a, $b){
        return timKiemPhims($key, $a, $b);
    }

    public function timkiemLengthPhims($key){
        return timKiemLengthPhims($key);
    }

    public function deletePhim($id){
       deletePhim($id);
    }
}