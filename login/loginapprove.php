<?php
mysql_select_db($db,$con);

$error = '';

if(isset($_POST['masuk'])){
	
	$s_number = $_POST['no_matrik'];
	$password = md5 ($_POST['password']);
	$s_number = filter_var($s_number,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$password = filter_var($password,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$type="";
	
    $sql_login ="select * from users where no_matrik='$s_number' and password='$password'";
	$result = mysql_query($sql_login, $con);
	$num = mysql_num_rows($result);
	$r = mysql_fetch_array($result);
	$j=$r['type'];

         if($num == 0){
			$error = "Kata laluan salah" ;

         }elseif($_POST['no_matrik']==$s_number && $r['type']=="Pelajar"){
		session_start();
		$_SESSION['username'] = $s_number;
		$_SESSION['type'] = $j;

   		header("Location: http://localhost/SPAUS/student/form.php");

         }elseif($_POST['no_matrik']==$s_number && $r['type']=="Staf"){
		session_start();
		$_SESSION['username'] = $s_number;
		$_SESSION['type'] = $j;
		

   		header("Location: http://localhost/SPAUS/staff/review.php");
		
	    
		}
}


?> 