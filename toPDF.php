<?php

require_once('TCPDF/config/tcpdf_config.php');
require_once('TCPDF/tcpdf.php');

//////generate fake data
$table = '';
$table_header = "<tr><th>Title</th><th>Title</th><th>Title</th></tr>";
$table_body = '';
for($i=0; $i<100; $i++){
    $table_body= $table_body . "<tr>";
    for($j=0; $j<3; $j++){
        $table_body=$table_body."<td>'{$j}'</td>";
    }
    $table_body=$table_body . "</tr>";
}
$table = '<table border="1" cellpadding="4">'.$table_header.$table_body.'</table>';




$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();
// output the HTML content
$pdf->writeHTML($table, true, false, true, false, '');
$pdf->Output('test.pdf', 'D');
//print_f($pdf);




?>