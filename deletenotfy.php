<?php 
	include "config.php";
	include "checkstaff";

	$show_id=$_GET['show_id'];//รับค่าGETที่ส่งมาจากไฟล์โชว์
	$delhl = "DELETE FROM homeless WHERE hl_code = '$show_id' ";
	$objQuery = mysql_query($delhl) or die ("Error Query [".$delhl."]");

	$delhlde = "DELETE FROM homelessdetail WHERE homelessdetail.hl_code = '$show_id' ";
	$objQueryhlde = mysql_query($delhlde) or die ("Error Query [".$delhlde."]");

	$delimg = "DELETE FROM imagehomeless WHERE imagehomeless.hl_code = '$show_id' ";
	$objQueryimg = mysql_query($delimg) or die ("Error Query [".$delimg."]");

	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('ลบสำเร็จ!')</script>";
	echo "<script>window.location='notification.php'</script>";
	

	mysql_close();

?>