<?php 
	include "config.php";
	include "checkpop.php";
	mysql_query("SET NAMES UTF8");
	$mem_code = $_POST['mem_code'];

	$upmempop = "UPDATE members SET
				mem_id = '".$_POST['mid']."',
				mem_fname = '".$_POST['fname']."',
				mem_lname = '".$_POST['lname']."',
				mem_sex = '".$_POST['sex']."',
				mem_email = '".$_POST['email']."',
				mem_line = '".$_POST['line']."'
				WHERE mem_code = '$mem_code' ";
	$objmem = mysql_query($upmempop);

	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('แก้ไขข้อมูส่วนตัวสำเร็จ!')</script>";
	echo "<script>window.location='mempop.php'</script>";

	mysql_close();
?>