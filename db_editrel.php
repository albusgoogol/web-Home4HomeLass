<?php 
	include "config.php";
	include "checkstaff.php";
	mysql_query("SET NAMES UTF8");
	$show_id=$_POST['hl'];//รับค่าGETที่ส่งมาจากไฟล์โชว์
	$rel_id = $_POST['rid'];
	$rel_code = $_POST['rel_code'];

	$uprel = "UPDATE relative SET 
			relative_id ='".$_POST['rid']."',
			relative_fname = '".$_POST['fname']."',
			relative_lname = '".$_POST['lname']."',
			relative_email = '".$_POST['email']."',
			relative_line = '".$_POST['line']."',
			relative_address = '".$_POST['detail']."'
			WHERE relative_id = '$rel_id'  ";
	$objrel = mysql_query($uprel);

	$sqldetailrel = "UPDATE relativedetail SET
					relative_id = '".$_POST['rid']."'
					WHERE relative_id = '$rel_id' AND relative_code = '$rel_code' ";
	$objderel = mysql_query($sqldetailrel);

	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('แก้ไขมูลญาติสำเร็จ!')</script>";
	echo "<script>window.location='follow.php?show_id=$show_id'</script>";


?>