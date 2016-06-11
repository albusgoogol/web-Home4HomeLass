<?php
  include ("config.php") ;//เรียกใช้ไฟล์การเชื่อมต่อDATABASE SERVERและฐานข้อมูล
  include ("configs.php");
  include "checkstaff.php";

  $_SESSION['hl']=$_GET['show_id'];
  $show_id=$_GET['show_id'];//รับค่าGETที่ส่งมาจากไฟล์โชว์
  $sql = "SELECT * FROM homeless
      INNER JOIN age ON age.age_code = homeless.age_code 
      INNER JOIN lastjob ON lastjob.lastjob_code = homeless.lastjob_code 
      LEFT JOIN address ON address.ad_code = homeless.ad_code 
      LEFT JOIN native ON native.n_code = homeless.n_code
      INNER JOIN homelessdetail ON homelessdetail.hl_code = homeless.hl_code 
      INNER JOIN members ON members.mem_code = homelessdetail.mem_code 
      INNER JOIN typehomelessdetail ON typehomelessdetail.hl_code = homeless.hl_code 
      INNER JOIN typehomeless ON typehomeless.th_id = typehomelessdetail.th_id 
      WHERE homeless.hl_code  = '$show_id' ";//เรียกข้อมูลจากฟอร์มโดยกำหนดเงื่อนไข
  $sql_query = mysql_query($sql); 
  $rs = mysql_fetch_array($sql_query);

  $sql2 = "SELECT * FROM native
      INNER JOIN district ON district.dis_code = native.dis_code
      INNER JOIN amphur ON amphur.am_code = native.am_code
      INNER JOIN province ON province.prov_code = native.prov_code
      INNER JOIN geography ON geography.GEO_ID = native.GEO_ID
      INNER JOIN homeless ON homeless.hl_code = native.hl_code
      WHERE native.hl_code ='$show_id' ";
  $sql_query2 = mysql_query($sql2);
  $rs2 = mysql_fetch_array($sql_query2);

  $sql3 = "SELECT * FROM address
      INNER JOIN district ON district.dis_code = address.dis_code
      INNER JOIN amphur ON amphur.am_code = address.am_code
      INNER JOIN province ON province.prov_code = address.prov_code
      INNER JOIN geography ON geography.GEO_ID = address.GEO_ID
      INNER JOIN homeless ON homeless.hl_code = address.hl_code
      WHERE address.hl_code = '$show_id' ";
  $sql_query3 = mysql_query($sql3);
  $rs3 = mysql_fetch_array($sql_query3);
  mysql_query("SET NAMES UTF8");
