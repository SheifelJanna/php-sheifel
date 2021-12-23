<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database)
or die ("Невозможно подключиться к серверу");
$id_z = $_GET['id_z'];
$result = $mysqli->query("DELETE FROM zal WHERE id_z='$id_z'");
header("Location: zal.php");
exit;
?>
