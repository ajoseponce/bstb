<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');

error_reporting(0);

/**********************************/
ob_start();
include_once('imprimir_nc_pdf.php');
$content = ob_get_clean();
require_once('./lib/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'es');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('exemple01.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}

?>
