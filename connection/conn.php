<?php
$dbname = "spaus";

$con = mysqli_connect("localhost","root@localhost","",$dbname);
mysqli_select_db($con, $dbname) or die("no database");

?>