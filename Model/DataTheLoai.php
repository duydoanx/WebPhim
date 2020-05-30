<?php
require_once __DIR__."/DatabaseConnect.php";
require_once  __DIR__."/../Class/TheLoai.php";
function getAllTheLoai(){
    $sql = "Select id, tenTheLoai from THELOAI";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "TheLoai" );
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;

}

function addChiTietTheLoai($idphim, $idtheloai){
    $sql = "INSERT INTO CHITIETTHELOAI VALUE(:idphim, :idtheloai)";
    global $conn;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_STR);
    $stmt->bindParam(':idtheloai', $idtheloai, PDO::PARAM_STR);
    $stmt->execute();
}

function getTheLoaiByIdPhim($idphim){
    $sql = "Select THELOAI.ID as id, tenTheLoai from THELOAI, CHITIETTHELOAI, PHIM where THELOAI.ID = CHITIETTHELOAI.IDTHELOAI 
                    AND PHIM.ID = CHITIETTHELOAI.IDPHIM AND PHIM.ID = :idphim";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "TheLoai" );
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function deleteTheLoaiByIdPhim($idphim){
    $sql = "DELETE FROM CHITIETTHELOAI WHERE IDPHIM = :idphim";
    global $conn;
    $stmt = $conn->prepare($sql);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_INT);
    $stmt->execute();
}
?>
