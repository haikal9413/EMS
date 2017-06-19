<?php
include("../connection/conn.php");
?>

<?php

session_start();

$matrik = $_SESSION['username'];
$sql= "SELECT * FROM users WHERE no_matrik = '$matrik'";
	$result =mysql_query($sql,$con);
	$row = mysql_fetch_array($result);
	$nama = $row{'nama_penuh'};


?>


<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.3.0.60745 -->
    <meta charset="utf-8">
    <title>MainFunctons</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="../css/style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="../css/style.responsive.css" media="all">


    <script src="../css/jquery.js"></script>
    <script src="../css/script.js"></script>
    <script src="../css/script.responsive.js"></script>
<meta name="description" content="Description">
<meta name="keywords" content="Keywords">


</head>
<body>
<div id="art-main">
    <div class="art-sheet clearfix">
<header class="art-header">

    <div class="art-shapes">
        
  </div>

<h1 class="art-headline">
    <a href="/">Sistem Pengurusan Kertas Kerja</a>
</h1>





                 
</header>
<nav class="art-nav">
   <ul class="art-hmenu">
   
   <li><a href="mohon.php" >Mohon</a></li>
   <li><a href="status.php" class="active" >Status Permohonan</a></li>
   <li><a href="logout.php" >Keluar</a></li>
   
   </ul> 
</nav>
<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><table class="art-article" border="0" cellspacing="0" cellpadding="0" style="width:100%;"><tbody><tr class="even"><td width="48%" style="width: 33%; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; "><br></td><td width="18%" style="width: 33%; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; "><br></td><td width="34%" style="background-color: rgb(204, 204, 204); padding-right: 20px; padding-bottom: 0px; padding-left: 20px; width: 34%; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; "></td></tr><tr class="even"><td style="width: 33%; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; text-align: center; ">
                                                  <span style="text-align: center; width: 33%; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; "><span style="color: rgb(35, 41, 57);">
    
                       
                          </span></span></p>
                   </td><td style="text-align: center; width: 33%; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; "><span style="color: rgb(35, 41, 57);"><br></span></td>
<td style="text-align: right; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; width: 34%; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; "><br>&nbsp;</td>
</tr>
</tbody>
</table>
<br></div>
                                
                
<?php
    $sql_get_lec= "SELECT * FROM mainfunctions WHERE no_matrik='$matrik'";
	$result_get_lec =mysql_query($sql_get_lec,$con);
	 
	if (!$result_get_lec) 

{
	echo 'Tiada permohonan baru';  
	 
	} 
	 
	else {
echo "<table width =880 border=1 cellpadding=1>
<tr>
<th></th>

<th>Nama Program</th>
<th>Lokasi</th>
<th>Objektif</th>
<th>Penasihat</th>
<th>Tarikh</th>
<th>Masa</th>
<th>Permohonan</th>
<th>Status</th>
<th>Tindakan</th>
</tr>";
$counter = 1;
while (($q = mysql_fetch_array($result_get_lec)) !==FALSE) 
{
	echo "<tr>";
	echo "<td style=text-align:center;>" . $counter . "</td>";
	
    
	echo "<td>".$q{'namaProgram'}."</td>";
	echo "<td>".$q{'lokasiProgram'}."</td>";
	echo "<td style=text-align:center;>".$q{'objektifProgram'}."</td>";
	echo "<td style=text-align:center;>".$q{'penasihat'}."</td>";
	echo "<td style=text-align:center;>".$q{'dateProgram'}."</td>";
	echo "<td style=text-align:center;>".$q{'timeProgram'}."</td>";
	
	
	$status= $q{'draf'};
	if($status == 0 ){$st = "Draf";}
	elseif($status == 1){$st = "Diproses";}
	echo "<td style=text-align:center;>".$st."</td>";
	
	$statusdekan= $q{'status_dekan'};
	$statusstaf= $q{'status_staf'};
	$statustimdek= $q{'status_timdek'};
	if($statusstaf ==1 && $statustimdek ==1 && $statusdekan == 2 ){$std = "Lulus";}
	elseif($statusstaf == 2 || $statustimdek ==2 || $statusdekan == 3){$std = "Tidak Diluluskan";}
	elseif($statusdekan == 0){$std = "--";}
	echo "<td style=text-align:center;>".$std."</td>";
	
	if($status == 0 ){$fg = "<a href='edit.php?l=1&&id=".$q{'idProgram'}."'><button>Edit</button></a>";}
	elseif($status == 1){$fg = "--";}	
	echo "<td style=text-align:center;>".$fg."</td>";
	;
	echo "</tr>";
	$counter++;
}
echo "</table>";
}

if(isset($_GET['l'])){
	
	$id= $_GET['id'];

$sql = "UPDATE `mainfunctions` SET `draf`=2 WHERE idProgram='$id';";

$q = mysql_query($sql,$con);
	
	if(!$q){
		die('Error: ' . mysql_error());
		}
		else echo "Program tidak diluluskan";
}

?>

                    <br>
                    
<footer class="art-footer">
  <div class="art-footer-inner">
<table class="art-article" border="0" cellspacing="0" cellpadding="0" style="width:990px;">
	<tbody>
		<tr class="even">
		</tr>
	</tbody>
</table>
<p>

  <br></p>
    <p class="art-page-footer">
    </p>
  </div>
</footer>




</body></html>