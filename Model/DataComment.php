<?php
require_once __DIR__."/../Model/DatabaseConnect.php";
require_once  __DIR__."/../Class/Comment.php";

function getCommnets($a, $b){
    $sql = "Select ID, EMAIL, IDPHIM, THOIGIAN, NOIDUNG from COMMENT ORDER BY ID desc limit :a, :b";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':a', $a, PDO::PARAM_INT);
    $stmt->bindParam(':b', $b, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Comment" );
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function addCommnet($email, $idphim, $thoigian, $noidung){
    $sql = "INSERT INTO COMMENT(EMAIL, IDPHIM, THOIGIAN, NOIDUNG) VALUES (:email, :idphim, :thoigian, :noidung)";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_INT);
    $stmt->bindParam(':thoigian', $thoigian, PDO::PARAM_STR);
    $stmt->bindParam(':noidung', $noidung, PDO::PARAM_STR);
    $stmt->execute();
}

function getLengthComment(){
    $sql = "Select count(*) as length from COMMENT";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result["length"];
}

function getLengthCommentsPhim($idphim){
    $sql = "Select count(*) as length from COMMENT where IDPHIM = :idphim";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result["length"];
}


function getCommentsPhim($idphim, $a, $b){
    $sql = "Select ID, EMAIL, IDPHIM, THOIGIAN, NOIDUNG from COMMENT where IDPHIM = :idphim ORDER BY ID desc limit :a, :b";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idphim', $idphim, PDO::PARAM_INT);
    $stmt->bindParam(':a', $a, PDO::PARAM_INT);
    $stmt->bindParam(':b', $b, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Comment" );
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

?>