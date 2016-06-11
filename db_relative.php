<?php 
	include "config.php";
	include "checkstaff.php";
	mysql_query("SET NAMES UTF8");
	$show_id=$_POST['hl'];

	$sqlrelstatus = "SELECT * FROM relativedetail
					WHERE relativedetail.hl_code = '$show_id' AND relative_status = 'ไม่มีญาติ' ";
	$queryrelstatus = mysql_query($sqlrelstatus);
	$numrowstatus = mysql_num_rows($queryrelstatus);

	if ($numrowstatus == 1){
		$delrelativedetail = "DELETE FROM relativedetail WHERE relativedetail.hl_code = '$show_id' AND relative_status = 'ไม่มีญาติ' ";
		$objreldetail = mysql_query($delrelativedetail) or die ("Error Query [".$delrelativedetail."]");
	}
	$sqlcheckname = "SELECT relativedetail.hl_code FROM relativedetail
					INNER JOIN relative ON relative.relative_id = relativedetail.relative_id
					INNER JOIN homeless ON homeless.hl_code = relativedetail.hl_code
 			 		WHERE relativedetail.hl_code = '".$_POST["hl"]."' AND relativedetail.relative_status = '".$_POST["myradio"]."' 
 			 		AND relativedetail.relative_id = '".$_POST["rid"]."' ";
 	$querycheckname = mysql_query($sqlcheckname);
 	$objResultcheck = mysql_fetch_array($querycheckname);


 	if($objResultcheck == ""){
		$strSQL1 = "INSERT INTO relative (relative_id,relative_fname,relative_lname,relative_tel,relative_email,relative_line,relative_address) 
					VALUES ('".$_POST["rid"]."','".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["tel"]."','".$_POST["email"]."'
						,'".$_POST["line"]."','".$_POST["detail"]."')";
		$objQuery1 = mysql_query($strSQL1);

		$strSQL2 = "INSERT INTO relativedetail (hl_code,relative_id,relative_status,relative_day) 
					VALUES ('".$_POST["hl"]."','".$_POST["rid"]."','".$_POST["myradio"]."','".$_POST["today"]."')";
		$objQuery2 = mysql_query($strSQL2);
		
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
		echo "<script type='text/javascript'>alert('บันทึกข้อมูลญาติสำเร็จ!')</script>";
		echo "<script>window.location='follow.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
	}else{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
		echo "<script type='text/javascript'>alert('มีข้อมูลญาติแล้ว!')</script>";
		echo "<script>window.location='follow.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
	}

	

	
	

	
	//echo "<meta http-equiv ='refresh'content='0;URL=editrelative.php?show_id=$show_id'>";
	mysql_close();
?>
