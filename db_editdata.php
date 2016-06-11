<?php 
	include "config.php";
	include "configs.php";
	include "checkstaff.php";
	mysql_query("SET NAMES UTF8");
	$show_id=$_POST['hl'];//รับค่าGETที่ส่งมาจากไฟล์โชว์

	//echo $show_id;

	$uphl = "UPDATE homeless SET 
			hl_sex ='".$_POST['sex']."',
			hl_fname = '".$_POST['fname']."',
			hl_lname = '".$_POST['lname']."',
			hl_id = '".$_POST['hlid']."',
			hl_bday = '".$_POST['bday']."',
			age_code = '".$_POST['age']."',
			lastjob_code = '".$_POST['job']."' 
			WHERE hl_code = '$show_id' ";
	$objhl = mysql_query($uphl);

	$uphldetail = "UPDATE homelessdetail SET 
					hldetail_period = '".$_POST['period']."'
					WHERE homelessdetail.hl_code = '$show_id' ";
	$objhldetail = mysql_query($uphldetail);

	if (!empty($_POST['district'])){
		$upnative = "UPDATE native SET 
			n_num = '".$_POST['num']."',
			n_villno = '".$_POST['villno']."',
			n_alley = '".$_POST['alley']."',
			n_street = '".$_POST['street']."',
			dis_code = '".$_POST['district']."',
			am_code = '".$_POST['amphur']."',
			prov_code = '".$_POST['province']."',
			GEO_ID = '".$_POST['geography']."' 
			WHERE native.hl_code = '$show_id' ";
	$objnative = mysql_query($upnative);
	}else{
		$upnative = "UPDATE native SET 
			n_num = '".$_POST['num']."',
			n_villno = '".$_POST['villno']."',
			n_alley = '".$_POST['alley']."',
			n_street = '".$_POST['street']."'
			WHERE native.hl_code = '$show_id' ";
		$objnative = mysql_query($upnative);
	}
	
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
			WHERE address.hl_code = '$show_id' ";
		$objad = mysql_query($upad);
	}else{
		$upad = "UPDATE address SET 
			ad_num = '".$_POST['num1']."',
			ad_villno = '".$_POST['villno1']."',
			ad_alley = '".$_POST['alley1']."',
			ad_street = '".$_POST['street1']."',
			WHERE address.hl_code = '$show_id' ";
		$objad = mysql_query($upad);
}
	

	$uptypehl = "UPDATE typehomelessdetail SET
				th_id = '".$_POST['typehl']."' 
				WHERE hl_code = '$show_id' ";
	$objtypehl = mysql_query($uptypehl);

	/*$delcause = "DELETE FROM causedetail WHERE causedetail.hl_code = '$show_id' ";
	$objQuerycause = mysql_query($delcause) or die ("Error Query [".$delcause."]");

	$checkbox1 = $_POST['cause'];
	$checkbox1 = array_values($checkbox1);
		for($i=0;$i<sizeof($checkbox1);$i++)
			{
				$strSQL5 = "INSERT INTO causedetail (hl_code,cause_code)
							VALUES ('".$_POST['hl']."',".$checkbox1[$i]."')";
				$objQuery5 = mysql_query($strSQL5);
				//echo $strSQL5;
			}

	$delstatus = "DELETE FROM statusdetail WHERE statusdetail.hl_code = '$show_id' ";
	$objQuerystatus = mysql_query($delstatus) or die ("Error Query [".$delstatus."]");

	$checkbox2 = $_POST['status'];
	$checkbox2 = array_values($checkbox2);
		for($j=0;$j<sizeof($checkbox2);$j++)
			{
				$strSQL6 = "INSERT INTO statusdetail (hl_code,status_id)
							VALUES ('".$_POST['hl']."','".$checkbox2[$j]."')";
				$objQuery6 = mysql_query($strSQL6);
				//echo $strSQL6;
			}

	$delservice = "DELETE FROM typeservicedetail WHERE typeservicedetail.hl_code = '$show_id' ";
	$objQueryservice = mysql_query($delservice) or die ("Error Query [".$delservice."]");
	$checkbox3 = $_POST['service'];
	$checkbox3 = array_values($checkbox3);
		for($k=0;$k<sizeof($checkbox3);$k++)
			{
				$strSQL7 = "INSERT INTO typeservicedetail (hl_code,tservice_code)
							VALUES ('".$_POST['hl']."','".$checkbox3[$k]."')";
				$objQuery7 = mysql_query($strSQL7);
				//echo $strSQL7;
			}
*/
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('แก้ไขรายงานสำเร็จ!')</script>";
	echo "<script>window.location='search.php'</script>";


	mysql_close();
?>
