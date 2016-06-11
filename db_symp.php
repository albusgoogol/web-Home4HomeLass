<?php 
	include "config.php";
	include "checkstaff.php";
	mysql_query("SET NAMES UTF8");
	$show_id=$_POST['hl'];

	$sqlrelstatus = "SELECT * FROM sicknessdetail
					WHERE sicknessdetail.hl_code = '$show_id' AND sick_status = 'ปกติ' ";
	$queryrelstatus = mysql_query($sqlrelstatus);
	$numrowstatus = mysql_num_rows($queryrelstatus);

	if ($numrowstatus == 1){
		$delrelativedetail = "DELETE FROM sicknessdetail WHERE sicknessdetail.hl_code = '$show_id' AND sick_status = 'ปกติ' ";
		$objreldetail = mysql_query($delrelativedetail) or die ("Error Query [".$delrelativedetail."]");
	}

	$sqlcheckname = "SELECT sicknessdetail.hl_code FROM sicknessdetail
					INNER JOIN sickness ON sickness.sick_id = sicknessdetail.sick_id
					INNER JOIN sickgroup ON sickgroup.sickgroup_id = sickness.sickgroup_id
					INNER JOIN homeless ON homeless.hl_code = sicknessdetail.hl_code
					/*INNER JOIN sickgroup ON sickgroup.sickgroup_id = sickness.sickgroup_id*/
 			 		WHERE sicknessdetail.hl_code = '".$_POST["hl"]."' AND sicknessdetail.sick_status = '".$_POST["tussym"]."' 
 			 		AND sicknessdetail.sickgroup_id = '".$_POST["sickgroup"]."' AND sicknessdetail.sick_id = '".$_POST["sick"]."' ";
 	$querycheckname = mysql_query($sqlcheckname);
 	$objResultcheck = mysql_fetch_array($querycheckname);
 	if($objResultcheck == ""){

 	

	/*$sick = mysql_result(mysql_query("Select Max(substr(sick_id,-4))+1 as MaxID from  sickness"),0,"MaxID");
		if ($sick==""){
			$sick_new="S0001";
		}else{
			$sick_new="S".sprintf("%04d","$sick");
		}*/




	/*$strSQL1 = "INSERT INTO sickness (sick_id,sick_name,sickgroup_id) 
				VALUES ('$sick_new','".$_POST["sick"]."','".$_POST['sickgroup']."')";
	$objQuery1 = mysql_query($strSQL1);*/
//echo $strSQL1;

	$strSQL2 = "INSERT INTO sicknessdetail (hl_code,sick_id,sickgroup_id,sick_date,sick_descript,sick_status,sick_rec) 
				VALUES ('$show_id','".$_POST["sick"]."','".$_POST["sickgroup"]."','".$_POST["sickdate"]."','".$_POST["detail"]."','".$_POST["tussym"]."','".$_POST["dayrec"]."')";
	$objQuery2 = mysql_query($strSQL2);
//echo $strSQL2;
	

	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('บันทึกอาการป่วยสำเร็จ!')</script>";
	echo "<script>window.location='sym.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
}else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('มีข้อมูลอาการป่วยแล้ว!')</script>";
	echo "<script>window.location='sym.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
	}

	mysql_close();

?>