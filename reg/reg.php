<?php

include("../connection/conn.php");

?>


<!doctype html>
<html>
<head>
<title>Pendaftaran Pengguna</title>
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
               <li class="current"><a href="../home/index.php" class="m1">Home Page</a></li>
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
            <h2><span>Pendaftaran Pengguna</span></h2>
            
           <form method="post" action="reg.php">
            <fieldset>
            <table>
           
            
             <tr>
             	<td>Nama Penuh:</td>
             	<td><input type="text" name="nama_penuh" class="textInput"></td> 
             </tr>
             
              <tr>
             	<td>No. Matrik/ No.Staf:</td>
                <td><input type="text" name="no_matrik" class="textInput"></td>
                </tr>
                
              <tr>
             	<td>Jawatan:</td>
                <td><select name="type">
                	<option value="Pelajar">Pelajar</option>
                    <option value="Staf">Staf</option>
                    </select></td>
                </tr>
                
              <tr>
             	<td>Kata nama:</td>
                <td><input type="text" name="username" class="textInput"></td>
                </tr>
                
              <tr>
             	<td>Kata laluan:</td>
                <td><input type="password" name="password"></td>
                </tr>
                
              <tr>
             	<td>Taip semula kata laluan:</td>
                <td><input type="password" name="password2"></td>
             	</tr>
                
              <tr>
             	<td>Emel:</td>
                <td><input type="text" name="emel" class="textInput"></td>
                </tr>
                
              <tr>
             	<td>No. Telefon:</td>
                <td><input type="text" name="contact_no" input="textInput"></td>
                

                
             </tr>
             </table>
             <br>
             <br>
             <input type="submit" value="Submit" align="middle">
             </fieldset>
             
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
