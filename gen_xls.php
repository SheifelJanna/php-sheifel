<?php
include ("checks.php");
require_once 'connect1.php';
require_once('php_excel/Classes/PHPExcel.php');
require_once('php_excel/Classes/PHPExcel/Writer/Excel2007.php');

$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno){
    echo "Не удалось подключиться к БД";
}

// Запрос на выборку сведений о пользователях
$result = $mysqli->query("SELECT
        film.name_f as name_f,
        film.janr as janr,
        film.year as `year`,
        zal.name_z as name_z,
        zal.cat_z as cat_z,
        sean.date_s,
        sean.count_s - sean.count_zan
        FROM sean
        LEFT JOIN film ON sean.id_f=film.id_f
        LEFT JOIN zal ON sean.id_z=zal.id_z"
);

$xls = new PHPExcel();
// Устанавливаем индекс активного листа
$xls->setActiveSheetIndex(0);
// Получаем активный лист
$sheet = $xls->getActiveSheet();
// Подписываем лист
$sheet->setTitle('Киносеансы');
// Вставляем текст в ячейку A1
$sheet->setCellValue("A1", 'Киносеансы');
$sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
// Объединяем ячейки
$sheet->mergeCells('A1:I1');
// Выравнивание текста
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$c = 0;

$header = array("п/п", "Название фильма", "Жанр", "Год", "Кинозал", "Категория", "Дата и время", "Свободных мест");
foreach ($header as $h){
    $sheet->setCellValueByColumnAndRow($c,2,$h);
    // Применяем выравнивание
    $sheet->getColumnDimensionByColumn($c)->setAutoSize(true);
    $c++;
}

if ($result){
    $r = 3;
    // Для каждой строки из запроса
    while ($row = $result->fetch_row()){
        $c = 0;

        $sheet->setCellValueByColumnAndRow($c,$r,$r-2);
        $c++;

        foreach ($row as $cell){
            $sheet->setCellValueByColumnAndRow($c,$r,$cell);
            $c++;
        }
        $r++;
    }
}

header('Content-Type: application/xls');
header('Content-Disposition: inline; filename=films.xls');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');

$objWriter = new PHPExcel_Writer_Excel5($xls);
$objWriter->save('php://output');
?>