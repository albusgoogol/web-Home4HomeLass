<?php 
	mysql_connect("localhost","root","123456");
	mysql_select_db("dbhame");
 	mysql_db_query("dbhame","SET NAMES UTF8");

	$show_id=$_GET['show_id'];//รับค่าGETที่ส่งมาจากไฟล์โชว์
	$delhl = "DELETE FROM homeless WHERE homeless.hl_code = '$show_id' ";
	$objQuery = mysql_query($delhl) or die ("Error Query [".$delhl."]");

	$delhlde = "DELETE FROM homelessdetail WHERE homelessdetail.hl_code = '$show_id' ";
	$objQueryhlde = mysql_query($delhlde) or die ("Error Query [".$delhlde."]");

	$delad = "DELETE FROM address WHERE address.hl_code = '$show_id' ";
	$objQueryad = mysql_query($delad) or die ("Error Query [".$delad."]");

	$delnative = "DELETE FROM native WHERE native.hl_code = '$show_id' ";
	$objQuerynative = mysql_query($delnative) or die ("Error Query [".$delnative."]");

	$delcause = "DELETE FROM causedetail WHERE causedetail.hl_code = '$show_id' ";
	$objQuerycause = mysql_query($delcause) or die ("Error Query [".$delcause."]");

	$delstatus = "DELETE FROM statusdetail WHERE statusdetail.hl_code = '$show_id' ";
	$objQuerystatus = mysql_query($delstatus) or die ("Error Query [".$delstatus."]");

	$delservice = "DELETE FROM typeservicedetail WHERE typeservicedetail.hl_code = '$show_id' ";
	$objQueryservice = mysql_query($delservice) or die ("Error Query [".$delservice."]");

	$deltype = "DELETE FROM typehomelessdetail WHERE typehomelessdetail.hl_code = '$show_id' ";
	$objQuerytype = mysql_query($deltype) or die ("Error Query [".$deltype."]");

	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('ลบสำเร็จ!')</script>";
	echo "<script>window.location='search.php'</script>";
	
	mysql_close();

?>