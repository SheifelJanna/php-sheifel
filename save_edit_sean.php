<html>
<body>
<?php
include ("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
} // установление соединения с сервером

$id = $_GET['id'];
$date_s = $_GET['date_s'];
$id_f = $_GET['id_f'];
$id_z = $_GET['id_z'];
$count_s = $_GET['count_s'];
$count_zan = $_GET['count_zan'];

$result = $mysqli->query("UPDATE sean SET date_s='$date_s', id_f='$id_f', id_z='$id_z', count_s='$count_s', count_zan='$count_zan'  WHERE id='$id'");

if ($result) {
    if ($_SESSION['type'] == 1)
        echo "Все сохранено.<p><a href=sean.php> Вернуться к списку Сеансов </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Все сохранено.<p><a href=seanAdm.php> Вернуться к списку Сеансов </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения. <p></p><a href=sean.php> Вернуться к списку Сеансов </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения. <p><a href=seanAdm.php> Вернуться к списку Сеансов </a>";
}
?>
</body>
</html>