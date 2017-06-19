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

/* Back to login page after 600 seconds or 10 minutes */
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

/*Based on username of the user */
$matrik = $_SESSION['username'];
$sql= "SELECT * FROM users WHERE no_matrik = '$matrik'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$nama = $row{'nama_penuh'};
	
	$id = $_GET['id'];
if(isset($_GET['id'])){
	
		$sql_get_lec= "SELECT * FROM maklumat_acara WHERE 		id_program = $id;";
	$result_get_lec = mysqli_query($con,$sql_get_lec);
	$r = mysqli_fetch_array($result_get_lec);
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


?>

<!doctype html>
<html>
<head>
<title>Borang Maklumat Program</title>
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
  
<!--Javascript for picking date-->
  
  <script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "date")
	
    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n') 
}
</script>

<script>
if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
    jQuery(function($){ //on document.ready
		$('#tarikh_mula').datepicker({
   dateFormat: 'dd-MM-yy'
})

	$('#tarikh_habis').datepicker({
   dateFormat: 'dd-MM-yy'
})
	;


		
});
    

	
}



</script>
  
</head>
<body id="page1">
<div class="wrap">
   <!-- header -->
   <header>
      <div class="container">
         <h1><a href="../studenthome.php">Student's site</a></h1>
         <nav>
            <ul>
               <li><a href="../logout.php" class="m1">Daftar Keluar</a></li>
               
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
            <li><span><a href="edit.php">Sunting Permohonan</a></span></li>
            <li><span><a href="../cetak.php">Cetak Permohonan</a></span></li>
            <li><span><a href="../pressreleaseform.php"><h5>Permohonan Press Kit</h5></a></span></li>
            <li><span><a href="../pressreleaseform2.php"><h5>Permohonan Press Release</h5></a></span></li>
         </ul>
   <div class="container">
   </div>
   </aside>
   
     <!--Borang-->
     
         <div class="inside">
         
<!--Form to be filled by user-->
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
                <td><input type="text" name="no_tel" value="<?php  $no_tel;  ?>" required></td>
                </tr>
                
                <tr>
             	<td>Nama Program:</td>
                <td><input type="text" name="program" class="textInput" value = "<?php $program;  ?>" required></td>
             	</tr>
             	
                <tr>
             	<td>Tarikh Mula Program:</td>
                <td><input type="date" id="tarikh_mula" name="tarikh_mula" value="<?php $tarikh_mula; ?>" required>
                </tr>
                
                <tr>
             	<td>Tarikh Akhir Program:</td>
                <td><input type="date" id="tarikh_habis" name="tarikh_habis" value="<?php $tarikh_habis; ?>" required></td>
                </tr>
                
                <tr>
             	<td>Lokasi Program:</td>
                <td><input type="text" name="lokasi" value="<?php $lokasi;  ?>" required></td>
                </tr>
                
                <br>
                
                <tr>
             	<td>Objektif Program:</td>
                <td><textarea name="objektif" cols="50" rows="10" value="<?php $objektif;   ?>" required>
                
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
                <td><input type="text" name="nama_tetamu" input="textInput" value="<?php echo $nama_tetamu; ?>" required></td>
                </tr>
                
				<tr>
             	<td>Fail kelulusan program:</td>
                <td>Pilih fail untuk dimuatnaik:<br>
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input name="userfile" type="file" id="userfile">
    </td>
    
    <input type="hidden" name="matrik" value="<?php echo $matrik;?>" >
             
             &nbsp;
             &nbsp;
                
                <tr>
             	<td></td>
                <td><input type="submit" value="Hantar" name="saveform1"> &nbsp; <input type="submit" value="Simpan" name="saveform2"></td>
                
                
             </tr>
             </table>
             
             
             <br>
             
             
            </form>
<!--End of form-->            
            <?php
/*File for passing the data into the database*/
			include("submitedit.php");
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
