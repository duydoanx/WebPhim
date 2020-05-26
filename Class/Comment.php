<?php


class Comment
{
    private $ID;
    private $EMAIL;
    private $IDPHIM;
    private $THOIGIAN;
    private $NOIDUNG;

    public function afterConstructor( $EMAIL, $IDPHIM, $THOIGIAN, $NOIDUNG)
    {
        $this->EMAIL = $EMAIL;
        $this->IDPHIM = $IDPHIM;
        $this->THOIGIAN = $THOIGIAN;
        $this->NOIDUNG = $NOIDUNG;
    }

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
    public function getEMAIL()
    {
        return $this->EMAIL;
    }

    /**
     * @param mixed $EMAIL
     */
    public function setEMAIL($EMAIL)
    {
        $this->EMAIL = $EMAIL;
    }

    /**
     * @return mixed
     */
    public function getNOIDUNG()
    {
        return $this->NOIDUNG;
    }

    /**
     * @param mixed $NOIDUNG
     */
    public function setNOIDUNG($NOIDUNG)
    {
        $this->NOIDUNG = $NOIDUNG;
    }

    /**
     * @return mixed
     */
    public function getIDPHIM()
    {
        return $this->IDPHIM;
    }

    /**
     * @param mixed $IDPHIM
     */
    public function setIDPHIM($IDPHIM)
    {
        $this->IDPHIM = $IDPHIM;
    }

    /**
     * @return mixed
     */
    public function getTHOIGIAN()
    {
        return $this->THOIGIAN;
    }

    /**
     * @param mixed $THOIGIAN
     */
    public function setTHOIGIAN($THOIGIAN)
    {
        $this->THOIGIAN = $THOIGIAN;
    }

}