<p><b>Задача 3.6 Вариант 3</b></p>
<HTML>
<BODY>
<FORM action="<?php print $PHP_SELF ?>" method="post">
<p>Предложение: <INPUT type="text" name="sentence" size="60" maxlength="40"></p>
<p>Буква: <INPUT type="text" name="letter" maxlength="40"></p>
<p><INPUT type="submit" name="count" value="Посчитать"></p>
</FORM>
<?php
if (isset($_POST["count"])){
$sentence = trim($_POST["sentence"]);
$letter = trim($_POST["letter"]);
if (empty($letter) || empty($sentence)){
echo "Заполните поля";
return;
}
$words = preg_split('/'." ".'/u', $sentence);
$counter = 0;
for ($c = 0; $c < count($words); $c++){
if (stripos($words[$c], $letter) === 0){
$counter++;}}
echo "Слов на эту букву: $counter";}
?>
</BODY>
</HTML>
