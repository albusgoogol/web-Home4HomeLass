<?php 
	include "config.php";
	include "checkstaff.php";
  	$show_id=$_POST['hl'];
	
	$sqlcheckname = "SELECT * FROM trainingcenter
					INNER JOIN course ON course.course_code = trainingcenter.course_code
 			 		WHERE course.course_code = '".$_POST['oc']."' AND trainingcenter.traincenter_name = '".$_POST['station']."'  ";
 	$querycheckname = mysql_query($sqlcheckname);
 	$objResultcheck = mysql_fetch_array($querycheckname);
 	if($objResultcheck == ""){

 		$train = mysql_result(mysql_query("Select Max(substr(traincenter_code,-5))+1 as MaxID from  trainingcenter"),0,"MaxID");
		if ($train==""){
			$train_new="TR00001";
		}else{
			$train_new="TR".sprintf("%05d","$train");
		}
		$new_ad = mysql_result(mysql_query("Select Max(substr(ad_code,-6))+1 as MaxID from  address"),0,"MaxID");
		if ($new_ad==""){
			$ad_codenew="AD000001";
		}else{
			$ad_codenew="AD".sprintf("%06d","$new_ad");
		}

		$strSQL3 = "INSERT INTO address (ad_code,ad_num,ad_villno,ad_alley,ad_street,dis_code,am_code,prov_code,GEO_ID,traincenter_code) 
		VALUES ('$ad_codenew','".$_POST["num1"]."','".$_POST["villno1"]."','".$_POST["alley1"]."','".$_POST["street1"]."','".$_POST["district1"]."',
				'".$_POST["amphur1"]."','".$_POST["province1"]."','".$_POST["geography1"]."','$train_new')";
		$objQuery3 = mysql_query($strSQL3);

 		$sqlcourse = "INSERT INTO trainingcenter (traincenter_code,traincenter_name,ad_code,course_code) VALUES ('$train_new','".$_POST['station']."','$ad_codenew','".$_POST['oc']."')";
 		$objQuery1 = mysql_query($sqlcourse);

 	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('เพิ่มศูนย์ฝึกอาชีพสำเร็จ!')</script>";
	echo "<script>window.location='addoc.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
 	}else{
 	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('ศูนย์ฝึกอาชีพนี้มีข้อมูลแล้ว!')</script>";
	echo "<script>window.location='addoc.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
 	}
 	mysql_close();
?>