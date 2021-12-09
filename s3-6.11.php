<?php
foreach ($_POST as $key => $string) {
}
if ((empty($_POST["at"])) or (empty($_POST["bt"])) or (empty($_POST["text"]))) {
         echo "Ошибка!Чтобы получить результат необходимо заполнить все поля ";
         echo ("<BR> <A href='s3-6.11.html'> Вернуться  </A>");
    } else {
echo "Исходный текст: " . $_POST["text"] . "<BR>". "<BR>";
$text = str_replace($_POST["at"], $_POST["bt"], $_POST["text"]);
echo "Текст после замены : " . $text . "<BR>" . "<BR>";
echo "Символ '" . $_POST["at"] . "' был заменен на символ '". $_POST["bt"]. "'";
}
?>

