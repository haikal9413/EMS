<?php
$dbname = "spaus";

$con = mysqli_connect("localhost","root@localhost","",$dbname);

session_start();



$matrik = $_SESSION['username'];
$inactive = 600;

if($_SESSION['username']==0){
	
	echo "<script>";
  	    echo "alert('Anda tidak dibenarkan mengakses laman ini');";
		echo "window.location.href='../../login/login.php';";
  	    echo "</script>";
};


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
	$result =mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$nama = $row{'nama_penuh'};


?>

<!doctype html>
<html>
<head>
<title>Rekod Daftar Masuk</title>
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
         <h1><a href="admin.php">Student's site</a></h1>
         <nav>
            <ul>
              
               <li><a href="logout.php" class="m2">Daftar Keluar</a></li>
               
            </ul>
         </nav>
         
      </div>
   </header>
   <div class="container">
      <!-- aside -->
      <aside>
         <h3>MENU</h3>
         <ul class="categories">
            <li><span><a href="admin.php">Rekod Daftar Masuk</a></span></li>
            <li><span><a href="staffhome.php">Senarai Program</a></span></li>
         </ul>
   <div class="container">
   </div>
   </aside>
     <!--Borang-->
     <div class="inside">
<h2><span>Rekod Daftar Masuk</span></h2>

<table>
<tr>
<th>No.</th>
<th>User Id</th>
<th>User Name</th>
<th>No. Matrik</th>
<th>Login Time</th>
</tr>
 
<?php 
$sql_get_lec= "select * from users;";
$query = mysqli_query($con,$sql_get_lec);;
$cnt=1;
while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $row['nama_penuh'];?></td>
<td><?php echo $row['username'];?></td>
<td><?php echo $row['no_matrik'];?></td>
<td><?php echo $row['login_time'];?></td>
</tr>
<?php $cnt=$cnt+1;
}
?>
</table>
</body>
</html>



       
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
