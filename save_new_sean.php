<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
}

$date_s = $_GET['date_s'];
$id_f = $_GET['id_f'];
$id_z = $_GET['id_z'];
$count_s = $_GET['count_s'];
$count_zan = $_GET['count_zan'];

// Выполнение запроса
$result = $mysqli->query("INSERT INTO sean SET date_s='$date_s', id_f='$id_f', id_z='$id_z', count_s='$count_s', count_zan='$count_zan'");

if ($result) {
    print "<p>Внесение данных прошло успешно!";
    print "<p><a href='sean.php'> Вернуться к списку </a>";
} else {
    print "Ошибка сохранения <a href='sean.php'> Вернуться к списку </a>";
}

?>