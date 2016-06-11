<?php 
	
	include "config.php";
	include "checkstaff.php";

	$show_id=$_GET['show_id'];//รับค่าGETที่ส่งมาจากไฟล์โชว์
	$tc_name = $_GET['tc_name'];
	$tc_code = $_GET['tc_code'];

	/*echo $rel_code;
	echo $rel_id;
	echo $show_id;*/
 
 	$deltc = "DELETE FROM takecarestation WHERE tc_name = '$tc_name' ";
 	$objtc = mysql_query($deltc)or die ("Error Query [".$deltc."]");

 	$deltcad = "DELETE FROM address WHERE address.tc_code = '$tc_code' ";
 	$objtcad = mysql_query($deltcad)or die ("Error Query [".$deltcad."]");

 	$deltcdetail = "DELETE FROM takecaredetail WHERE takecaredetail.tc_code = '$tc_code' ";
 	$objtcdetail = mysql_query($deltcdetail)or die ("Error Query [".$deltcdetail."]");

	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('ลบสำเร็จ!')</script>";
	echo "<script>window.location='takecare.php?show_id=$show_id'</script>";
	

	mysql_close();


?>