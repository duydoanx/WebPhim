<?php


class QuocGia
{
    private $id;
    private $ten;

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->id = $ID;
    }


    /**
     * @return mixed
     */
    public function getTen()
    {
        return $this->ten;
    }

    /**
     * @param mixed $ten
     */
    public function setTen($ten)
    {
        $this->ten = $ten;
    }


}
?>