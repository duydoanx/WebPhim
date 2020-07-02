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

    function addChiTietQuocGia($idphim, $idquocgia){
        $sql = "INSERT INTO CHITIETQUOCGIA VALUE(:idphim, :idquocgia)";
        global $conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idphim', $idphim, PDO::PARAM_STR);
        $stmt->bindParam(':idquocgia', $idquocgia, PDO::PARAM_STR);
        $stmt->execute();
    }

    function getQuocGiaByIdPhim($idphim){
        $sql = "Select QUOCGIA.ID as id, ten from QUOCGIA, CHITIETQUOCGIA, PHIM where QUOCGIA.ID = CHITIETQUOCGIA.IDQUOCGIA 
                    AND PHIM.ID = CHITIETQUOCGIA.IDPHIM AND PHIM.ID = :idphim";
        global $conn;
        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "QuocGia" );
        $stmt->bindParam(':idphim', $idphim, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function deleteQuocGiaByIdPhim($idphim){
        $sql = "DELETE FROM CHITIETQUOCGIA WHERE IDPHIM = :idphim";
        global $conn;
        $stmt = $conn->prepare($sql);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt->bindParam(':idphim', $idphim, PDO::PARAM_INT);
        $stmt->execute();
    }


?>
