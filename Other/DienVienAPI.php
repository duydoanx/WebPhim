<?php
require_once __DIR__ . "/../Controller/ControllerUser.php";
require_once __DIR__ . "/../Controller/ControllerNguoi.php";

//session_start();
//if (!isset($_SESSION['email'])){
//    header("Location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/login.php");
//    exit();
//}  else{
//    $controllerUser = new ControllerUser();
//    $user = $controllerUser->getUserFromEmail($_SESSION['email']);
//    if (strcmp($user->getISADMIN(), "1") != 0) {
//        header("Location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/login.php");
//        exit();
//    }
//}
$controllerNguoi = new ControllerNguoi();
if (isset($_REQUEST['getDienVien'])){

    $dienViens = $controllerNguoi->getAllDienVien();
    $result = array();
    foreach ($dienViens as $item){
        $result1 = array('id' => $item->getID(), 'text' => $item->getHOTEN());
        array_push($result, $result1);
    }
    $result = array('dienvien'=>$result);
    echo json_encode($result);
    exit();
}

if (isset($_REQUEST['adddienvien'])){
    $controllerNguoi->addDienVien($_REQUEST['hoten'], $_REQUEST['ngaysinh'], $_REQUEST['quoctich'], $_REQUEST['tieusu']);
}
if (isset($_REQUEST['getSelectedDienVien']) && isset($_REQUEST['idphim'])){
    $dienViens = $controllerNguoi->getDienViensFromPhim($_REQUEST['idphim']);
    $result = array();
    foreach ($dienViens as $dienVien) {
        $result1 = array('id' => $dienVien->getID(), 'text' => $dienVien->getHOTEN());
        array_push($result, $result1);
    }
    $result = array('dienvien'=>$result);
    echo json_encode($result);
}

