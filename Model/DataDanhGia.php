<?php
require_once __DIR__."/../Model/DatabaseConnect.php";

function addChiTietDanhGia($email, $idphim, $danhgia){
    $sql = "INSERT INTO CHITIETDANHGIA(EMAILUSER, IDPHIM, DANHGIA) VALUES (:email, :idphim, :danhgia)";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_INT);
    $stmt->bindParam(':danhgia', $danhgia, PDO::PARAM_STR);
    $stmt->execute();
}

function getDanhGiaByIdPhim($idphim){
    $sql = "Select DANHGIA from CHITIETDANHGIA where IDPHIM = :idphim";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchALL();
    return $result;
}

function deleteDanhGiaByIdPhim($email, $idphim){
    $sql = "DELETE From CHITIETDANHGIA where IDPHIM = :idphim and EMAILUSER = :email";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_INT);
    $stmt->execute();
}