<?php 
	include "config.php";
	include "configs.php";
	mysql_query("SET NAMES UTF8");
	$show_id=$_POST['hl'];//รับค่าGETที่ส่งมาจากไฟล์โชว์
	$train_name = $_POST['station'];
	$train_code = $_POST['traincode'];
	$course = $_POST['oc'];

	//echo $show_id;

	$uptr = "UPDATE trainingcenter SET 
			traincenter_name ='".$_POST['station']."'
			WHERE traincenter_name = '$train_name' ";
	$objtr = mysql_query($uptr);

	$uptrdetail = "UPDATE trainingcenterdetail SET 
					traincenter_status = 'ฝึกอาชีพ',
					traincenter_day = '".$_POST['day']."'
					WHERE trainingcenterdetail.hl_code = '$show_id' ";
	$objtrdetail = mysql_query($uptrdetail);

	$upcourse = "UPDATE course SET course_name = '".$_POST['oc']."' 
				WHERE course_name = '$course' ";
	$objcourse = mysql_query($upcourse);

	$upcoursedetail = "UPDATE coursedetail SET course_descrip = '".$_POST['detail']."' 
				WHERE traincenter_code = '$train_code' ";
	$objcoursedetail = mysql_query($upcoursedetail);

	
	
	if (!empty($_POST['district1'])){
		$upad = "UPDATE address SET 
			ad_num = '".$_POST['num1']."',
			ad_villno = '".$_POST['villno1']."',
			ad_alley = '".$_POST['alley1']."',
			ad_street = '".$_POST['street1']."',
			dis_code = '".$_POST['district1']."',
			am_code = '".$_POST['amphur1']."',
			prov_code = '".$_POST['province1']."',
			GEO_ID = '".$_POST['geography1']."' 
			WHERE traincenter_code = '$train_code' ";
		$objad = mysql_query($upad);
	}else{
		$upad = "UPDATE address SET 
			ad_num = '".$_POST['num1']."',
			ad_villno = '".$_POST['villno1']."',
			ad_alley = '".$_POST['alley1']."',
			ad_street = '".$_POST['street1']."',
			WHERE traincenter_code = '$train_code' ";
		$objad = mysql_query($upad);
}
	


	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('แก้ไขรายงานสำเร็จ!')</script>";
	echo "<script>window.location='tain.php?show_id=$show_id'</script>";


	mysql_close();
?>