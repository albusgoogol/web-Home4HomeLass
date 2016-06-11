<?php 
	include "config.php";
	include "checkstaff.php";
$show_id=$_POST['hl'];
	
	$sqlcheckname = "SELECT * FROM sickgroup
 			 		WHERE sickgroup.sickgroup_name = '".$_POST["sickgroup"]."' ";
 	$querycheckname = mysql_query($sqlcheckname);
 	$objResultcheck = mysql_fetch_array($querycheckname);
 	if($objResultcheck == ""){

 		$sick = mysql_result(mysql_query("Select Max(substr(sickgroup_id,-2))+1 as MaxID from  sickgroup"),0,"MaxID");
		if ($sick==""){
			$sick_new="S01";
		}else{
			$sick_new="S".sprintf("%02d","$sick");
		}


 		$sqlsickgroup = "INSERT INTO sickgroup (sickgroup_id,sickgroup_name) VALUES ('$sick_new','".$_POST['sickgroup']."')";
 		$objQuery1 = mysql_query($sqlsickgroup);

 	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('เพิ่มกลุ่มโรคสำเร็จ!')</script>";
	echo "<script>window.location='addsickgroup.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
 	}else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('มีข้อมูลกลุ่มโรคนี้แล้ว!')</script>";
	echo "<script>window.location='addsickgroup.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
	}

	mysql_close();
?>