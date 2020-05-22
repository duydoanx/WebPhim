<?php
require_once __DIR__."/DatabaseConnect.php";
require_once  __DIR__."/../Class/User.php";
function getUsers($a, $b){
    $sql = "Select USERNAME, ISADMIN, EMAIL, HOTEN, NGAYSINH from USER ORDER BY USERNAME LIMIT :a, :b";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':a', $a, PDO::PARAM_INT);
    $stmt->bindParam(':b', $b, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;

}

function getLengthUser(){
    $sql = "Select count(*) as length from USER";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result["length"];
}

function getPassword($email){
    $sql = "Select PASSWORD from USER where EMAIL = :email";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetch();
    if (isset($result["PASSWORD"])){
        return $result["PASSWORD"];
    }else{
        return false;
    }
}

function getUser($email = "", $username = ""){
    $sql = "Select USERNAME, ISADMIN, EMAIL, HOTEN, NGAYSINH from USER WHERE EMAIL = :email or USERNAME = :username";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}
?>
