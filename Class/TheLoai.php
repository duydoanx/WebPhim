<?php
class TheLoai{
    public $id;
    public $tenTheLoai;

//    /**
//     * TheLoai constructor.
//     * @param $id
//     * @param $tenTheLoai
//     */
//    public function __construct($id, $tenTheLoai)
//    {
//        $this->id = $id;
//        $this->tenTheLoai = $tenTheLoai;
//    }

    public function getID(){
      return $this->id;
    }

    public function getTenTheLoai(){
      return $this->tenTheLoai;
    }

    public function setTenTheLoai($tenTheLoai){
      $this->tenTheLoai = $tenTheLoai;
    }

}
?>
