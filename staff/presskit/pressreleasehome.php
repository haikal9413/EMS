<?php
$dbname = "spaus";

$con = mysqli_connect("localhost","root@localhost","",$dbname);
session_start();



$matrik = $_SESSION['username'];
$inactive = 600;

if($_SESSION['username']==0){
	
	echo "<script>";
  	    echo "alert('Anda tidak dibenarkan mengakses laman ini');";
		echo "window.location.href='../../login/login.php?failed';";
  	    echo "</script>";
};

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
	$result =mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
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
<script type="text/javascript" src="../../js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="../../js/cufon-yui.js"></script>
<script type="text/javascript" src="../../js/cufon-replace.js"></script>
<script type="text/javascript" src="../../js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="../../js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
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
         <h1><a href="../staffwelcome.php">Student's site</a></h1>
         <nav>
            <ul>
               
               <li><a href="../logout.php" class="m1">Daftar Keluar</a></li>
               >
            </ul>
         </nav>
         
      </div>
   </header>
   <div class="container">
      <!-- aside -->
      <aside>
         <h3>MENU</h3>
         <ul class="categories">
         	<li><span><a href="../staffwelcome.php">Laman Utama Staf</a></span></li>
            <li><span><a href="../home/staffhome.php">Senarai Program</a></span></li>
            <li><span><a href="../home/displaymonth.php">Laporan Bulanan</a></span></li>
            <li><span><a href="../presskit/pressreleasehome.php">Senarai Permohonan Press Kit</a></span></li>
            <li><span><a href="../akhbar/akhbarhome.php">Senarai Permohonan Press Release</a></span></li>
         </ul>
   <div class="container">
   </div>
   </aside>
     <!--Borang-->
         <div class="inside">
            <h2><span>Senarai Permohonan</span></h2>



<?php
                          $sql_get_lec= "SELECT * FROM pressrelease;";
	$result_get_lec = mysqli_query($con,$sql_get_lec);
	 
	if (!$result_get_lec){
	echo 'Tiada permohonan baru';  
	}else{
echo "<table width =650 border=1 cellpadding=1>
<tr>
<th>Bil</th>
<th>Tajuk Program</th>
<th>Masa Program</th>
<th>Paparan</th>
<th>Tindakan</th>


</tr>";

$counter = 1;
echo "<tr>";
while (($q = mysqli_fetch_array($result_get_lec,MYSQLI_ASSOC)) !==NULL) 
{
	
	echo "<td style=text-align:center;>" . $counter . "</td>";
	
    
	echo "<td style=text-align:center;>".$q{'tajuk'}."</td>";
	echo "<td style=text-align:center;>".$q{'masa'}."</td>";
	echo "<td style=text-align:center;><a href='pressrelease.php?id=".$q{'idpress'}."'<button>Paparkan</button></a></td>";
	echo "<td style=text-align:center;><a href='presskitreport.php?id=".$q{'idpress'}."'><button>Paparkan dalam PDF</button></a></td>";
	
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
<script type="../text/javascript"> Cufon.now(); </script>
</body>
</html>
