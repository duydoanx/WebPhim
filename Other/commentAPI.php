<?php
require_once __DIR__."/../Controller/ControllerComment.php";
require_once __DIR__."/../Controller/ControllerUser.php";
$controllerComment = new ControllerComment();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date("Y-m-d H:i:s");
$controllerUser = new ControllerUser();
if (isset($_REQUEST['comment'])) {
    session_start();
    if (isset($_SESSION['email'])) {
        $comment = new Comment();
        $_REQUEST['noidung'] = str_replace('<', '&lt;', $_REQUEST['noidung']);
        $comment->afterConstructor($_SESSION['email'], $_REQUEST['id'], $date, $_REQUEST['noidung']);
        $controllerComment->addComment($comment);
        //echo $controllerUser->getUserFromEmail($_SESSION['email'])->getUSERNAME();
        exit();
    }else{
        echo "<script>alert('Vui Long Dang nhap')</script>";
    }
}

if (isset($_REQUEST['getcomment'])){
    $comments = $controllerComment->getCommentsPhim($_REQUEST['id'], 0, 100);
    $result = array();
    foreach ($comments as $item){
        $username = $controllerUser->getUserFromEmail($item->getEMAIL())->getUSERNAME();
        $result1 = array("username" => $username, "noidung" => $item->getNOIDUNG());
        array_push($result, $result1);
    }
    $result = array("data" =>$result);
    echo json_encode($result);
    exit();
}

?>
