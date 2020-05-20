<?php
session_start();
if (!isset($_SESSION['Username'])){
    header("Location: ".(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://").$_SERVER['HTTP_HOST']."/login.php");
    exit();
}
?>
<html>
<head>

</head>
<body>
    <H1>Hi I'm Admin index.php</H1>

</body>
</html>