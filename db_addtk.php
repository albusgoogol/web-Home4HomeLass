<?php 
	include "config.php";
	include "checkstaff.php";
  	$show_id=$_POST['hl'];
	
	$sqlcheckname = "SELECT * FROM takecarestation
 			 		WHERE takecarestation.tc_name = '".$_POST["tcstation"]."' ";
 	$querycheckname = mysql_query($sqlcheckname);
 	$objResultcheck = mysql_fetch_array($querycheckname);
 	if($objResultcheck == ""){

 		$tk = mysql_result(mysql_query("Select Max(substr(tc_code,-4))+1 as MaxID from  takecarestation"),0,"MaxID");
		if ($tk==""){
			$tk_new="TC0001";
		}else{
			$tk_new="TC".sprintf("%04d","$tk");
		}
		$new_ad = mysql_result(mysql_query("Select Max(substr(ad_code,-6))+1 as MaxID from  address"),0,"MaxID");
		if ($new_ad==""){
			$ad_codenew="AD000001";
		}else{
			$ad_codenew="AD".sprintf("%06d","$new_ad");
		}


 		$sqltk = "INSERT INTO takecarestation (tc_code,tc_name,tc_tel,tc_email,ad_code,tc_contact) 
 				VALUES ('$tk_new','".$_POST["tcstation"]."','".$_POST['tel']."','".$_POST['email']."','$ad_codenew','".$_POST['detail']."')";
 		$objQuerytk = mysql_query($sqltk);

 		$strSQL3 = "INSERT INTO address (ad_code,ad_num,ad_villno,ad_alley,ad_street,dis_code,am_code,prov_code,GEO_ID,tc_code) 
		VALUES ('$ad_codenew','".$_POST["num1"]."','".$_POST["villno1"]."','".$_POST["alley1"]."','".$_POST["street1"]."','".$_POST["district1"]."',
				'".$_POST["amphur1"]."','".$_POST["province1"]."','".$_POST["geography1"]."','$tk_new')";
		$objQuery3 = mysql_query($strSQL3);

 	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('เพิ่มสถานที่รับดูแลสำเร็จ!')</script>";
	echo "<script>window.location='addtk.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
 	}else{
 	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('ข้อมูลซ้ำ!')</script>";
	echo "<script>window.location='addtk.php?show_id=$show_id'</script>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
 	}
 	mysql_close();
?>