<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn;
try {
    $conn = new PDO("mysql:host=$servername;dbname=WEBPHIM;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo "connect to database failed ";
}