<html>
<head>
    <title> Редактирование данных о Фильмах </title>
</head>
<body>
<?php
include ("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером
$id_f = $_GET['id_f'];

$result = $mysqli->query("SELECT name_f, janr, dir, `year`, sbor FROM film WHERE id_f='$id_f'");
if ($result) {
    while ($gm = $result->fetch_array()) {
        $name_f = $gm['name_f'];
        $janr = $gm['janr'];
        $dir = $gm['dir'];
        $year = $gm['year'];
        $sbor = $gm['sbor'];
    }
}

print "<form action='save_edit_film.php' method='get'>";
print "Название: <input name='name_f' size='50' type='text'
value='$name_f'>";
print "<br>Жанр: <input name='janr' size='30' type='text'
value='$janr'>";
print "<br>Режиссер: <input name='dir' size='30' type='text'
value='$dir'>";
print "<br>Год выпуска: <input name='year' size='30' type='text'
value='$year'>";
print "<br>Сборы: <input name='sbor' size='11' type='int'
value='$sbor'>";
print "<input type='hidden' name='id_f' size='11' type='int'
value='$id_f'>";
print "<input type='submit' name='save' value='Сохранить'>";
print "</form>";
if ($_SESSION['type'] == 1)
    echo "<p><a href=film.php> Вернуться назад </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=filmAdm.php> Вернуться назад </a>";
?>
</body>
</html>