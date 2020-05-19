<?php
require_once __DIR__."/DatabaseConnect.php";
require_once  __DIR__."/../Class/TheLoai.php";
function getAllTheLoai(){
    $sql = "Select id, tenTheLoai from TheLoai";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "TheLoai" );
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;

}

?>
