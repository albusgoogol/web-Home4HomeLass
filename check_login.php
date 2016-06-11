<?php 
	session_start();
	mysql_connect("br-cdbr-azure-south-b.cloudapp.net","bf35a4b77631cf","fdea3b09");
	mysql_select_db("dbhame");
	mysql_query("SET NAMES UTF8");
	
	$android = $_POST['android'];
	$response = array();
	if(!empty($android)) {
		$strSQL = "SELECT * FROM members WHERE mem_email = '".mysql_real_escape_string($_POST['email'])."'
		and mem_password = '".mysql_real_escape_string($_POST['pass'])."'";
		$objQuery = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery, MYSQL_ASSOC);
		$status = "";
		$fname = "";
		$lname = "";

		if(!$objResult) {
			$response['success'] = "false";
		}else {
			$response['success'] = "true";
			$response['fname'] = $objResult['mem_fname'];
			$response['lname'] = $objResult['mem_lname'];
			$response['status'] = $objResult['mem_status'];
		}
		echo json_encode($response);
		return;
	}

	$strSQL = "SELECT * FROM members WHERE mem_email = '".mysql_real_escape_string($_POST['email'])."'
	and mem_password = '".mysql_real_escape_string($_POST['pass'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	
	if(!$objResult)
	{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    	window.alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง !')
		window.location.href='login.php';
		</SCRIPT>");
	}
	else
	{	
		$_SESSION["mem_code"] = $objResult["mem_code"];
		$_SESSION["mem_fname"] = $objResult["mem_fname"];
		$_SESSION["mem_lname"] = $objResult["mem_lname"];
		$_SESSION["mem_status"] = $objResult["mem_status"];



		session_write_close();
		if($objResult["mem_status"] == "พลเมืองดี")
		{
			header("location:notify.php");
		}
		else
		{
			header("location:notification.php");
		}
	}
mysql_close();
?>