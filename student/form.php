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


$matrik = $_SESSION['username'];
$sql= "SELECT * FROM users WHERE no_matrik = '$matrik'";
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_array($result);
	$nama = $row{'nama_penuh'};


?>

<!doctype html>
<html>
<head>
<title>Borang Maklumat Program</title>
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
               <li><a href="../home/index.php" class="m1">Daftar Keluar</a></li>
               <li><a href="logout.php" class="m2">About Us</a></li>
               <li><a href="articles.php" class="m3">Our Articles</a></li>
               <li><a href="contact-us.php" class="m4">Contact Us</a></li>
               <li class="last"><a href="sitemap.php" class="m5">Site Map</a></li>
            </ul>
         </nav>
         
      </div>
   </header>
   <div class="container">
     <!--Borang-->
         <div class="inside">
            <h2><span>Borang Maklumat Program</span></h2>
            
            <form method="post" action="" enctype="multipart/form-data">
            <table>
            
            
            <tr>
            <td>Kampus:</td>
            		<td><select name='kampus' required>
            			<option value="Seremban">Seremban</option>
                        <option value="Rembau">Rembau</option>
                        <option value="Kuala Pilah">Kuala Pilah</option>
                        </select>
                        </td>
                        </tr>
            
                
              <tr>
             	<td>No. Telefon:</td>
                <td><input type="text" name="no_tel" class="textInput" required></td>
                </tr>
                
                <tr>
             	<td>Nama Program:</td>
                <td><input type="text" name="program" class="textInput" required></td>
             	</tr>
             	
                <tr>
             	<td>Tarikh Mula Program:</td>
                <td><input type="date" name="tarikh_mula" required>
                <script>if ( $('#tarikh_mula')[0].type != 'date' ) $('#test').datepicker();</script></td>
                </tr>
                
                <tr>
             	<td>Tarikh Akhir Program:</td>
                <td><input type="date" name="tarikh_habis" required></td>
                </tr>
                
                <tr>
             	<td>Lokasi Program:</td>
                <td><input type="text" name="lokasi" class="textInput" required></td>
                </tr>
                
                <br>
                
                <tr>
             	<td>Objektif Program:</td>
                <td><textarea name="objektif" cols="50" rows="10" required>
                
                </textarea>
                </td>
                
                
                <tr>
             	<td>Gelaran Tetamu:</td>
                <td><select name="pangkat" required>
                	<option value="Tun">Tun</option>
                    <option value="Toh Puan">Toh Puan</option>
                    <option value="Tan Sri">Tan Sri</option>
                    <option value="Puan Sri">Puan Sri</option>
                    <option value="Datuk Seri">Datuk Seri</option>
                    <option value="Datin Seri">Datin Seri</option>
                    <option value="Datuk">Datuk</option>
                    <option value="Datin">Datin</option>
                    <option value="Tuan">Tuan</option>
                    <option value="Puan">Puan</option>
                    <option value="Encik">Encik</option>
                    <option value="Puan">Puan</option>
                </select></td>
                </tr>
                
                <tr>
             	<td>Nama Tetamu:</td>
                <td><input type="text" name="nama_tetamu" input="textInput" required></td>
                
				<tr>
             	<td>Fail kelulusan program:</td>
                <td>Pilih fail untuk dimuatnaik:<br>
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input name="userfile" type="file" id="userfile">
    </td>
                
                
                
             </tr>
             </table>
             
             <input type="hidden" name="matrik" value="<?php echo $matrik;?>" >
             <br>
             <br>
             <input type="submit" value="Submit" name="subform">
             
            </form>
            
            <?php
			
			include("submitform.php");
			
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
