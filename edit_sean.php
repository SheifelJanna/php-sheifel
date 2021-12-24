<html>
<head>
    <title> Редактирование данных Сеансов </title>
</head>
<body>
<?php
include ("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером

$id = $_GET['id'];
$prod = mysqli_query($mysqli, "SELECT
			sean.id,
			sean.date_s,
            sean.count_s,
            sean.count_zan
       
			film.id_f as id_f,
			film.name_f as name_f,

			zal.id_z as id_z,
			zal.name_z as name_z

			FROM sean
			LEFT JOIN film ON sean.id_f=film.id_f
			LEFT JOIN zal ON sean.id_z=zal.id_z
			WHERE sean.id='$id'"
);

if ($prod) {
    $prod = $prod->fetch_array();

    $id = $prod['id'];
    $date_s = $prod['date_s'];
    $count_s = $prod['count_s'];
    $count_zan = $prod['count_zan'];

    $id_f = $prod['id_f'];
    $name_f = $prod['name_f'];

    $id_z = $prod['id_z'];
    $name_z = $prod['name_z'];

}

print "<form action='save_edit_sean.php' method='get'>";

$result = $mysqli->query("SELECT id_f, name_f FROM film WHERE id_f <> '$id_f' ");
echo "<br>Фильм:<select name='id_f'>";
echo "<option selected value='$id_f'>$name_f</option>";
if ($result) {
    while ($row = $result->fetch_array()) {
        $id_f = $row['id_f'];
        $name_f = $row['name_f'];
        echo "<option value='$id_f'>$name_f</option>";
    }
}
echo "</select>";

$result = $mysqli->query("SELECT id_z, name_z FROM zal WHERE id_z <> '$id_z' ");
echo "<br>Зал: <select name='id_z'>";
echo "<option selected value='$id_z'>$name_z</option>";

if ($result) {
    while ($row = $result->fetch_array()) {
        $id_z = $row['id_z'];
        $name_z = $row['name_z'];
        echo "<option value='$id_z'>$name_z</option>";
    }
}
echo "</select>";

print "<br>Дата: <input name='date_s' placeholder='dd-mm-yyyy' type='datetime-local' value=$date_s>";
print "<br> Кол-во мест: <input name='count_s' size='11' type='int' value=$count_s>";
print "<br> Занятых мест: <input name='count_zan' size='11' type='int' value=$count_zan>";
print "<input type='hidden' name='id' size='11' value=$id>";
print "<input  name='save' type='submit' value='Сохранить'>";
print "</form>";
if ($_SESSION['type'] == 1)
    echo "<p><a href=sean.php> Вернуться назад </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=seanAdm.php> Вернуться назад </a>";
?>
</body>
</html>