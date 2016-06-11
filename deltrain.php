<?php 
	
	include "config.php";
	include "checkstaff.php";


	$show_id=$_GET['show_id'];//รับค่าGETที่ส่งมาจากไฟล์โชว์
	$train_code = $_GET['train_code'];
	$course_code = $_GET['course_code'];

	/*echo $rel_code;
	echo $rel_id;
	echo $show_id;*/
 
 	$delcourse = "DELETE FROM course WHERE course_code = '$course_code'  ";
 	$obj = mysql_query($delcourse)or die ("Error Query [".$delcourse."]");

 	$delcoursede = "DELETE FROM coursedetail WHERE coursedetail.traincenter_code = '$train_code' ";
 	$objde = mysql_query($delcoursede)or die ("Error Query [".$delcoursede."]");



	$deltrain = "DELETE FROM trainingcenter WHERE traincenter_code = '$train_code' ";
	$objtr = mysql_query($deltrain) or die ("Error Query [".$deltrain."]");

	$deltrdetail = "DELETE FROM trainingcenterdetail WHERE trainingcenterdetail.traincenter_code = '$train_code' ";
	$objtrdetail = mysql_query($deltrdetail) or die ("Error Query [".$deltrdetail."]");

	$deladtr ="DELETE FROM address WHERE address.traincenter_code = '$train_code' ";
	$objadtr = mysql_query($deladtr) or die ("Error Query [".$deladtr."]");

	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('ลบสำเร็จ!')</script>";
	echo "<script>window.location='tain.php?show_id=$show_id'</script>";

	

	mysql_close();


?>