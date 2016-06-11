<?php 
	include "config.php";
	include "checkstaff.php";
  	$show_id=$_POST['hl'];
	
	$sqlcheckname = "SELECT * FROM course
 			 		WHERE course.course_name = '".$_POST['oc']."' ";
 	$querycheckname = mysql_query($sqlcheckname);
 	$objResultcheck = mysql_fetch_array($querycheckname);
 	if($objResultcheck == ""){

 		$course = mysql_result(mysql_query("Select Max(substr(course_code,-5))+1 as MaxID from  course"),0,"MaxID");
		if ($course==""){
			$course_new="C00001";
		}else{
			$course_new="C".sprintf("%05d","$course");
		}


 		$sqlcourse = "INSERT INTO course (course_code,course_name) VALUES ('$course_new','".$_POST['oc']."')";
 		$objQuery1 = mysql_query($sqlcourse);

 	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('เพิ่มอาชีพสำเร็จ!')</script>";
	echo "<script>window.location='addoc.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
 	}else{
 	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('อาชีพนี้มีข้อมูลแล้ว!')</script>";
	echo "<script>window.location='addoc.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
 	}
 	mysql_close();
?>