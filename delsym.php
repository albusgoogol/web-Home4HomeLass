<?php 
	
	include "config.php";
	include "checkstaff.php";

	$show_id=$_GET['show_id'];//รับค่าGETที่ส่งมาจากไฟล์โชว์
	$sym_name = $_GET['sym_name'];
	$sym_code = $_GET['sym_code'];
	$sickgroup = $_GET['sickgroup'];
	/*echo $rel_code;
	echo $rel_id;
	echo $show_id;*/

	$delsick = "DELETE FROM sickness WHERE sick_id = '$sym_code' AND sickgroup_id = '$sickgroup' ";
	$objsick = mysql_query($delsick) or die ("Error Query [".$delsick."]");

	$delsickdetail = "DELETE FROM sicknessdetail WHERE hl_code = '$show_id' AND sick_id = '$sym_code' AND sickgroup_id = '$sickgroup' ";
	$objsickdetail = mysql_query($delsickdetail) or die ("Error Query [".$delsickdetail."]");

	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('ลบสำเร็จ!')</script>";
	echo "<script>window.location='sym.php?show_id=$show_id'</script>";
	

	mysql_close();


?>