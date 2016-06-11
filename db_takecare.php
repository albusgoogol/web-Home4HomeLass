<?php 
	include "config.php";
	include "configs.php";
	include "checkstaff.php";
	mysql_query("SET NAMES UTF8");

	$show_id=$_POST['hl'];

	$sqlcheckname = "SELECT * FROM takecaredetail
					INNER JOIN takecarestation ON takecarestation.tc_code = takecaredetail.tc_code
 			 		WHERE takecaredetail.hl_code = '".$_POST["hl"]."' 
 			 		AND takecaredetail.td_in = '".$_POST["tcin"]."' AND takecaredetail.tc_dayrec = '".$_POST["tkrec"]."'
 			 		AND takecarestation.tc_code = '".$_POST["tcstation"]."' ";
 	$querycheckname = mysql_query($sqlcheckname);
 	$objResultcheck = mysql_fetch_array($querycheckname);

 	if($objResultcheck == ""){

	

	$strSQL2 = "INSERT INTO takecaredetail (hl_code,tc_code,td_in,tc_dayrec,tc_status,td_contactdetail) 
				VALUES ('".$_POST["hl"]."','".$_POST["tcstation"]."','".$_POST["tcin"]."','".$_POST['tkrec']."','มีสถานที่รับดูแล','".$_POST['detail']."')";
	$objQuery2 = mysql_query($strSQL2);


		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
		echo "<script type='text/javascript'>alert('บันทึกข้อมูลสถานที่รับดูแลสำเร็จ!')</script>";
		echo "<script>window.location='takecare.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
	}else{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
		echo "<script type='text/javascript'>alert('มีข้อมูลสถานที่รับดูแลแล้ว!')</script>";
		echo "<script>window.location='takecare.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
	}
	mysql_close();
?>