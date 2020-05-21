<?php
    require_once __DIR__."/../Model/DatabaseConnect.php";
    require_once  __DIR__."/../Class/QuocGia.php";

    function getAllQuocGia(){
        $sql = "Select id, ten from QUOCGIA";
        global $conn;
        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "QuocGia" );
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
?>
