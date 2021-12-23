<html>
<head><title> Добавление Сеанса </title></head>
<body>
<H2>Добавление Сеанса:</H2>
<form action="save_new_sean.php" method="get">
    <?php
    require_once 'connect1.php';
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Невозможно подключиться к серверу";
    }

    $result = $mysqli->query("SELECT id_f, name_f FROM film");
    echo "<br>Фильм: <select name='id_f'>";

    if ($result) {
        while ($row = $result->fetch_array()) {
            $id_f = $row['id_f'];
            $name_f = $row['name_f'];
            echo "<option value='$id_f'>$name_f</option>";
        }
    }
    echo "</select>";

    $result = $mysqli->query("SELECT id_z, name_z FROM zal");
    echo "<br>Зал: <select name='id_z'>";

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
    ?>


    <p><input name="add" type="submit" value="Добавить">
        <input name="b2" type="reset" value="Очистить"></p>
    <p><a href="sean.php"> Вернуться к списку Сеансов </a>
</form>
</body>
</html>
