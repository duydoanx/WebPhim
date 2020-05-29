<?php
require_once __DIR__."/../Model/DatabaseConnect.php";
require_once  __DIR__."/../Class/Nguoi.php";

function getNguois($a, $b){
    $sql = "Select ID, HOTEN, NGAYSINH, QUOCTICH, TIEUSU from NGUOI ORDER BY ID desc limit :a, :b";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':a', $a, PDO::PARAM_INT);
    $stmt->bindParam(':b', $b, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "NGUOI" );
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getNguoiByID($id){
    $sql = "Select ID, HOTEN, NGAYSINH, QUOCTICH, TIEUSU from NGUOI where  ID = :id";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "NGUOI" );
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}

function addNguoi($hoten, $ngaysinh, $quoctich, $tieusu){

    $sql = "INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE(:hoten, :ngaysinh, :quoctich, :tieusu)";
    global $conn;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':hoten', $hoten, PDO::PARAM_STR);
    $stmt->bindParam(':ngaysinh', $ngaysinh, PDO::PARAM_STR);
    $stmt->bindParam(':quoctich', $quoctich, PDO::PARAM_STR);
    $stmt->bindParam(':tieusu', $tieusu, PDO::PARAM_STR);
    $stmt->execute();
    $last_id = $conn->lastInsertId();
    return $last_id;
}

function addDaoDien($id){
    $sql = "INSERT INTO DAODIEN VALUE(:id)";
    global $conn;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
}

function addDienVien($id){
    $sql = "INSERT INTO DIENVIEN VALUE(:id)";
    global $conn;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
}

function getLengthNguoi(){
    $sql = "Select count(*) as length from NGUOI";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result["length"];
}

function getLengthDaoDien(){
    $sql = "Select count(*) as length from DAODIEN";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result["length"];
}
function getLengthDienVien(){
    $sql = "Select count(*) as length from DIENVIEN";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result["length"];
}

function getDaoDien($a, $b){
    $sql = "Select ID, HOTEN, NGAYSINH, QUOCTICH, TIEUSU from DAODIEN, NGUOI WHERE NGUOI.ID = DAODIEN.IDDAODIEN ORDER BY IDDAODIEN desc limit :a, :b";;
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "NGUOI" );
    $stmt->bindParam(':a', $a, PDO::PARAM_INT);
    $stmt->bindParam(':b', $b, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getDienVien($a, $b){
    $sql = "Select ID, HOTEN, NGAYSINH, QUOCTICH, TIEUSU from DIENVIEN, NGUOI WHERE NGUOI.ID = DIENVIEN.IDDIENVIEN ORDER BY IDDIENVIEN desc limit :a, :b";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "NGUOI" );
    $stmt->bindParam(':a', $a, PDO::PARAM_INT);
    $stmt->bindParam(':b', $b, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function addChiTietDaoDien($iddaodien, $idphim){
    $sql = "INSERT INTO CHITIETDAODIEN VALUE(:iddaodien, :idphim)";
    global $conn;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':iddaodien', $iddaodien, PDO::PARAM_STR);
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_STR);
    $stmt->execute();
}

function addChiTietDienVien($iddienvien, $idphim){
    $sql = "INSERT INTO CHITIETDAODIEN VALUE(:iddienvien, :idphim)";
    global $conn;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':iddienvien', $iddienvien, PDO::PARAM_STR);
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_STR);
    $stmt->execute();
}

function getDaoDienbyIdPhim($idphim){
    $sql = "Select ID, HOTEN, NGAYSINH, QUOCTICH, TIEUSU from DAODIEN, NGUOI, CHITIETDAODIEN, PHIM 
            WHERE NGUOI.ID = DAODIEN.IDDAODIEN and CHITIETDAODIEN.IDDAODIEN = DAODIEN.IDDAODIEN and PHIM.ID = CHITIETDAODIEN.IDPHIM
                and PHIM.ID = :idphim";;
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "NGUOI" );
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getDienVienbyIdPhim($idphim){
    $sql = "Select ID, HOTEN, NGAYSINH, QUOCTICH, TIEUSU from DIENVIEN, NGUOI, CHITIETDIENVIEN, PHIM 
            WHERE NGUOI.ID = DIENVIEN.IDDIENVIEN and CHITIETDIENVIEN.IDDIENVIEN = DIENVIEN.IDDIENVIEN and PHIM.ID = CHITIETDIENVIEN.IDPHIM
                and PHIM.ID = :idphim";;
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "NGUOI" );
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}
