<?php 
	include("config.php");
	mysql_query("SET NAMES UTF8");
	session_start();
  	if($_SESSION['mem_code'] == "")
  	{
    	echo "Please Login!";
    	header("location:login.php");
    	exit();
  	}

  	if($_SESSION['mem_status'] == "เจ้าหน้าที่")
  	{
    	echo "This page for User only!";
    	exit();
  	}
  	mysql_query("SET NAMES UTF8");  
  	mysql_connect("localhost","root","123456");
  	mysql_select_db("dbhame");     
  	$strSQL = "SELECT * FROM members WHERE mem_code = '".$_SESSION['mem_code']."' ";
  	$objQuery = mysql_query($strSQL);
  	$objResult = mysql_fetch_array($objQuery);

    $line=$_POST['hdnMaxLine'];
    for($i=1;$i<=$line;$i++){
      if(move_uploaded_file($_FILES["filUpload".$i.""]["tmp_name"],"images/imghl/".$_FILES["filUpload".$i.""]["name"]))
      {
        
        $objConnect = mysql_connect("localhost","root","123456") or die("Error Connect to Database");
        $objDB = mysql_select_db("dbhame");
      }
    }
    // สร้างโค้ด 
    $img = mysql_result(mysql_query("Select Max(substr(img_id,-4))+1 as MaxID from  imagehomeless"),0,"MaxID");
    if ($img==""){
      $img_id="I0001";
    }else{
      $img_id="I".sprintf("%04d","$img");
    }

    $new_hl = mysql_result(mysql_query("Select Max(substr(hl_code,-5))+1 as MaxID from  homeless"),0,"MaxID");
    if ($new_hl==""){
      $hl_idnew="HL00001";
    }else{
      $hl_idnew="HL".sprintf("%05d","$new_hl");
    }

    // นับจำนวนแถวของรายละเอียด
    $img_n = "";
    for($i=1;$i<=$line;$i++){
      $img_n .= $_POST["Column2_".$i.""];
      $img_n .= ",";
    }
    echo $img_n;
    //////////////// นับจำนวนแถวของไฟล์รูปภาพ
    $img_g ="";
    for($i=1;$i<=$line;$i++){
      $img_g .=$_FILES["filUpload".$i.""]["name"];
      $img_g .= ",";
    }
    echo "//////".$img_g;

    //*** Insert Record ***//
    $sqlimg = "INSERT INTO imagehomeless (img_id,img_name,img_type,hl_code) 
            VALUES ('$img_id','$img_n','$img_g','$img','$hl_idnew')";
    $dbqueryimg = mysql_query($sqlimg);

    $mcode = $_SESSION["mem_code"];
      //echo "$mcode";

    $strSQLhl = "INSERT INTO homeless (hl_code,hl_location) 
        VALUES ('$hl_idnew','".$_POST["autocomplete"]."')";
    $objQueryhl = mysql_query($strSQLhl);

    //echo $strSQLhl;

    $strSQLhldetail = "INSERT INTO homelessdetail (hl_code,mem_code,hldetail_nday) 
        VALUES ('$hl_idnew','$mcode','".$_POST["nday"]."')";
    $objQueryhldetail = mysql_query($strSQLhldetail);

    mysql_close();
?>