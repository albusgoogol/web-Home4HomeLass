<?php
	include("config.php");
	 include "checkstaff.php";

// $querycheckname = mysql_result(mysql_query("Select hl_code ch from homeless 
  				 	// where hl_fname = '".$_POST["fname"]."' and hl_lname = '".$_POST["lname"]."' and hl_sex = '".$_POST["sex"]."' "),"ch");
// $objQuerycheckname = mysql_query($querycheckname) or die ("Error Query [".$querycheckname."]");
 $sqlcheckname = "SELECT hl_code FROM homeless 
 			 	WHERE  hl_fname = '".$_POST["fname"]."' AND hl_lname = '".$_POST["lname"]."' AND hl_sex = '".$_POST["sex"]."' ";
 $querycheckname = mysql_query($sqlcheckname);
 $objResultcheck = mysql_fetch_array($querycheckname);
 // echo $querycheckname;
//echo $objResultcheck; 
//echo $querycheckname;
 if (empty($_POST['cause']) || empty($_POST['status']) || empty($_POST['tservice']) ){
                        echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
                        echo "<script type='text/javascript'>alert('กรุณาเลือกอย่างน้อย 1 ข้อ!')</script>";
                        
                       
                        echo "<script>window.location='record.php';</script>";
                         exit();
            }   
  if($objResultcheck == ""){

	$new_hl = mysql_result(mysql_query("Select Max(substr(hl_code,-5))+1 as MaxID from  homeless"),0,"MaxID");
		if ($new_hl==""){
			$hl_idnew="HL00001";
		}else{
			$hl_idnew="HL".sprintf("%05d","$new_hl");
		}

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

		$strSQL1 = "INSERT INTO homeless (hl_code,hl_id,hl_fname,hl_lname,hl_sex,hl_bday,hl_status,age_code,lastjob_code,ad_code,n_code) 
		VALUES ('$hl_idnew','".$_POST["id"]."','".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["sex"]."','".$_POST["bday"]."','ติดต่อเจ้าหน้าที่โดยตรง','".$_POST["age"]."',
				'".$_POST["job"]."','$ad_codenew','$native_codenew')";
		$objQuery1 = mysql_query($strSQL1);

		//echo $strSQL1;

		$strSQL8 = "INSERT INTO typehomelessdetail (hl_code,th_id) 
		VALUES ('$hl_idnew','".$_POST["typehl"]."')";
		$objQuery8 = mysql_query($strSQL8);

		//echo $strSQL8;

		$strSQL2 = "INSERT INTO native (n_code,n_num,n_villno,n_alley,n_street,dis_code,am_code,prov_code,GEO_ID,hl_code) 
		VALUES ('$native_codenew','".$_POST["num"]."','".$_POST["villno"]."','".$_POST["alley"]."','".$_POST["street"]."','".$_POST["district"]."',
				'".$_POST["amphur"]."','".$_POST["province"]."','".$_POST["geography"]."','$hl_idnew')";
		$objQuery2 = mysql_query($strSQL2);

		//echo $strSQL2;

		$strSQL3 = "INSERT INTO address (ad_code,ad_num,ad_villno,ad_alley,ad_street,dis_code,am_code,prov_code,GEO_ID,hl_code) 
		VALUES ('$ad_codenew','".$_POST["num1"]."','".$_POST["villno1"]."','".$_POST["alley1"]."','".$_POST["street1"]."','".$_POST["district1"]."',
				'".$_POST["amphur1"]."','".$_POST["province1"]."','".$_POST["geography1"]."','$hl_idnew')";
		$objQuery3 = mysql_query($strSQL3);

		//echo $strSQL3;

		$strSQL4 = "INSERT INTO homelessdetail (hl_code,mem_code,hldetail_date,hldetail_period,hl_location) 
		VALUES ('$hl_idnew','$mcode','".$_POST["day"]."','".$_POST["period"]."','ศูนย์คุ้มครองคนไร้ที่พึ่ง')";
		$objQuery4 = mysql_query($strSQL4);

		//echo $strSQL4;
		         

		$checkbox1 = $_POST['cause'];
		$checkbox1 = array_values($checkbox1);
		//$cause = explode(',' , $checkbox1);
		//echo $checkbox1[0];
		//print_r($checkbox1);
		//echo sizeof($checkbox1);
		
		for($i=0;$i<sizeof($checkbox1);$i++)
			{
				$strSQL5 = "INSERT INTO causedetail (hl_code,cause_code,cause_descrip)
							VALUES ('$hl_idnew','".$checkbox1[$i]."','".$_POST["causedescrip"]."')";
				$objQuery5 = mysql_query($strSQL5);
				//echo $strSQL5;
			}

			

		$checkbox2 = $_POST['status'];
		$checkbox2 = array_values($checkbox2);
		//$status = explode(',' , $checkbox);
		//echo $checkbox2[0];
		//print_r($checkbox2);
		//echo count($checkbox2);
		
		for($j=0;$j<sizeof($checkbox2);$j++)
			{
				$strSQL6 = "INSERT INTO statusdetail (hl_code,status_id,status_descrip)
							VALUES ('$hl_idnew','".$checkbox2[$j]."','".$_POST["statusdescrip"]."')";
				$objQuery6 = mysql_query($strSQL6);
				//echo $strSQL6;
			}

		

		$checkbox3 = $_POST['tservice'];
		$checkbox3 = array_values($checkbox3);
		//$tsertvice = explode(',' , $checkbox3);

		//echo $checkbox3[0];
		//print_r($checkbox3);
		//echo count($checkbox3);
		
		for($k=0;$k<sizeof($checkbox3);$k++)
			{
				$strSQL7 = "INSERT INTO typeservicedetail (hl_code,tservice_code,tservice_descrip)
							VALUES ('$hl_idnew','".$checkbox3[$k]."','".$_POST["tservicedescrip"]."')";
				$objQuery7 = mysql_query($strSQL7);
				//echo $strSQL7;
			}
			
		

		
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
		echo "<script type='text/javascript'>alert('บันทึกรายงานสำเร็จ!')</script>";
		echo "<meta http-equiv ='refresh'content='0;URL=record.php'>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
	}else {
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
		echo "<script type='text/javascript'>alert('มีข้อมูลแล้ว!')</script>";
		echo "<meta http-equiv ='refresh'content='0;URL=record.php'>";//เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
	}
		mysql_close();

		
?>
