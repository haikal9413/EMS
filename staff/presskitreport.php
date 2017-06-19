<?php
require("../fpdf/fpdf.php");


$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",14);
$pdf->Cell(0,10,"Press Release Kit",1,1,"C");	
$pdf->Cell(10,15,'',0,1);
$pdf->Cell(50,10,"Tajuk Program:",1,0);
$pdf->Cell(50,10,"$tajuk",1,0);

$pdf->Output();

?>