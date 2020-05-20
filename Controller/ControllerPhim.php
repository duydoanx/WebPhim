<?php
require __DIR__."/../Model/DataPhim.php";

class ControllerPhim
{
    private $allPhim;

    /**
     * ControllerPhim constructor.
     * @param $allPhim
     */
    public function __construct()
    {
        $this->allPhim = getAllPhim();
    }

    /**
     * @return array
     */
    public function getAllPhim()
    {
        return $this->allPhim;
    }


}