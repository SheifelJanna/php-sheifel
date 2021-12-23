<html>
<head>
    <title> Редактирование данных Кинозалы </title>
</head>
<body>
<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером
$id_z = $_GET['id_z'];

$result = $mysqli->query("SELECT name_z, cat_z FROM zal WHERE id_z='$id_z'");
if ($result) {
    while ($gm = $result->fetch_array()) {
        $name_z = $gm['name_z'];
        $cat_z = $gm['cat_z'];
    }
}

print "<form action='save_edit_zal.php' method='get'>";
print "Название зала: <input name='name_z' size='50' type='text'
value='$name_z'>";
print "<br>Категория: <input name='cat_z' size='50' type='text'
value='$cat_z'>";
print "<input type='hidden' name='id_z' size='11' type='int'
value='$id_z'>";
print "<input type='submit' name='save' value='Сохранить'>";
print "</form>";
print "<p><a href='zal.php'> Вернуться к списку Кинозалов </a>";
?>
</body>
</html>