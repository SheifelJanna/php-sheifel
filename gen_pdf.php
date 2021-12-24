<?php
include ("checks.php");
require_once 'connect1.php';
require('tfpdf/tfpdf.php');

$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
}

$pdf = new tFPDF();
$pdf->AddFont('PDFFont', '', 'cour.ttf');
$pdf->SetFont('PDFFont', '', 12);
$pdf->AddPage();

$pdf->Cell(80);
$pdf->Cell(30, 10, 'Киносеансы', 1, 0, 'C');
$pdf->Ln(20);

$pdf->SetFillColor(200, 200, 200);
$pdf->SetFontSize(6);

$header = array("п/п", "Название фильма", "Жанр", "Год", "Кинозал", "Категория", "Дата и время", "Свободных мест");
$w = array(6, 25, 20, 10, 20, 20, 30, 20);
$h = 20;
for ($c = 0; $c < 8; $c++) {
    $pdf->Cell($w[$c], $h, $header[$c], 'LRTB', '0', '', true);
}
$pdf->Ln();

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

if ($result) {
    $counter = 1;
    // Для каждой строки из запроса
    while ($row = $result->fetch_row()) {
        $pdf->Cell($w[0], $h, $counter, 'LRBT', '0', 'C', true);
        $pdf->Cell($w[1], $h, $row[0], 'LRB');

        for ($c = 2; $c < 8; $c++) {
            $pdf->Cell($w[$c], $h, $row[$c - 1], 'RB');
        }
        $pdf->Ln();
        $counter++;
    }
}

$pdf->Output("I", 'films.pdf', true);
?>