<?php

session_start();

include('../connection/conn.php');
  


if(isset($_POST['masuk'])){
	
	$s_number = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$password = md5($password);
	
	$type="";
	
    $sql_login ="select * from users where no_matrik='$s_number' and password='$password'";
	$result = mysqli_query($con, $sql_login);
	$num = mysqli_num_rows($result);
	$r = mysqli_fetch_array($result);
	$j=$r['type'];

         if($num == 0){
			echo "<script>";
  	    echo "alert('Kata laluan tidak sama');";
		echo "window.location.href='../login/login.php?failed';";
  	    echo "</script>";

         }elseif($_POST['username']==$s_number && $r['type']=="Pelajar"){
		
		$sql4 = "UPDATE `users` SET `login_time`= NOW() WHERE no_matrik = '$s_number';";
		$q = mysqli_query($con,$sql4);
		session_start();
		$_SESSION['username'] = $s_number;
		$_SESSION['type'] = $j;
		

   		header("Location: http://localhost/SPAUS/student/studenthome.php");
		
	
         }elseif($_POST['username']==$s_number && $r['type']=="Staf"){
			 
		$sql3 = "UPDATE `users` SET `login_time`= NOW() WHERE no_matrik = '$s_number';";
		$q = mysqli_query($con,$sql3);
			 
		session_start();
		$_SESSION['username'] = $s_number;
		$_SESSION['type'] = $j;
		
		

   		header("Location: http://localhost/SPAUS/staff/staffwelcome.php");
		
	     


		 }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Daftar Masuk</title>
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
               <li><a href="../home/index.php" class="m1">Laman Utama</a></li>
               
            </ul>
         </nav>
         
      </div>
   </header>
   <div class="container">
    <!-- aside -->
      <aside>
         <h3>MENU</h3>
         <ul class="categories">
            <li><span><a href="../reg/reg.php">Daftar Akaun Baru</a></span></li>
            <li><span><a href="../login/login.php">Daftar Masuk</a></span></li>
            <li><span><a href="../admin/adminlogin.php">Pentadbir</a></span></li>
         </ul>
   <div class="container">
   </div>
   </aside>
      <!-- content -->
     
         <div class="inside">
            <h2>DAFTAR MASUK<span></span></h2>
            <br>
            <br>
            



	<form method="post" action="login.php">
    	<table>
        	<tr>
            	<td>No. matrik/No. staf:</td>
                <td><input type="text" name="username" class="textInput" required></td>
                </tr>
            <tr>
                <td>Kata laluan:</td>
                <td><input type="password" name="password" class="textInput" required></td>
                </tr>
                
             <tr>
                <td>&nbsp;
           &nbsp;
           &nbsp;
           &nbsp;<input type="submit" value="Masuk" name="masuk" align="middle"></td>
                <td><input type="submit" value="Lupa kata laluan?" name="forgotpassword"></td>
                </tr>   
            
           </table>
           
           
           
           
         
        
        &nbsp;
        &nbsp;
        
        
        
	</form>
           
         </div>
      </section>
   </div>
</div>



<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->



<!-- footer -->
<footer>
   <div class="container">
      <div class="inside">
         <div class="wrapper">

            <div class="aligncenter">Website template designed by <a class="new_window" href="http://www.templatemonster.com" target="_blank" rel="nofollow">www.templatemonster.com</a><br/>
               3D Models provided by <a class="new_window" href="http://www.templates.com/product/3d-models/" target="_blank" rel="nofollow">www.templates.com</a></div>
         </div>
      </div>
   </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
