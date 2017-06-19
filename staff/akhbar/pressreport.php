<?php

include("../../connection/conn.php");
require("../../fpdf/fpdf.php");


	
	Class PDF extends FPDF{
		
function Header()
{

$this->Image('uitm.jpg',40,6,30);
$this->SetFont("Arial","B",12);
$this->Cell(0,10,"Siaran Akhbar",0,1,"C");
	
}

function Footer()
{

$this->SetY(-15);
$this->SetFont("Arial","B",8);
$this->Cell(0,10,'Unit Komunikasi Korporat, UiTM Negeri Sembilan, Kampus Seremban',0,0,"C");
	
}
}

$pdf= new PDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",12);

$pdf->Cell(10,15,'',0,1);
$pdf->MultiCell(0,10,'LAPORAN PENERBITAN MEDIA BAGI PROGRAM / AKTTIVITI / PROJEK 
UITM CAWANGAN NEGERI SEMBILAN, KAMPUS SEREMBAN 3',0,"C");
$pdf->Cell(10,15,'',0,1);
$pdf->Cell(60,10,"Tajuk Aktiviti:",0,1);
$pdf->Cell(130,10,"$tajuk",1,1);
$pdf->Cell(60,10,"Anjuran:",0,0);
$pdf->Cell(130,10,"$anjuran",1,1);
$pdf->Cell(60,10,"Dengan Kerjasama:",0,0);
$pdf->Cell(130,10,"$kerjasama",1,1);
$pdf->Cell(60,10,"Sinopsis:",0,0);
$pdf->MultiCell(130,10,"$sinopsis",1);
$pdf->Cell(60,10,"Objektif Program:",0,0);
$pdf->MultiCell(130,10,"$objektif",1);
$pdf->Cell(60,10,"Sasaran:",2,0);
$pdf->MultiCell(130,10,"$sasaran",1);
$pdf->Cell(60,10,"Tarikh:",0,0);
$pdf->MultiCell(130,10,"$masa",1);
$pdf->Cell(60,10,"Tentatif:",0,0);
$pdf->MultiCell(130,10,"$tentatif",1);
$pdf->Cell(60,10,"Perasmi Program:",0,0);
$pdf->MultiCell(130,10,"$perasmi",1);
$pdf->Cell(60,10,"Senarai VIP:",0,0);
$pdf->MultiCell(130,10,"$vip",1);
$pdf->Cell(60,10,"Perasmi Program:",0,0);
$pdf->Cell(130,10,"$perasmi",1,1);
$pdf->Cell(60,10,"Disediakan:",0,0);
$pdf->Cell(130,10,"$disediakan",1,1);
$pdf->Cell(60,10,"Pegawai Bertanggungjawab:",0,0);
$pdf->Cell(130,10,"$pegawai",1,0);



$pdf->Output();

?>