?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Home4Homeless | แก้ไขข้อมูลคนไร้ที่พึ่ง</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!-- 
    Visual Admin Template
    http://www.templatemo.com/preview/templatemo_455_visual_admin
    -->
    <link href='css/css.css' rel='stylesheet' type='text/css'> <!-- font -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
    <!--Datepicker-->
    <link rel="stylesheet" type="text/css" href="./css/datepicker.css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--   Script function AJAX  native  -->
         <script language=Javascript>
        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
           try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src,val) {
             var req = Inint_AJAX();
             req.onreadystatechange = function () { 
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
                       } 
                  }
             };
             req.open("GET","localtion.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('geography',-1);     
    </script>

    <!--   Script function AJAX  address  -->
         <script language=Javascript>
        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
           try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src,val) {
             var req = Inint_AJAX();
             req.onreadystatechange = function () { 
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
                       } 
                  }
             };
             req.open("GET","localtion.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('geography1',-1);     
    </script>

  </head>
  <body>  
    
    <!-- Left column --><br>
    <div class="text-right">
        <FONT size=2 COLOR="white"><?php echo $objResult['mem_fname'];?>  <?php echo $objResult['mem_lname'];?> (<?php echo $objResult['mem_status']; ?>) &nbsp; &nbsp;</FONT><br><br>
    </div>
    <header class="logo-header">
      <a><img src="images/logoweb2.png"></a>
      
    </header>
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <!--<header class="templatemo-site-header">
          <div class="square"></div>
          <h1>Visual Admin</h1>
        </header>
        <div class="profile-photo-container">
          <img src="images/profile-photo.jpg" alt="Profile Photo" class="img-responsive">  
          <div class="profile-photo-overlay"></div>
        </div>-->      
        <!-- Search box -->
        <!--<form class="templatemo-search-form" role="search">
          <div class="input-group">
              <button type="submit" class="fa fa-search"></button>
              <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">           
          </div>
        </form>-->
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="notification.php"><i class="fa fa-bell fa-fw"></i>รับแจ้งความช่วยเหลือ</a></li>
            <li><a href="record.php"><i class="fa fa-edit fa-fw"></i>บันทึกการเข้ารับบริการ</a></li>
            <li><a href="search.php"   class="active"><i class="fa fa-list-alt fa-fw"></i>ค้นหารายงาน</a></li>
            <li><a href="checkstatus.php"><i class="fa fa-list-alt fa-fw"></i>ตรวจสอบสถานะติดตาม</a></li>
            <li><a href="statistic.php"><i class="fa fa-bar-chart fa-fw"></i>สถิติ</a></li>
            <li><a href="act.php"><i class="fa fa-book fa-fw"></i>คำแนะนำ/ข้อควรปฏิบัติ</a></li>
            <li><a href="about.php"><i class="fa fa-envelope fa-fw"></i>ติดต่อหน่วยงาน</a></li>
            <li><a href="memstaff.php"><i class="fa fa-user fa-fw"></i>ข้อมูลส่วนตัว</a></li>
            <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>ออกจากระบบ</a></li>
          </ul>  
        </nav>
      </div>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">ค้นหารายงาน > ข้อมูลคนไร้ที่พึ่ง > แก้ไขข้อมูลคนไร้ที่พึ่ง</h2>
            <form name="frmMain" id="frmMain" action="db_editdata.php" class="templatemo-login-form" method="post">
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="fname">สถานะการเข้ารับบริการ *</label>
                    <input type="text" class="form-control" name="hldetailstatus" id="hldetailstatus" value="<?php echo $rs['hldetail_status']; ?>" disabled/>  
                    <input type="hidden" class="form-control" name="hldetails" id="hldetails" value="<?php echo $rs['hldetail_status']; ?>"/>                
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="fname">รหัสคนไร้ที่พึ่ง</label>
                    <input type="text" class="form-control" name="hlcode" id="hlcode" value="<?php echo "$show_id"; ?>" disabled/>  
                    <input type="hidden" class="form-control" name="hl" id="hl" value="<?php echo "$show_id"; ?>"/>                
                </div>
               </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="datepicker">วันที่สำรวจ *</label>
                    <input type="text" class="form-control" name="datepicker" id="datepicker1" data-provide="datepicker" data-date-language="th-th" value="<?php echo $rs['hldetail_date']; ?>" disabled/>
                    <input type="hidden" class="form-control" name="date" id="date"value="<?php echo $rs['hldetail_date']; ?>"/>                  
                </div>
                <div class="col-lg-6 col-md-6 form-group"> 
                  <label class="control-label templatemo-block" for="tpyehl">ประเภทคนไร้ที่พึ่ง *</label>                 
                  <select class="form-control" name="typehl" id="typehl">
                    <?php  
                  $sql3="SELECT * from typehomeless ";  
                  $query3=mysql_query($sql3); 
                  while($rst3=mysql_fetch_array($query3)){ 
                    if($rst3['th_id']==$rs['th_id'])
                      $selhl='selected';
                    else $selhl=''; 
              ?>
                <option value="<?=$rst3['th_id']?>" <?=$selhl;?> ><?=$rst3['th_name'] ?></option>
              <?php 
                  }; 
              ?>                    
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="place">สถานที่พบ *</label>
                    <input type="text" class="form-control" name="place" id="place" value="<?php echo $rs['hl_location']; ?>" disabled/>                  
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-12 form-group">   
                    <label class="control-label templatemo-block">เพศ *</label>                 
                    <div class="margin-right-15 templatemo-inline-block">
                    <?php $rdo="";
                if (isset ($rs['hl_sex'])){$rdo=$rs['hl_sex'];}?>
                      <input type="radio" name="sex" id="sex1" value="ชาย" <?php if($rdo=="ชาย")echo "checked"; ?>>
                      <label for="sex1" class="font-weight-400"><span></span>ชาย</label>
                    </div>
                    <div class="margin-right-15 templatemo-inline-block">
                      <input type="radio" name="sex" id="sex2" value="หญิง" <?php if($rdo=="หญิง")echo "checked"; ?>>
                      <label for="sex2" class="font-weight-400"><span></span>หญิง</label>
                    </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="fname">ชื่อ</label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="ชื่อ" value="<?php echo $rs['hl_fname']; ?>">                  
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="lname">นามสกุล</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="นามสกุล" value="<?php echo $rs['hl_lname']; ?>">                  
                </div> 
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="hlid">เลขประจำตัวประชาชน</label>
                    <input type="text" class="form-control" name="hlid" id="hlid" placeholder="เลขประจำตัวประชาชน 13 หลัก" maxlength="13" value="<?php echo $rs['hl_id']; ?>">                  
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="datepicker2">วัน/เดือน/ปี เกิด</label>
                    <script type="text/javascript">
                      function demo() {
                        $('.datepicker2').datepicker({
                        format: 'dd-mm-yyyy'
                       });
                     }
                    </script>
                    <input type="text" class="form-control" name="bday" id="datepicker2" data-provide="datepicker" data-date-language="th-th" value="<?php echo $rs['hl_bday']; ?>">                  
                </div> 
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group"> 
                  <label class="control-label templatemo-block" for="age">ช่วงอายุ *</label>                 
                  <select class="form-control" name="age" id="age">
                   <?php  
                  $sql1="SELECT * from age ";  
                  $query1=mysql_query($sql1); 
                  while($rst1=mysql_fetch_array($query1)){ 
                    if($rst1['age_code']==$rs['age_code'])
                      $selage='selected';
                    else $selage=''; 
                  ?>
                <option value="<?=$rst1['age_code']?>" <?=$selage;?> ><?=$rst1['age_name']?></option>
              <?php 
                  }; 
              ?>            
                  </select>
                </div>
                <div class="col-lg-6 col-md-6 form-group"> 
                  <label class="control-label templatemo-block" for="job">อาชีพเดิม</label>                 
                  <select class="form-control" name="job" id="job">
                    <?php  
                  $sql2="SELECT * from lastjob ";  
                  $query2=mysql_query($sql2); 
                  while($rst2=mysql_fetch_array($query2)){ 
                    if($rst2['lastjob_code']==$rs['lastjob_code'])
                      $seljob='selected';
                    else $seljob=''; 
                  ?>
                  <option value="<?=$rst2['lastjob_code']?>" <?=$seljob;?> ><?=$rst2['lastjob_name']?></option>
                <?php 
                    }; 
                ?>                   
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="period">ระยะเวลาไร้บ้าน (ประมาณ/วัน)</label>
                    <input type="text" class="form-control" name="period" id="period" value="<?php echo $rs['hldetail_period']; ?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>ที่อยู่ภูมิลำเนา</label>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="num">เลขที่</label>
                    <input type="text" class="form-control" name="num" id="num" value="<?php echo $rs2['n_num']; ?>">
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="villno">หมู่ที่</label>
                    <input type="text" class="form-control" name="villno" id="villno" value="<?php echo $rs2['n_villno']; ?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="alley">ตรอก/ซอย</label>
                    <input type="text" class="form-control" name="alley" id="alley" value="<?php echo $rs2['n_alley']; ?>">
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="street">ถนน</label>
                    <input type="text" class="form-control" name="street" id="street" value="<?php echo $rs2['n_street']; ?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="geography">ภูมิภาค</label>
                    <span id="geography">
                      <select class="form-control " name="geography" id="geography">
                        <option value="0">-เลือกภูมิภาค -</option>

                      </select>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="province">จังหวัด</label>
                    <span id="province">
                      <select class="form-control " name="province" id="province">
                          <?php 
                            $result=mysql_query("SELECT * FROM province WHERE GEO_ID = '".$rs2['GEO_ID']."' ");
                            while($row = mysql_fetch_array($result)){
                              if($row['prov_code']==$rs2['prov_code'])
                              $selprov='selected';
                              else $selprov='';
                              echo "<option value='$row[prov_code]' $selprov >$row[prov_name]</option> " ;
                            }
                          ?>
                      </select>
                    </span>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="amphur">อำเภอ</label>
                    <span id="amphur">
                      <select class="form-control " name="amphur" id="amphur">
                          <?php 
                            $result=mysql_query("SELECT * FROM amphur WHERE prov_code = '".$rs2['prov_code']."' ");
                            while($row = mysql_fetch_array($result)){
                              if($row['am_code']==$rs2['am_code'])
                              $selam='selected';
                              else $selam='';
                              echo "<option value='$row[am_code]' $selam >$row[AMPHUR_NAME]</option> " ;
                            }
                          ?>
                      </select>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="district">ตำบล</label>
                    <span id="district">
                      <select class="form-control " name="district" id="district">
                        <?php 
                            $result=mysql_query("SELECT * FROM district WHERE am_code = '".$rs2['am_code']."' ");
                            while($row = mysql_fetch_array($result)){
                              if($row['dis_code']==$rs2['dis_code'])
                              $seldis='selected';
                              else $seldis='';
                              echo "<option value='$row[dis_code]' $seldis >$row[DISTRICT_NAME]</option> " ;
                            }
                          ?>
                      </select>
                    </span>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>ที่อยู่ปัจจุบัน</label>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="num1">เลขที่</label>
                    <input type="text" class="form-control" name="num1" id="num1" value="<?php echo $rs3['ad_num']; ?>">
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="villno1">หมู่ที่</label>
                    <input type="text" class="form-control" name="villno1" id="villno1" value="<?php echo $rs3['ad_villno']; ?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="alley1">ตรอก/ซอย</label>
                    <input type="text" class="form-control" name="alley1" id="alley1" value="<?php echo $rs3['ad_alley']; ?>">
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="street1">ถนน</label>
                    <input type="text" class="form-control" name="street1" id="street1" value="<?php echo $rs3['ad_street']; ?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="geography1">ภูมิภาค</label>
                    <span id="geography1">
                      <select class="form-control " name="geography1" id="geography1">
                           
                      </select>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="province1">จังหวัด</label>
                    <span id="province1">
                      <select class="form-control " name="province1" id="province1">
                        <?php 
                            $result=mysql_query("SELECT * FROM province WHERE GEO_ID = '".$rs3['GEO_ID']."' ");
                            while($row = mysql_fetch_array($result)){
                              if($row['prov_code']==$rs3['prov_code'])
                              $selprov1='selected';
                              else $selprov1='';
                              echo "<option value='$row[prov_code]' $selprov1 >$row[prov_name]</option> " ;
                            }
                          ?>
                      </select>
                    </span>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="amphur1">อำเภอ</label>
                    <span id="amphur1">
                      <select class="form-control " name="amphur1" id="amphur1">
                        <?php 
                            $result=mysql_query("SELECT * FROM amphur WHERE prov_code = '".$rs3['prov_code']."' ");
                            while($row = mysql_fetch_array($result)){
                              if($row['am_code']==$rs3['am_code'])
                              $selam1='selected';
                              else $selam1='';
                              echo "<option value='$row[am_code]' $selam1 >$row[AMPHUR_NAME]</option> " ;
                            }
                          ?>
                      </select>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="district1">ตำบล</label>
                    <span id="district1">
                      <select class="form-control " name="district1" id="district1">
                        <?php 
                            $result=mysql_query("SELECT * FROM district WHERE am_code = '".$rs3['am_code']."' ");
                            while($row = mysql_fetch_array($result)){
                              if($row['dis_code']==$rs3['dis_code'])
                              $seldis1='selected';
                              else $seldis1='';
                              echo "<option value='$row[dis_code]' $seldis1 >$row[DISTRICT_NAME]</option> " ;
                            }
                          ?>
                      </select>
                    </span>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label class="control-label templatemo-block">สาเหตุ(ตอบได้มากกว่า 1 ข้อ)</label>
                    <div class="templatemo-block margin-bottom-5">
                    <?php

                      $sqlcause ="SELECT * FROM cause";
                      $resultcause = mysql_query($sqlcause);
    
                      $sqlcausedetail = "SELECT * FROM causedetail           
                                    WHERE causedetail.hl_code = '$show_id' "; 
                      $resultcausedetail = mysql_query($sqlcausedetail); 
      
                      $types = array();
                      while(($row1 =  mysql_fetch_array($resultcausedetail))) {
                        $types[] = $row1['cause_code'];
                      }
         
       
                      $i=0;
                      while ($row = mysql_fetch_object($resultcause)) {       

                        if($row->cause_code == $types[$i]){
                          echo "<p value='$row->cause_code'></p> ";
                          ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<label for='$row->cause_code' class='font-weight-400'><span></span>$row->cause_name</label> <br/>";
                         if($i<sizeof($types)-1){
                            $i++;
                          }
                        }/*else{
                          echo "<input type='checkbox' name='cause' id='$row->cause_code' value='$row->cause_code'> ";
                          echo "<label for='$row->cause_code' class='font-weight-400'><span></span>$row->cause_name</label> <br/>"; 
                        }*/
                      }
                     ?>
                 </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label class="control-label templatemo-block">สภาพปัจจุบัน(ตอบได้มากกว่า 1 ข้อ)</label>
                    <div class="templatemo-block margin-bottom-5">
                    <?php

                      $sqlcause ="SELECT * FROM statusphysical";
                      $resultcause = mysql_query($sqlcause);
    
                      $sqlcausedetail = "SELECT * FROM statusdetail           
                                    WHERE statusdetail.hl_code = '$show_id' "; 
                      $resultcausedetail = mysql_query($sqlcausedetail); 
      
                      $types = array();
                      while(($row1 =  mysql_fetch_array($resultcausedetail))) {
                        $types[] = $row1['status_id'];
                      }
         
       
                      $i=0;
                      while ($row = mysql_fetch_object($resultcause)) {       

                        if($row->status_id == $types[$i]){
                          echo "<p value='$row->status_id'></p> ";
                          //echo "<input type='checkbox' name='status' id='$row->status_id' value='$row->status_id' checked> ";
                          ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<label for='$row->status_id' class='font-weight-400'><span></span>$row->status_name</label> <br/>";
                          if($i<sizeof($types)-1){
                             $i++;
                          }
                        }/*else{
                          echo "<input type='checkbox' name='status' id='$row->status_id' value='$row->status_id'> ";
                          echo "<label for='$row->status_id' class='font-weight-400'><span></span>$row->status_name</label> <br/>"; 
                        }*/
                      }
                     ?>
                 </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label class="control-label templatemo-block">ความต้องการให้รัฐช่วยเหลือ(ตอบได้มากกว่า 1 ข้อ)</label>
                    <div class="templatemo-block margin-bottom-5">
                    <?php

                      $sqlcause ="SELECT * FROM typeservice";
                      $resultcause = mysql_query($sqlcause);
    
                      $sqlcausedetail = "SELECT * FROM typeservicedetail           
                                    WHERE typeservicedetail.hl_code = '$show_id' "; 
                      $resultcausedetail = mysql_query($sqlcausedetail); 
      
                      $types = array();
                      while(($row1 =  mysql_fetch_array($resultcausedetail))) {
                        $types[] = $row1['tservice_code'];
                      }
         
       
                      $i=0;
                      while ($row = mysql_fetch_object($resultcause)) {       

                        if($row->tservice_code == $types[$i]){
                          echo "<p value='$row->tservice_code'></p> ";
                          //echo "<input type='checkbox' name='service' id='$row->tservice_code' value='$row->tservice_code' checked> ";
                          ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<label for='$row->tservice_code' class='font-weight-400'><span></span>$row->tservice_name</label> <br/>";
                          if($i<sizeof($types)-1){
         $i++;
        }
                        }/*else{
                          echo "<input type='checkbox' name='service' id='$row->tservice_code' value='$row->tservice_code'> ";
                          echo "<label for='$row->tservice_code' class='font-weight-400'><span></span>$row->tservice_name</label> <br/>"; 
                        }*/
                      }
                     ?>
                 </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-12">
                  <label class="control-label templatemo-block">รูปภาพ</label>
                  <?php 
                    $sqlimghl = "SELECT * FROM imagehomeless
                                  INNER JOIN homeless ON homeless.hl_code = imagehomeless.hl_code
                                  WHERE imagehomeless.hl_code = '$show_id' ";
                    $objqueryimg = mysql_query($sqlimghl);
              
                    ?> 
                    <table>
                      <tr>
                    <?php 
                      while ($rsimg = mysql_fetch_array($objqueryimg)){
                        echo "<td width='120'><div align='center'>$rsimg[img_type]</div></td>";
                        echo "<td><img src= 'images/imghl/".$rsimg['img_name']."' style='width:150px; height:100px;'  border=0 />&nbsp;&nbsp; </td>"; 
                     
                    } ?>
                    </tr>
                  
                    </table>
                    
                 
                                  
                </div>
              </div>
              <!--<div class="row form-group">
                <div class="col-lg-12">
                  <label class="control-label templatemo-block">อัปโหลดรูปประจำตัว</label>-->
                  <!-- <input type="file" name="fileToUpload" id="fileToUpload" class="margin-bottom-10"> -->
                  <!--<input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false">
                  <p>Maximum upload size is 5 MB.</p>                  
                </div>
              </div>--> 
              <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">บันทึก</button>
            </div>                          
            </form>
          </div>
          <footer class="text-right">
            <p>Home4Homeless &copy; 2015 ICT50 </p>
          </footer>
        </div>
      </div>
    </div>
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>        <!-- jQuery -->
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>  <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>        <!-- Templatemo Script -->

    <!-- Datepicker -->
    <script type="text/javascript" src="./js/bootstrap-datepicker.js"></script>
    <!-- thai extension -->
    <script type="text/javascript" src="./js/bootstrap-datepicker-thai.js"></script>
    <script type="text/javascript" src="./js/locales/bootstrap-datepicker.th.js"></script>
  </body>
</html>