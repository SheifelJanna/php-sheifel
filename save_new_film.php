<?php
include ("checks.php");
require_once 'connect1.php';
$link = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysql_connect_error());
    exit();
}

mysqli_query($link, "INSERT INTO film SET name_f='" . $_GET['name_f']
    . "', janr='" . $_GET['janr'] . "', dir='"
    . $_GET['dir'] . "', `year`='" . $_GET['year'] .
    "', sbor='" . $_GET['sbor'] . "'");
if (mysqli_affected_rows($link) > 0)
{
    print "<p>Спасибо, Фильм добавлен в базу данных.";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=film.php> Вернуться к списку Фильмов </a>";
    elseif ($_SESSION['type'] == 2)
        echo "<p><a href=filmAdm.php> Вернуться к списку Фильмов </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения . <p><a href=film.php> Вернуться к списку Фильмов </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения . <p><a href=filmAdm.php> Вернуться к списку Фильмов </a>";
    mysqli_close($link);
}
?>
