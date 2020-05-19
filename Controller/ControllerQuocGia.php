<?php
require __DIR__."/../Model/DataQuocGia.php";

class ControllerQuocGia
{
    private $allQuocGia;

    /**
     * ControllerQuocGia constructor.
     * @param $allQuocGia
     */
    public function __construct()
    {
        $this->allQuocGia = getAllQuocGia();
    }

    /**
     * @return array
     */
    public function getAllQuocGia()
    {
        return $this->allQuocGia;
    }




}