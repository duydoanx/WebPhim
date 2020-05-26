<?php
require_once __DIR__."/../Model/DatabaseConnect.php";
require_once  __DIR__."/../Class/Phim.php";

function getPhims($a, $b){
    $sql = "Select ID, TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
            DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER from PHIM ORDER BY ID desc limit :a, :b";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':a', $a, PDO::PARAM_INT);
    $stmt->bindParam(':b', $b, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Phim" );
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getLengthPhim(){
    $sql = "Select count(*) as length from PHIM";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result["length"];
}

function getPhimDeCu(){
    $sql = "Select ID, TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER 
            from PHIM, PHIMDECU
            where PHIM.ID = PHIMDECU.IDPHIM";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Phim" );
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getPhim($id){
    $sql = "Select ID, TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
            DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER from PHIM 
                where ID = :id";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Phim" );
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}
?>
