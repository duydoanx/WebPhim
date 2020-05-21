<?php


class User
{
    private $USERNAME;
    private $ISADMIN;
    private $EMAIL;
    private $HOTEN;
    private $NGAYSINH;

    /**
     * @return mixed
     */
    public function getUSERNAME()
    {
        return $this->USERNAME;
    }

    /**
     * @param mixed $USERNAME
     */
    public function setUSERNAME($USERNAME)
    {
        $this->USERNAME = $USERNAME;
    }

    /**
     * @return mixed
     */
    public function getISADMIN()
    {
        return $this->ISADMIN;
    }

    /**
     * @param mixed $ISADMIN
     */
    public function setISADMIN($ISADMIN)
    {
        $this->ISADMIN = $ISADMIN;
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



}