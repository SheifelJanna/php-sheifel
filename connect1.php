<?php
$host = 'localhost';
$database = 'a0612412_kino';
$user = 'a0612412_root';
$password = 'root';
//require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database)
or die("ошибка" . mysqli_error($link));
?>
