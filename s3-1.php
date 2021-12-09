<?
if ($_POST["a"]>$_POST["b"]) {
 echo ("Наибольшее число это  " . $_POST["a"]);
} elseif ($_POST["a"] == $_POST["b"]) {
    echo "Числа равны";
} else {
    echo ("Наибольшее число это  " . $_POST["b"]);
}
?>
