<html>
<head><title>Киносеансы</title></head>
<body>
<h2>Киносеансы:</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Дата</th>
        <th>Фильм</th>
        <th>Кинозал</th>
        <th>Всего мест</th>
        <th>Занятых мест</th>
        <th>Редактировать</th>
        <th>Уничтожить</th>
    </tr>
    </tr>
    <?php
    require_once 'connect1.php';
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Невозможно подключиться к серверу";
    }
    $result = $mysqli->query("SELECT sean.id, sean.date_s, film.name_f as film, zal.name_z as zal, sean.count_s, sean.count_zan
FROM sean 
LEFT JOIN film ON sean.id_f=film.id_f
LEFT JOIN zal ON sean.id_z=zal.id_z");

    $counter = 0;
    if ($result) {
        while ($row = $result->fetch_array()) {
            $id = $row['id'];
            $date_s = $row['date_s'];
            $film = $row['film'];
            $zal = $row['zal'];
            $count_s = $row['count_s'];
            $count_zan = $row['count_zan'];
            
            $date_s = date('d-m-Y H:i:s', strtotime($date_s));

            echo "<tr>";
            echo "<td>$id</td><td>$date_s</td><td>$film</td><td>$zal</td><td>$count_s</td><td>$count_zan</td>";

            echo "<td><a href='edit_sean.php?id=" . $row['id']
                . "'>Редактировать</a></td>"; //Запуск редактирования
            echo "<td><a href='delete_sean.php?id=" . $row['id']
                . "'>Удалить</a></td>"; //запуск удаления
            echo "</tr>";
            $counter++;
        }
    }
    print "</table>";
    print("<p>Всего Сеансов: $counter </p>");
    ?>
    <p><a href="new_sean.php"> Добавить Сеанс </a>
    <p><a href="index.php"> Вернуться назад </a>
</body>
</html>
