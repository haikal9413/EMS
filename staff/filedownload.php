<?php
ob_start();
include("../connection/conn.php");


	$sql = "SELECT id_program, filename FROM maklumat_acara";
    $result = mysql_query($sql) or die('Error, query failed');

    if(mysql_num_rows($result)==0){
        echo "Database is empty <br>";
    }
    else{
        while(list($id_program, $filename) = mysql_fetch_array($result)){
			?>
    <a href="filedownload.php?id=<?php $id_program;?>"><?php echo $filename; ?></a>

<?php		
        }
    }
	
	$exp = $_POST["load"]||$_GET["id"];

if(isset($exp)){
{
// if id is set then get the file with the id from database



	 $id    = $_GET['id'];
	 $q = "SELECT filename, filetype, filesize, filecontent FROM maklumat_acara LIKE '%".$view."%'";

	 $result = mysql_query($q) or die('Error, query failed');
	 list($filename, $filetype, $filesize, $filecontent) =          mysql_fetch_array($result);
header("Content-Disposition:attachment;filename=\"$filename\"");
header("Content-type: $filetype");
header("Content-length: $filesize");
echo $filecontent;
exit;
}
}
?>