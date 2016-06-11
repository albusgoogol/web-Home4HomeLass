<?php 
	include "config.php";
	include "checkstaff.php";
  	$show_id=$_POST['hl'];
	
	$sqlcheckname = "SELECT * FROM sickness
					INNER JOIN sickgroup ON sickgroup.sickgroup_id = sickness.sickgroup_id
 			 		WHERE sickgroup.sickgroup_id = '".$_POST['sick']."' AND sickness.sick_name = '".$_POST["sickness"]."' ";
 	$querycheckname = mysql_query($sqlcheckname);
 	$objResultcheck = mysql_fetch_array($querycheckname);
 	if($objResultcheck == ""){

 		$sick = mysql_result(mysql_query("Select Max(substr(sick_id,-4))+1 as MaxID from  sickness"),0,"MaxID");
		if ($sick==""){
			$sick_new="S0001";
		}else{
			$sick_new="S".sprintf("%04d","$sick");
		}


 		$sqlsickgroup = "INSERT INTO sickness (sickgroup_id,sick_id,sick_name) VALUES ('".$_POST['sick']."','$sick_new','".$_POST['sickness']."')";
 		$objQuery1 = mysql_query($sqlsickgroup);

 	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('เพิ่มกลุ่มโรคสำเร็จ!')</script>";
	echo "<script>window.location='addsickgroup.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
 	}else{
 	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('ข้อมูลซ้ำ!')</script>";
	echo "<script>window.location='addsickgroup.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
 	}
 	mysql_close();
?>