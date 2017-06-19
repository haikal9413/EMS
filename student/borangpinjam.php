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
            <li><span><a href="pressreleasehome.php">Senarai Permohonan Press Release</a></span></li>
         </ul>
   <div class="container">
   </div>
   </aside>
     <!--Borang-->
         <div class="inside">
            <h2><span>PERMOHONAN CENDERAMATA</span></h2>

<form action="borangpinjam.php" name="pinjam" method="post">

<table>

<tr>
<td>Nama pemohon:</td>
<td><input type="text" name="pemohon" class="textInput" value="" required></td>
</tr>

<tr>
<td>Jawatan:</td>
<td><input type="text" name="jawatan" class="textInput" value="" required></td>
</tr>

<tr>
<td>Peralatan diperlukan:</td>
<td><script>

    var counterText = 0;

    var counterRadioButton = 0;

    var counterCheckBox = 0;

    var counterTextArea = 0;

    function addAllInputs(divName, inputType){

         var newdiv = document.createElement('div');

         switch(inputType) {

              case 'text':

                   newdiv.innerHTML = "Entry " + (counterText + 1) + " <br><input type='text' name='myInputs[]'>";

                   counterText++;

                   break;

              case 'radio':

                   newdiv.innerHTML = "Entry " + (counterRadioButton + 1) + " <br><input type='radio' name='myRadioButtons[]'>";

                   counterRadioButton++;

                   break;

              case 'checkbox':

                   newdiv.innerHTML = "Entry " + (counterCheckBox + 1) + " <br><input type='checkbox' name='myCheckBoxes[]'>";

                   counterCheckBox++;

                   break;

              case 'textarea':

    	       newdiv.innerHTML = "Entry " + (counterTextArea + 1) + " <br><textarea name='myTextAreas[]'>type here...</textarea>";

                   counterTextArea++;

                   break;

              }

         document.getElementById(divName).appendChild(newdiv);

    }
</script>
</td>
</tr>
</table>

</form>
       
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
