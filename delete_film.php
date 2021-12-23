<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу");
$id_f = $_GET['id_f'];
$result = $mysqli->query("DELETE FROM film WHERE id_f ='$id_f'");
header("Location: index.php");
exit;
?>
