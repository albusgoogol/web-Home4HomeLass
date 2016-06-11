<?php 
	session_start();
	include ('config.php');
	mysql_query("SET NAMES UTF8");
	$strSQL = "SELECT * FROM members WHERE mem_email = '".mysql_real_escape_string($_POST['email'])."'
				AND mem_id = '".mysql_real_escape_string($_POST['mid'])."' 
				AND mem_code = '".mysql_real_escape_string($_POST['memid'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    	window.alert('เลขบัตรประชาชนหรือรหัสสมาชิกเจ้าหน้าที่หรืออีเมลไม่ถูกต้อง !')
		window.location.href='forgetstaff.php';
		</SCRIPT>");
	}
	else
	{	
		$_SESSION["mem_code"] = $objResult["mem_code"];
		$_SESSION["mem_fname"] = $objResult["mem_fname"];
		$_SESSION["mem_lname"] = $objResult["mem_lname"];
		$_SESSION["mem_status"] = $objResult["mem_status"];

		session_write_close();
		if($objResult["mem_status"] == "เจ้าหน้าที่")
		{
			header("location:notification.php");
		}
		else
		{
			header("location:login.php");
		}
	}
mysql_close();
?>