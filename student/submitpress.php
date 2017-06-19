<?php

include("pressreleaseform.php");

mysql_select_db($db, $con);
if(isset($_POST['press'])){
	$tajuk = $_POST['tajuk'];
	$anjuran = $_POST['anjuran'];
	$kerjasama = $_POST['kerjasama'];
	$sinopsis = $_POST['sinopsis'];
	$objektif = $_POST['objektif'];
	$sasaran = $_POST['sasaran'];
	$masa = $_POST['masa'];
	$tentatif = $_POST['tentatif'];
	$perasmi = $_POST['perasmi'];
	$vip = $_POST['vip'];
	$disediakan = $_POST['disediakan'];
	$pegawai = $_POST['pegawai'];
	$matrik = $_POST['matrik'];
	
	$sql = "INSERT INTO `pressrelease`(`idpress`, `tajuk`, `anjuran`, `kerjasama`, `sinopsis`, `objektif`, `sasaran`, `masa`, `tentatif`, `perasmi`, `vip`, `disediakan`, `pegawai`, `matrik`) VALUES ('$idpress','$tajuk','$anjuran','$kerjasama','$sinopsis', '$objektif','$sasaran','$masa','$tentatif','$perasmi','$vip','$disediakan','$pegawai','$matrik');";
		
	$q = mysql_query($sql,$con);	
		
};


?>