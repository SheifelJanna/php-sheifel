<?
if (is_numeric($_POST["a"]) and is_numeric($_POST["a1"])) {

    } else {
       echo "Введите числа";
       exit();
    }
switch ($_POST["z"]) {
 // чему равна переменная $z
 case 1:
 // 1 —  сложение
 $s1= $_POST["a"]+$_POST["a1"];
 break;
 case 2:
 // 2 —  вычесть
 $s1= $_POST["a"]-$_POST["a1"];
 break;
 case 3:
 // 3 —  умножить
 $s1= $_POST["a"]*$_POST["a1"];
 break;
 case 4:
 // 3 —  разделить
 $s1= $_POST["a"]/$_POST["a1"];
 break;
}
 echo "Результат        ";
echo $s1;
?>

