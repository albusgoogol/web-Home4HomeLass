<?php 
	
	include "config.php";
	include "checkstaff.php";

	$show_id=$_GET['show_id'];//รับค่าGETที่ส่งมาจากไฟล์โชว์
	$rel_code = $_GET['rel_code'];
	$rel_id = $_GET['rel_id'];
	/*echo $rel_code;
	echo $rel_id;
	echo $show_id;*/

	$delrelative = "DELETE FROM relative WHERE relative_id = '$rel_id' ";
	$objrel = mysql_query($delrelative) or die ("Error Query [".$delrelative."]");

	$delrelativedetail = "DELETE FROM relativedetail WHERE relative_code = '$rel_code' ";
	$objreldetail = mysql_query($delrelativedetail) or die ("Error Query [".$delrelativedetail."]");

	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('ลบสำเร็จ!')</script>";
	echo "<script>window.location='follow.php?show_id=$show_id'</script>";
	

	mysql_close();


?>