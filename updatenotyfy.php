<?php 
	include "config.php";
 	include "checkstaff.php";

 	mysql_query("SET NAMES UTF8");
 	$hlin_id = $_POST['hlin_id'];

 	$upstatushin = "UPDATE homelessinform SET
 					hlin_status = 'รับตรวจสอบข้อมูลแจ้งขอความช่วยเหลือ'
 					WHERE homelessinform.hlin_id = '$hlin_id' ";
 	$objstatushin = mysql_query($upstatushin);
 	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('รับตรวจสอบข้อมูลแจ้งขอความช่วยเหลือ!')</script>";
	echo "<script>window.location='notification.php'</script>";

?>