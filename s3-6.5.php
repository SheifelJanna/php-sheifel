<html>
<body>
<form action="<?php print $PHP_SELF ?>" method="post">
<p>Предложение: <INPUT type="text" name="lipsiha" maxlength="40"></p>
<p><input type="submit" name="Viv" value="Вывести"></p>
</form>
<?php
$jj = trim($_POST["lipsiha"]);
$data = explode(" ", $jj);
$s=str_word_count($jj, 1, "АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя");
for ($i=0;$i<$s;$i++){
echo $data[$i]."</br>";
}
?>
</body>
</html>