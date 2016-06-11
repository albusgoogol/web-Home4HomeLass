<?php 
	include "config.php";
	include "checkstaff.php";
	mysql_query("SET NAMES UTF8");
	$mem_code = $_POST['mem_code'];

	$upmempop = "UPDATE members SET
				mem_fname = '".$_POST['fname']."',
				mem_lname = '".$_POST['lname']."',
				mem_email = '".$_POST['email']."',
				mem_sex = '".$_POST['sex']."',
				mem_tel = '".$_POST['tel']."',
				mem_bday = '".$_POST['bday']."',
				mem_line = '".$_POST['line']."'
				WHERE mem_code = '$mem_code' ";
	$objmem = mysql_query($upmempop);


	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('แก้ไขข้อมูส่วนตัวสำเร็จ!')</script>";
	echo "<script>window.location='memstaff.php'</script>";


	mysql_close();
?>