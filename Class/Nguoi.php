<?php


class Nguoi
{
    private $ID;
    private $HOTEN;
    private $NGAYSINH;
    private $QUOCTICH;
    private $TIEUSU;

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getHOTEN()
    {
        return $this->HOTEN;
    }

    /**
     * @param mixed $HOTEN
     */
    public function setHOTEN($HOTEN)
    {
        $this->HOTEN = $HOTEN;
    }

    /**
     * @return mixed
     */
    public function getNGAYSINH()
    {
        return $this->NGAYSINH;
    }

    /**
     * @param mixed $NGAYSINH
     */
    public function setNGAYSINH($NGAYSINH)
    {
        $this->NGAYSINH = $NGAYSINH;
    }

    /**
     * @return mixed
     */
    public function getQUOCTICH()
    {
        return $this->QUOCTICH;
    }

    /**
     * @param mixed $QUOCTICH
     */
    public function setQUOCTICH($QUOCTICH)
    {
        $this->QUOCTICH = $QUOCTICH;
    }

    /**
     * @return mixed
     */
    public function getTIEUSU()
    {
        return $this->TIEUSU;
    }

    /**
     * @param mixed $TIEUSU
     */
    public function setTIEUSU($TIEUSU)
    {
        $this->TIEUSU = $TIEUSU;
    }

}