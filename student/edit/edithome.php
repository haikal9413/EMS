<?php
include("../../connection/conn.php");
?>

<?php

session_start();



$matrik = $_SESSION['username'];
$inactive = 600;



if (isset($_SESSION['timeout'])) {
	
	$sessionTTL = time() - $_SESSION['timeout'];
	if ($sessionTTL > $inactive) {
		
		session_destroy();
		echo "<script>";
  	    echo "alert('Sesi anda telah tamat. Sila daftar masuk semula');";
		echo "window.location.href='../logout.php?finished';";
  	    echo "</script>";
		
	}
}

$_SESSION['timeout'] = time();

$sql= "SELECT * FROM users WHERE no_matrik = '$matrik'";
	$result =mysql_query($sql,$con);
	$row = mysql_fetch_array($result);
	$nama = $row{'nama_penuh'};


?>

<!doctype html>
<html>
<head>
<title>Senarai Permohonan</title>
<meta charset="utf-8">
<meta name="description" content="Place your description here">
<meta name="keywords" content="put, your, keyword, here">
<meta name="author" content="Templates.com - website templates provider">
<link rel="stylesheet" href="../../css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all">
<script type="text/javascript" src="../js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="../../js/cufon-yui.js"></script>
<script type="text/javascript" src="../../js/cufon-replace.js"></script>
<script type="text/javascript" src="../../js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="../../js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="js/../script.js"></script>
<!--[if lt IE 7]>
     <link rel="stylesheet" href="css/ie/ie6.css" type="text/css" media="screen">
     <script type="text/javascript" src="js/ie_png.js"></script>
     <script type="text/javascript">
        ie_png.fix('.png, footer, header nav ul li a, .nav-bg, .list li img');
     </script>
<![endif]-->
<!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
  <![endif]-->
</head>
<body id="page1">
<div class="wrap">
   <!-- header -->
   <header>
      <div class="container">
         <h1><a href="index.php">Student's site</a></h1>
         <nav>
            <ul>
               <li class="current"><a href="../home/index.php" class="m1">Laman Utama</a></li>
               <li><a href="logout.php" class="m2">Daftar Keluar</a></li>
               <li><a href="articles.php" class="m3">Our Articles</a></li>
               <li><a href="contact-us.php" class="m4">Contact Us</a></li>
               <li class="last"><a href="sitemap.php" class="m5">Site Map</a></li>
            </ul>
         </nav>
         
      </div>
   </header>
   <div class="container">
    <!-- aside -->
      <aside>
         <h3>MENU</h3>
         <ul class="categories">
         	<li><span><a href="../studenthome.php">Laman Utama Pelajar</a></span></li>
            <li><span><a href="../new/form.php" class="active">Permohonan Baru</a></span></li>
            <li><span><a href="edithome.php">Sunting Permohonan</a></span></li>
            <li><span><a href="../cetak.php">Cetak Permohonan</a></span></li>
            <li><span><a href="../pressreleaseform.php"><h5>Permohonan Press Kit</h5></a></span></li>
            <li><span><a href="../pressreleaseform2.php"><h5>Permohonan Press Release</h5></a></span></li>
         </ul>
   <div class="container">
   </div>
   </aside>
     <!--Borang-->
         <div class="inside">
            <h2><span>Senarai Permohonan</span></h2>



<?php
                          $sql_get_lec= "SELECT * FROM maklumat_acara WHERE no_matrik='$matrik'";
	$result_get_lec =mysql_query($sql_get_lec,$con);
	 
	if (!$result_get_lec) 

{
	echo 'Tiada permohonan baru';  
	 
	} 
	 
	else {
echo "<table width =880 border=1 cellpadding=1>
<tr>
<th>Bil</th>
<th>Program</th>
<th>Lokasi</th>
<th>Kampus</th>
<th>Tarikh Mula</th>
<th>Tarikh Habis Program</th>
<th>Edit</th>
<th>Padam Permohonan</th>


</tr>";
$counter = 1;
while (($q = mysql_fetch_array($result_get_lec)) !==FALSE) 
{
	echo "<tr>";
	echo "<td style=text-align:center;>" . $counter . "</td>";
	
    
	echo "<td style=text-align:center;>".$q{'program'}."</td>";
	echo "<td style=text-align:center;>".$q{'lokasi'}."</td>";
	echo "<td style=text-align:center;>".$q{'kampus'}."</td>";
	echo "<td style=text-align:center;>".$q{'tarikh_mula'}."</td>";
	echo "<td style=text-align:center;>".$q{'tarikh_habis'}."</td>";
	
	$sf = $q{'status_flag'};
	if($sf == 0){$f = "<a href='edit.php?l=0&&id=".$q{'id_program'}."'><button>Edit</button></a>";}
	elseif($sf == 1){$f = "Sudah dihantar";}	
	echo"<td style=text-align:center;".$f."</td>";
	
	echo "<td style=text-align:center;><a href='delete.php?id=".$q{'id_program'}."'><button>Paparkan</button></a></td>";
	;
	echo "</tr>";
	$counter++;
}
echo "</table>";
}
if(isset($_GET['l'])){
	
	$id= $_GET['id'];

$sql = "UPDATE `maklumat_acara` SET `status_flag`=1 WHERE id_program='$id';";

$q = mysql_query($sql,$con);
	
	if(!$q){
		die('Error: ' . mysql_error());
		}
		else echo "Program tidak diluluskan";
}


?>


</p>
                   </td><td style="text-align: center; width: 33%; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; "><span style="color: rgb(35, 41, 57);"><br></span></td>
<td style="text-align: right; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; width: 34%; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; "><br>&nbsp;</td>
</tr>
</tbody>
</table>
<br></div>
                                
                

</article></div>
                    </div>
                </div>
      </div>
    </div>
<footer class="art-footer">
  <div class="art-footer-inner">


  <br></p>
    <p class="art-page-footer">
    </p>
  </div>
</footer>

</div>


</body></html>