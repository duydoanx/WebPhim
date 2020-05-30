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

function addPhim($tenphimvn, $tenphimgoc, $trangthai, $namphathanh, $thoiluong, $chatluong,
                 $dophangiai, $ngonngu, $noidungphim, $duongdan, $trailer){
    $sql = "INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG, 
                 DOPHANGIAI, NGONNGU, NOIDUNGPHIM, DUONGDAN, TRAILER) VALUE 
    (:tenphimvn, :tenphimgoc, :trangthai, :namphathanh, :thoiluong, :chatluong, 
     :dophangiai, :ngonngu, :noidungphim, :duongdan, :trailer)";
    global $conn;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tenphimvn', $tenphimvn, PDO::PARAM_STR);
    $stmt->bindParam(':tenphimgoc', $tenphimgoc, PDO::PARAM_STR);
    $stmt->bindParam(':trangthai', $trangthai, PDO::PARAM_STR);
    $stmt->bindParam(':namphathanh', $namphathanh, PDO::PARAM_STR);
    $stmt->bindParam(':thoiluong', $thoiluong, PDO::PARAM_INT);
    $stmt->bindParam(':chatluong', $chatluong, PDO::PARAM_STR);
    $stmt->bindParam(':dophangiai', $dophangiai, PDO::PARAM_STR);
    $stmt->bindParam(':ngonngu', $ngonngu, PDO::PARAM_STR);
    $stmt->bindParam(':noidungphim', $noidungphim, PDO::PARAM_STR);
    $stmt->bindParam(':duongdan', $duongdan, PDO::PARAM_STR);
    $stmt->bindParam(':trailer', $trailer, PDO::PARAM_STR);
    $stmt->execute();
    $last_id = $conn->lastInsertId();
    return $last_id;
}

function addAnhPhim($idphim, $anhphim){
    $sql = "update PHIM set ANHPHIM = :anhphim where PHIM.ID = :idphim";
    global $conn;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':anhphim', $anhphim, PDO::PARAM_STR);
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_INT);
    $stmt->execute();

}

function updatePhim($idphim, $tenphimvn, $tenphimgoc, $trangthai, $namphathanh, $thoiluong, $chatluong,
                    $dophangiai, $ngonngu, $noidungphim, $duongdan, $trailer){
    $sql = "UPDATE PHIM SET TENPHIMVN = :tenphimvn, TENPHIMGOC = :tenphimgoc, TRANGTHAI = :trangthai, 
                    NAMPHATHANH = :namphathanh, THOILUONG = :thoiluong, CHATLUONG = :chatluong, DOPHANGIAI = :dophangiai, 
                    NGONNGU = :ngonngu, NOIDUNGPHIM = :noidungphim, DUONGDAN = :duongdan, TRAILER = :trailer 
                    WHERE ID = :idphim";
    global $conn;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tenphimvn', $tenphimvn, PDO::PARAM_STR);
    $stmt->bindParam(':tenphimgoc', $tenphimgoc, PDO::PARAM_STR);
    $stmt->bindParam(':trangthai', $trangthai, PDO::PARAM_STR);
    $stmt->bindParam(':namphathanh', $namphathanh, PDO::PARAM_STR);
    $stmt->bindParam(':thoiluong', $thoiluong, PDO::PARAM_INT);
    $stmt->bindParam(':chatluong', $chatluong, PDO::PARAM_STR);
    $stmt->bindParam(':dophangiai', $dophangiai, PDO::PARAM_STR);
    $stmt->bindParam(':ngonngu', $ngonngu, PDO::PARAM_STR);
    $stmt->bindParam(':noidungphim', $noidungphim, PDO::PARAM_STR);
    $stmt->bindParam(':duongdan', $duongdan, PDO::PARAM_STR);
    $stmt->bindParam(':trailer', $trailer, PDO::PARAM_STR);
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_INT);
    $stmt->execute();
}
?>
