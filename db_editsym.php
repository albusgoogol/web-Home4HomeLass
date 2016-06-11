<?php 
	include "config.php";
	include "checkstaff.php";
	mysql_query("SET NAMES UTF8");
	$show_id=$_POST['hl'];//รับค่าGETที่ส่งมาจากไฟล์โชว์
	/*$sym_name = $_POST['sick'];*/
	$sym_code = $_POST['sym_code'];
	$sickgroup = $_POST['sickgroup'];

	$delsym = "DELETE FROM sicknessdetail WHERE sick_id = '$sym_code' AND sickgroup_id = '$sickgroup' ";
	$objsick = mysql_query($delsym) or die ("Error Query [".$delsym."]");

	$sqlcheckname = "SELECT sicknessdetail.hl_code FROM sicknessdetail
					INNER JOIN sickness ON sickness.sick_id = sicknessdetail.sick_id
					INNER JOIN sickgroup ON sickgroup.sickgroup_id = sickness.sickgroup_id
					INNER JOIN homeless ON homeless.hl_code = sicknessdetail.hl_code
					/*INNER JOIN sickgroup ON sickgroup.sickgroup_id = sickness.sickgroup_id*/
 			 		WHERE sicknessdetail.hl_code = '".$_POST["hl"]."' AND sicknessdetail.sick_status = '".$_POST["tussym"]."' 
 			 		AND sicknessdetail.sickgroup_id = '".$_POST["sickgroup1"]."' AND sicknessdetail.sick_id = '".$_POST["sick1"]."' ";
 	$querycheckname = mysql_query($sqlcheckname);
 	$objResultcheck = mysql_fetch_array($querycheckname);
 	if($objResultcheck == ""){


	$strSQL2 = "INSERT INTO sicknessdetail (hl_code,sick_id,sickgroup_id,sick_date,sick_descript,sick_status,sick_rec) 
				VALUES ('$show_id','".$_POST["sick1"]."','".$_POST["sickgroup1"]."','".$_POST["sickdate"]."','".$_POST["detail"]."','".$_POST["tussym"]."','".$_POST["drec"]."')";
	$objQuery2 = mysql_query($strSQL2);
//echo $strSQL2;
	

	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('แก้ไขมูลอาการป่วยสำเร็จ!')</script>";
	echo "<script>window.location='sym.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
}else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('มีข้อมูลอาการป่วยแล้ว!')</script>";
	echo "<script>window.location='sym.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
	}


	mysql_close();


?>