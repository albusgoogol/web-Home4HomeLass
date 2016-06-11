<?php 
	include "config.php";
	include "configs.php";
	mysql_query("SET NAMES UTF8");
	$show_id=$_POST['hl'];//รับค่าGETที่ส่งมาจากไฟล์โชว์
	include "checkstaff.php";


	//echo $show_id;

  	$sqlcheckname = "SELECT hl_code FROM homeless 
 			 	WHERE hl_code = '$show_id' AND  hl_fname = '".$_POST["fname"]."' AND hl_lname = '".$_POST["lname"]."' AND hl_sex = '".$_POST["sex"]."' ";
	$querycheckname = mysql_query($sqlcheckname);
 	$objResultcheck = mysql_fetch_array($querycheckname);
 	if($objResultcheck == ""){
 		$new_ad = mysql_result(mysql_query("Select Max(substr(ad_code,-6))+1 as MaxID from  address"),0,"MaxID");
		if ($new_ad==""){
			$ad_codenew="AD000001";
		}else{
			$ad_codenew="AD".sprintf("%06d","$new_ad");
		}
		$new_native = mysql_result(mysql_query("Select Max(substr(n_code,-6))+1 as MaxID from  native"),0,"MaxID");
		if ($new_native==""){
			$native_codenew="N000001";
		}else{
			$native_codenew="N".sprintf("%06d","$new_native");
		}

		$mcode = $_SESSION["mem_code"];
  		//echo "$mcode";

		$uphl = "UPDATE homeless SET 
			hl_sex ='".$_POST['sex']."',
			hl_fname = '".$_POST['fname']."',
			hl_lname = '".$_POST['lname']."',
			hl_id = '".$_POST['hlid']."',
			hl_bday = '".$_POST['bday']."',
			hl_status = 'รับตรวจสอบข้อมูล',
			age_code = '".$_POST['age']."',
			lastjob_code = '".$_POST['job']."' 
			WHERE hl_code = '$show_id' ";
		$objhl = mysql_query($uphl);

		$uphldetail = "UPDATE homelessdetail SET
					hldetail_date = '".$_POST['today']."', 
					hldetail_period = '".$_POST['period']."'
					WHERE homelessdetail.hl_code = '$show_id' ";
		$objhldetail = mysql_query($uphldetail);

		$strSQL2 = "INSERT INTO native (n_code,n_num,n_villno,n_alley,n_street,dis_code,am_code,prov_code,GEO_ID,hl_code) 
		VALUES ('$native_codenew','".$_POST["num"]."','".$_POST["villno"]."','".$_POST["alley"]."','".$_POST["street"]."','".$_POST["district"]."',
				'".$_POST["amphur"]."','".$_POST["province"]."','".$_POST["geography"]."','$show_id')";
		$objQuery2 = mysql_query($strSQL2);

		$strSQL3 = "INSERT INTO address (ad_code,ad_num,ad_villno,ad_alley,ad_street,dis_code,am_code,prov_code,GEO_ID,hl_code) 
		VALUES ('$ad_codenew','".$_POST["num1"]."','".$_POST["villno1"]."','".$_POST["alley1"]."','".$_POST["street1"]."','".$_POST["district1"]."',
				'".$_POST["amphur1"]."','".$_POST["province1"]."','".$_POST["geography1"]."','$show_id')";
		$objQuery3 = mysql_query($strSQL3);

		$sqltypehl = "INSERT INTO typehomelessdetail  (hl_code,th_id) VALUES ('$show_id','".$_POST['typehl']."')";
	$objtypehl = mysql_query($sqltypehl);

	$checkbox1 = $_POST['cause'];
	$checkbox1 = array_values($checkbox1);
		for($i=0;$i<sizeof($checkbox1);$i++)
			{
				$strSQL5 = "INSERT INTO causedetail (hl_code,cause_code,cause_descrip)
							VALUES ('$show_id','".$checkbox1[$i]."','".$_POST['causedescrip']."')";
				$objQuery5 = mysql_query($strSQL5);
				//echo $strSQL5;
			}

	$checkbox2 = $_POST['status'];
	$checkbox2 = array_values($checkbox2);
		for($j=0;$j<sizeof($checkbox2);$j++)
			{
				$strSQL6 = "INSERT INTO statusdetail (hl_code,status_id,status_descrip)
							VALUES ('$show_id','".$checkbox2[$j]."','".$_POST['statusdescrip']."')";
				$objQuery6 = mysql_query($strSQL6);
				//echo $strSQL6;
			}

	$checkbox3 = $_POST['tservice'];
	$checkbox3 = array_values($checkbox3);
		for($k=0;$k<sizeof($checkbox3);$k++)
			{
				$strSQL7 = "INSERT INTO typeservicedetail (hl_code,tservice_code,tservice_descrip)
							VALUES ('$show_id','".$checkbox3[$k]."','".$_POST['tservicedescrip']."')";
				$objQuery7 = mysql_query($strSQL7);
				//echo $strSQL7;
			}
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('แก้ไขรายงานจากการรับแจ้งสำเร็จ!')</script>";
	echo "<script>window.location='notification.php'</script>";

 	}else{
 		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
		echo "<script type='text/javascript'>alert('มีข้อมูลแล้ว!')</script>";
		echo "<script>window.location='search.php'</script>";
 	}
	

	mysql_close();
?>