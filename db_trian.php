<?php 
	include "config.php";
	mysql_query("SET NAMES UTF8");

	$show_id=$_POST['hl'];
	$sqlcheckname = "SELECT * FROM trainingcenterdetail
					INNER JOIN trainingcenter ON trainingcenter.traincenter_code = trainingcenterdetail.traincenter_code
                    INNER JOIN course ON course.course_code = trainingcenterdetail.course_code
 			 		WHERE trainingcenterdetail.hl_code = '".$_POST["hl"]."' 
 			 		AND trainingcenterdetail.traincenter_tday = '".$_POST["day"]."'
 			 		AND course.course_code = '".$_POST["oc"]."' AND trainingcenter.traincenter_code = '".$_POST["ta"]."' ";
 	$querycheckname = mysql_query($sqlcheckname);
 	$objResultcheck = mysql_fetch_array($querycheckname);

 	if($objResultcheck == ""){

	$strSQL5 = "INSERT INTO trainingcenterdetail (hl_code,traincenter_code,course_code,traincenter_status,traincenter_tday,traincenter_day,traincenter_detail) 
				VALUES ('".$_POST["hl"]."','".$_POST["ta"]."','".$_POST['oc']."','ฝึกอาชีพ','".$_POST['day']."','".$_POST['tday']."','".$_POST['detail']."')";
	$objQuery5 = mysql_query($strSQL5);
//echo $strSQL5;
	

	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('บันทึกข้อมูลฝึกอาชีพสำเร็จ!')</script>";
	echo "<script>window.location='tain.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
}else{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
		echo "<script type='text/javascript'>alert('มีข้อมูลการฝึกอาชีพนี้แล้ว!')</script>";
		echo "<script>window.location='tain.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
	}
	mysql_close();
?>