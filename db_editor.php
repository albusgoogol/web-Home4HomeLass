<?php 
	include "config.php";
	include "checkstaff.php";
	mysql_query("SET NAMES UTF8");
	$id = $_POST['or'];

	$upor = "UPDATE organization SET 
			or_name = '".$_POST['name']."',
			or_tel = '".$_POST['tel']."',
			or_address = '".$_POST['detail']."'
			WHERE or_code = '$id' ";
	$objupor = mysql_query($upor);

	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('แก้ไขข้อมูหน่วยงานสำเร็จ!')</script>";
	echo "<script>window.location='about.php'</script>";


	mysql_close();
?>