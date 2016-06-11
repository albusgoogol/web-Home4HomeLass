<?php 
	include "config.php";
	include "checkstaff.php";
	$show_id=$_POST['hl'];
	
	$sqlcheckname = "SELECT * FROM careergroup
 			 		WHERE careergroup.career_name = '".$_POST["groupoc"]."' ";
 	$querycheckname = mysql_query($sqlcheckname);
 	$objResultcheck = mysql_fetch_array($querycheckname);
 	if($objResultcheck == ""){

 		$career = mysql_result(mysql_query("Select Max(substr(career_id,-2))+1 as MaxID from  careergroup"),0,"MaxID");
		if ($career==""){
			$career_new="O01";
		}else{
			$career_new="O".sprintf("%02d","$career");
		}


 		$sqlsickgroup = "INSERT INTO careergroup (career_id,career_name) VALUES ('$career_new','".$_POST['groupoc']."')";
 		$objQuery1 = mysql_query($sqlsickgroup);

 	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('เพิ่มกลุ่มอาชีพสำเร็จ!')</script>";
	echo "<script>window.location='addoc.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
 	}else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('มีข้อมูลกลุ่มอาชีพนี้แล้ว!')</script>";
	echo "<script>window.location='addoc.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
	}

	mysql_close();
?>