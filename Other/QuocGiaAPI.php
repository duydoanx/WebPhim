<?php
require_once __DIR__ . "/../Controller/ControllerUser.php";
require_once __DIR__ . "/../Controller/ControllerQuocGia.php";

session_start();
if (!isset($_SESSION['email'])){
    header("Location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/login.php");
    exit();
}  else{
    $controllerUser = new ControllerUser();
    $user = $controllerUser->getUserFromEmail($_SESSION['email']);
    if (strcmp($user->getISADMIN(), "1") != 0) {
        header("Location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/login.php");
        exit();
    }
}
$controllerQuocGia = new ControllerQuocGia();
if (isset($_REQUEST['getQuocGia'])){

    $quocGias = $controllerQuocGia->getAllQuocGia();
    $result = array();
    foreach ($quocGias as $item){
        $result1 = array('id' => $item->getID(), 'ten' => $item->getTen());
        array_push($result, $result1);
    }
    $result = array('quocgia'=>$result);
    echo json_encode($result);
    exit();
}


