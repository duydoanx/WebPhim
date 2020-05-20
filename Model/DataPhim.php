<?php
require_once __DIR__."/../Model/DatabaseConnect.php";
require_once  __DIR__."/../Class/Phim.php";

    function getAllPhim(){
        $sql = "Select TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER from PHIM";
        global $conn;
        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Phim" );
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
?>
