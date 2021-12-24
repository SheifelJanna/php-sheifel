<html>
<body>
<?php
include ("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
} // установление соединения с сервером

$id_f = $_GET['id_f'];

$name_f = $_GET['name_f'];
$janr = $_GET['janr'];
$dir = $_GET['dir'];
$year = $_GET['year'];
$sbor = $_GET['sbor'];

$zapros = "UPDATE film SET name_f='$name_f', janr='$janr',
dir='$dir', `year`='$year', sbor='$sbor'
WHERE id_f='$id_f'";

$result = $mysqli->query($zapros);

if ($result) {
    if ($_SESSION['type'] == 1)
        echo "Все сохранено.<a href=film.php> Вернуться к списку Фильмов </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Все сохранено.<a href=filmAdm.php> Вернуться к списку Фильмов </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения.<a href=film.php> Вернуться к списку Фильмов </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения.<a href=filmAdm.php> Вернуться к списку Фильмов </a>";
}
?>
</body>
</html>