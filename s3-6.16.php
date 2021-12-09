<title>Шейфель Жанна</title>
<?php
$array = str_word_count($_POST["text"], 1, "АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя");
$rev_array = array_reverse($array);
echo implode (" ", $rev_array);
?>