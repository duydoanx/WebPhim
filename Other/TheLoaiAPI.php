<?php
require_once __DIR__ . "/../Controller/ControllerUser.php";
require_once __DIR__ . "/../Controller/ControllerTheLoai.php";

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
$controllerTheLoai = new ControllerTheLoai();
if (isset($_REQUEST['getTheLoai'])){

    $theLoais = $controllerTheLoai->getAllTheLoai();
    $result = array();
    foreach ($theLoais as $item){
        $result1 = array('id' => $item->getID(), 'tentheloai' => $item->getTenTheLoai());
        array_push($result, $result1);
    }
    $result = array('theloai'=>$result);
    echo json_encode($result);
    exit();
}

