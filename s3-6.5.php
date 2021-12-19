<?php
$str = trim($_POST["sentence"]);
$data = explode(" ", $str);
$s=str_word_count($str, 1, "АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя");
foreach ($data as $val ){
echo $val."</br>";
}
?>