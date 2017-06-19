<?php
include("../connection/conn.php");
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
		echo "window.location.href='logout.php?finished';";
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
<link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
<script type="text/javascript" src="../js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cufon-replace.js"></script>
<script type="text/javascript" src="../js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="../js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="js/script.js"></script>
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
            <li><span><a href="staffhome.php" class="active">Senarai Program</a></span></li>
            <li><span><a href="displaymonth.php">Laporan Bulanan</a></span></li>
         </ul>
   <div class="container">
   </div>
   </aside>
     <!--Borang-->
         <div class="inside">
            <h2><span>Senarai Permohonan</span></h2>



<?php
                          $sql_get_lec= "SELECT * FROM maklumat_acara;";
	$result_get_lec =mysql_query($sql_get_lec,$con);
	 
	if (!$result_get_lec) 

{
	echo 'Tiada permohonan baru';  
	 
	} 
	 
	else {
echo "<table width =650 border=1 cellpadding=1>
<tr>
<th>Bil</th>
<th>Program</th>
<th>Lokasi</th>
<th>Kampus</th>
<th>Tarikh Mula</th>
<th>Tarikh Habis Program</th>
<th>Pengesahan</th>
<th>Tindakan</th>


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
	echo"<td style=text-align:center;><a href='filedownload.php?id=".$q{'id_program'}."'<button>Muat turun fail kelulusan</button></a></td>";
	echo "<td style=text-align:center;><a href='pressrelease.php?id=".$q{'id_program'}."'><button>Paparkan</button></a></td>";
	
	;
	echo "</tr>";
	$counter++;
}
echo "</table>";
}


?>


       
  </div>
      </section>
   </div>
</div>
<!-- footer -->
<footer>
   <div class="container">
      <div class="inside">
         <div class="wrapper">
            <br/>
               3D Models provided by <a class="new_window" href="http://www.templates.com/product/3d-models/" target="_blank" rel="nofollow">www.templates.com</a></div>
         </div>
      </div>
   </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
