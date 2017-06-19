<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */


error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Kuala_Lumpur');

include("../connection/conn.php");
if(isset($_POST['download'])){	


 

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '../PHPExcel-1.8/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Kampus')
            ->setCellValue('B1', 'No. matrik')
            ->setCellValue('C1', 'No. tel')
			->setCellValue('D1', 'Program')
			->setCellValue('E1', 'Tarikh mula')
			->setCellValue('F1', 'Tarikh habis')
			->setCellValue('G1', 'Lokasi')
			->setCellValue('H1', 'Objektif')
			->setCellValue('I1', 'Pangkat')
			->setCellValue('J1', 'Nama tetamu')
			;
 
 	 $id    = $_GET['id'];
	$sql= "SELECT * FROM maklumat_acara WHERE id_program = '$id'";
	$result = mysql_query($sql,$con);
	if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
	$a = 1;
	
	while($row=mysql_fetch_array($result))
	{
		$a=$a+1;
		$a1='A'.$a;
		$b1='B'.$a;
		$c1='C'.$a;
		$d1='D'.$a;
		$e1='E'.$a;
		$f1='F'.$a;
		$g1='G'.$a;
		$h1='H'.$a;
		$i1='I'.$a;
		$j1='J'.$a;
		
		
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue($a1, $row["kampus"])
		->setCellValue($b1, $row["no_matrik"])
		->setCellValue($c1, $row["no_tel"])
		->setCellValue($d1, $row["program"])
		->setCellValue($e1, $row["tarikh_mula"])
		->setCellValue($f1, $row["tarikh_habis"])
		->setCellValue($g1, $row["lokasi"])
		->setCellValue($h1, $row["objektif"])
		->setCellValue($i1, $row["pangkat"])
		->setCellValue($j1, $row["nama_tetamu"])
		;
			
		
	}

// Miscellaneous glyphs, UTF-8


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Permohonan');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

ob_clean();


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="permohonan.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');




$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
}

?>

