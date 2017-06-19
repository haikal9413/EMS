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


	if(isset($_GET['id'])){
	$id = $_GET['id'];
		$sql_get_lec= "SELECT * FROM maklumat_acara WHERE 		id_program = $id;";
	$result_get_lec = mysql_query($sql_get_lec,$con);
	$r = mysql_fetch_array($result_get_lec);
	$kampus = $r{'kampus'};
	$no_matrik = $r{'no_matrik'};
	$no_tel = $r{'no_tel'};
	$program = $r{'program'};
	$tarikh_mula = $r{'tarikh_mula'};
	$tarikh_habis = $r{'tarikh_habis'};
	$lokasi = $r{'lokasi'};
	$objektif = $r{'objektif'};
	$pangkat = $r{'pangkat'};
	$nama_tetamu = $r{'nama_tetamu'};
	

if(isset($_POST['download'])){	 
/*
* Do not forget to set the right credentials in the class for the mysql connection
* modify the queries here below.
*/

include('class.mysql2xls_xml.php');

$xls_xml = new excel_xml;

/*
* short query: select all fields from table
*/
$xls_xml->short_query('spaus','maklumat_acara');
$xls_xml->save_as('output_short.xml');

$xls_xml = new excel_xml;

/*
* short query: select field_1 ans field_2 from table, orders by field_1 and limit 2 records
*/
$xls_xml->short_query('spaus','maklumat_acara', array('kampus','pemohon'), ' ORDER BY field_1 LIMIT 2');
$xls_xml->save_as('output_short_extended.xml');

$xls_xml = new excel_xml;

/*
* short query: select all fields from table where field_1 > 0 and field_1 < 100, orders by field_1 and limit 1 record
* this method can be used for more complex queries with joins and so on...
*/
$xls_xml->long_query('spaus','SELECT * FROM maklumat_acara WHERE field_1 > 0 AND field_1 < 100 ORDER BY field_1 LIMIT 1');
$xls_xml->save_as('output_long.xml');

/*
* send the output to browser and triggers the office software. Tested with MS Office 2007 and libre office 3.6.2.2
*/
$xls_xml->to_excel('output_to_browser.xml');
}

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
               <li class="current"><a href="../staff/logout.php" class="m1">Daftar Keluar</a></li>
               <li><a href="about-us.php" class="m2">About Us</a></li>
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
            
           <form method="post" action="review.php">
            <table>
            
            
            
            <tr>
            <td>Kampus:</td>
            		<td><?php echo $kampus; ?>
              </td>
              </tr>
              &nbsp;
             <tr>
             	<td>Nama Pemohon:</td>
             	<td><?php echo $nama; ?></td> 
             </tr>
             
             <tr>
             	<td>No. Matrik/ No.Staf:</td>
                <td><?php echo $no_matrik; ?></td>
              </tr>
                
              <tr>
             	<td>No. Telefon:</td>
                <td><?php echo $no_tel; ?></td>
              </tr>
                
                <tr>
             	<td>Nama Program:</td>
                <td><?php echo $program; ?></td>
             	</tr>
             	
                <tr>
             	<td>Tarikh Mula Program:</td>
                <td><?php echo $tarikh_mula; ?></td>
                </tr>
                
                <tr>
             	<td>Tarikh Akhir Program:</td>
                <td><?php echo $tarikh_habis; ?></td>
                </tr>
                
                <tr>
             	<td>Lokasi Program:</td>
                <td><?php echo $lokasi; ?></td>
                </tr>
                
                <tr>
             	<td>Gelaran Tetamu:</td>
                <td><?php echo $pangkat; ?></td>
                </tr>
                
                <tr>
             	<td>Nama Tetamu:</td>
                <td><?php echo $nama_tetamu;  ?></td>
                

                
             </tr>
             </table>
             <br>
             <br>
             
             <input type="submit" align="middle" value="Muat turun" name="download">
             
             <?php
			include("download.php"); 
			 
}
			 ?>
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
