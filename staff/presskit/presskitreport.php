<?php
require("../../fpdf/fpdf.php");



$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",12);
$pdf->Cell(0,10,"Press Release Kit",1,1,"C");	
$pdf->Cell(10,15,'',0,1);
$pdf->Cell(50,10,"Tajuk Aktiviti:",1,0);
$pdf->Cell(50,10,"k",1,1);
$pdf->Cell(50,10,"Anjuran:",1,0);
$pdf->Cell(50,10,"k",1,1);
$pdf->Cell(50,10,"Dengan Kerjasama:",1,0);
$pdf->Cell(50,10,"k",1,1);
$pdf->Cell(50,10,"Sinopsis:",1,0);
$pdf->Cell(50,10,"k",1,1);
$pdf->Cell(50,10,"Objektif Program:",1,0);
$pdf->Cell(50,10,"k",1,1);
$pdf->Cell(50,10,"Sasaran:",1,0);
$pdf->Cell(50,10,"k",1,1);
$pdf->Cell(50,10,"Tarikh:",1,0);
$pdf->Cell(50,10,"k",1,1);
$pdf->Cell(50,10,"Tentatif:",1,0);
$pdf->Cell(50,10,"k",1,1);
$pdf->Cell(50,10,"Perasmi Program:",1,0);
$pdf->Cell(50,10,"k",1,1);
$pdf->Cell(50,10,"Senarai VIP:",1,0);
$pdf->Cell(50,10,"k",1,1);
$pdf->Cell(50,10,"Perasmi Program:",1,0);
$pdf->Cell(50,10,"k",1,1);
$pdf->Cell(70,10,"Pegawai Bertanggungjawab:",1,0);
$pdf->Cell(50,10,"k",1,1);
$pdf->Output();

?>