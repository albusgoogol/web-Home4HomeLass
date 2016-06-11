<?php 
	include 'config.php';
	
	
	$strSQL = "SELECT * FROM members WHERE mem_email = '".trim($_POST['email'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if($objResult){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    	window.alert('อีเมลนี้มีการใช้งานแล้ว!')
		window.location.href='registerpop.php';
		</SCRIPT>");
	} else{
		$new_mem = mysql_result(mysql_query("Select Max(substr(mem_code,-5))+1 as MaxID from  members"),0,"MaxID");
		if ($new_mem==""){
			$mem_idnew="M00001";
		}else{
			$mem_idnew="M".sprintf("%05d","$new_mem");
		}

		$strSQL1 = "INSERT INTO members (mem_code,mem_id,mem_fname,mem_lname,mem_sex,mem_email,mem_password,mem_status) 
					VALUES ('$mem_idnew','".$_POST["mid"]."','".$_POST["fname"]."','".$_POST["lname"]."',
				'".$_POST["sex"]."','".$_POST["email"]."','".$_POST["pass"]."','พลเมืองดี')";
		$objQuery1 = mysql_query($strSQL1);

		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    	window.alert('สมัครสมาชิกสำเร็จ!')
		window.location.href='login.php';
		</SCRIPT>");
		}
	mysql_close();
?>