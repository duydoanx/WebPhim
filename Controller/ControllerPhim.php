<?php
require __DIR__."/../Model/DataPhim.php";

class ControllerPhim
{

    /**
     * @return array
     */
    public function getAllPhim()
    {
        $a = getLengthUser();
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
}