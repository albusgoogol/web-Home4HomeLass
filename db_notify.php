<?php 
	include"config.php";
	include "checkpop.php";


    
    $mcode = $_SESSION["mem_code"];
  		//echo "$mcode";


    $hlin = mysql_result(mysql_query("Select Max(substr(hlin_id,-9))+1 as MaxID from  homelessinform"),0,"MaxID");
    if ($hlin==""){
      $hlin_id="H000000001";
    }else{
      $hlin_id="H".sprintf("%09d","$hlin");
    }

	$strSQLhl = "INSERT INTO homelessinform (hlin_id,hlin_date,hlin_location,hlin_status,mem_code) 
				VALUES ('$hlin_id','".$_POST['nday']."','".$_POST["autocomplete"]."','แจ้งขอความช่วยเหลือ','$mcode')";
	$objQueryhl = mysql_query($strSQLhl);

		//echo $strSQLhl;

	

	$line2=$_POST['hdnMaxLine'];
  	for($i=1;$i<=$line2;$i++){

  		$img = mysql_result(mysql_query("Select Max(substr(img_id,-4))+1 as MaxID from  imagehomeless"),0,"MaxID");
    if ($img==""){
      $img_id="I0001";
    }else{
      $img_id="I".sprintf("%04d","$img");
    }
    
		if(trim($_FILES["filUpload".$i.""]["tmp_name"]) != "")
  		{
		    $images = $_FILES["filUpload".$i.""]["tmp_name"];
		    $new_images = "Thumbnails_".$_FILES["filUpload".$i.""]["name"];
		    $pho_d = $_POST["Column2_".$i.""];
		    copy($_FILES["filUpload".$i.""]["tmp_name"],"images/imghl/".$_FILES["filUpload".$i.""]["name"]);
		    $width=500; //*** Fix Width & Heigh (Autu caculate) ***//
		    $size=GetimageSize($images);
		    $height=round($width*$size[1]/$size[0]);
		    $images_orig = ImageCreateFromJPEG($images);
		    $photoX = ImagesX($images_orig);
		    $photoY = ImagesY($images_orig);
		    $images_fin = ImageCreateTrueColor($width, $height);
		    ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
		    ImageJPEG($images_fin,"images/imghl/".$new_images);
		    ImageDestroy($images_orig);
		    ImageDestroy($images_fin);

		    // echo $new_images;
		    // echo $pho_d;
    		//*** Insert Record ***//

    		$strpho = "INSERT INTO imagehomeless (img_id,img_name,img_type,hlin_id) VALUES ('$img_id','".$new_images."','".$pho_d."','$hlin_id')";
  
    		$objQuerypho = mysql_query($strpho);

    		
  		}
	}


	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
	echo "<script type='text/javascript'>alert('แจ้งขอความช่วยเหลือสำเร็จ!')</script>";
	echo "<script>window.location='notify.php'</script>";

	mysql_close();
?>