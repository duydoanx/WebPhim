<?php
session_start();
if (isset($_SESSION['email'])){
    require_once __DIR__."/../Controller/ControllerDanhGia.php";
    if (isset($_REQUEST['danhgia'])){
        $controllerDanhGia = new ControllerDanhGia();
        $controllerDanhGia->setDanhGia($_SESSION['email'], $_REQUEST['idphim'], $_REQUEST['diem']);
    }
}

if (isset($_REQUEST['getdanhgia'])){
    $controllerDanhGia = new ControllerDanhGia();
    echo json_encode(array("danhgia" => $controllerDanhGia->getDanhGiaFromPhim($_REQUEST['idphim'])));
}