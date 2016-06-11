<?php
  include ("config.php") ;//เรียกใช้ไฟล์การเชื่อมต่อDATABASE SERVERและฐานข้อมูล
  include ("configs.php");
  include "checkstaff.php";

  // $_SESSION['hl']=$_GET['show_id'];
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
      LEFT JOIN trainingcenterdetail ON trainingcenterdetail.hl_code = homeless.hl_code
      LEFT JOIN trainingcenter ON trainingcenter.traincenter_code = trainingcenterdetail.traincenter_code
      LEFT JOIN course ON course.course_code = trainingcenter.course_code
      LEFT JOIN takecaredetail ON takecaredetail.hl_code = homeless.hl_code
      LEFT JOIN takecarestation ON takecarestation.tc_code = takecaredetail.tc_code
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
    <title>Home4Homeless | ้อมูลคนไร้ที่พึ่ง</title>
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
    
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
            <h2 class="margin-bottom-10">ค้นหารายงาน > ข้อมูลคนไร้ที่พึ่ง</h2>
            <form name="frmMain" id="frmMain" action="" class="templatemo-login-form" method="post">
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">
                    <input type="hidden" name="tccode" value="<?php echo $rs['traincenter_code'];?>"> 
                    <label for="">สถานะการเข้ารับบริการ</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs['hldetail_status'];?> </label>   <br>
                    <label for="">รหัสคนไร้ที่พึ่ง</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $show_id;?> </label>
                    &nbsp; &nbsp;&nbsp;<label for="">วันที่สำรวจ</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs['hldetail_date'];?> </label><br>
                    <label for="">สถานที่พบ</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs['hl_location'];?></label> <br>
                    <label for="">ประเภทคนไร้ที่พึ่ง</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs['th_name'];?></label> <br>
                    <label for="">ชื่อ-สกุล</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs['hl_fname'];?>    <?php echo $rs['hl_lname'];?> </label>
                    &nbsp; &nbsp;&nbsp;<label for="">เพศ</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs['hl_sex'];?></label> <br>
                    <label for="">เลขประจำตัวประชาชน</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs['hl_id'];?></label> <br>
                    <label for="">วัน/เดือน/ปี/เกิด</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs['hl_bday'];?></label> <br>
                    <label for="">ฃ่วงอายุ</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs['age_name'];?></label> 
                    &nbsp; &nbsp;&nbsp;<label for="">อาชีพเดิม</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs['lastjob_name'];?> </label><br>
                    <label for="">ระยะเวลาไร้บ้าน</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs['hldetail_period'];?></label>&nbsp; &nbsp;<label for="">วัน</label>
                    <br><label for="">ที่อยู่ภูมิลำเนา</label><br>
                    <label for="">บ้านเลขที่</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs2['n_num'];?></label>&nbsp; &nbsp;&nbsp;
                    <label for="">หมู่ที่</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs2['n_villno'];?></label>&nbsp; &nbsp;&nbsp;
                    <label for="">ตรอก/ซอย</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs2['n_alley'];?></label>&nbsp; &nbsp;&nbsp;
                    <label for="">ถนน</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs2['n_street'];?></label> <br>
                    <label for="">ตำบล</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs2['DISTRICT_NAME'];?></label>&nbsp; &nbsp;&nbsp;
                    <label for="">อำเภอ</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs2['AMPHUR_NAME'];?></label>&nbsp; &nbsp;&nbsp;
                    <label for="">จังหวัด</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs2['prov_name'];?></label> <br>
                    <label for="">ภูมิภาค</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs2['GEO_NAME'];?></label>
                    <br><label for="">ที่อยู่ปัจจุบัน</label><br>
                    <label for="">บ้านเลขที่</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs3['ad_num'];?></label>&nbsp; &nbsp;&nbsp;
                    <label for="">หมู่ที่</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs3['ad_villno'];?></label>&nbsp; &nbsp;&nbsp;
                    <label for="">ตรอก/ซอย</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs3['ad_alley'];?></label>&nbsp; &nbsp;&nbsp;
                    <label for="">ถนน</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs3['ad_street'];?></label> <br>
                    <label for="">ตำบล</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs3['DISTRICT_NAME'];?></label>&nbsp; &nbsp;&nbsp;
                    <label for="">อำเภอ</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs3['AMPHUR_NAME'];?></label>&nbsp; &nbsp;&nbsp;
                    <label for="">จังหวัด</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs3['prov_name'];?></label> <br>
                    <label for="">ภูมิภาค</label>
                    <label class="font-weight-400">&nbsp; &nbsp;<?php echo $rs3['GEO_NAME'];?></label> 
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
                <button  class="templatemo-white-button"><a href="editdata.php?show_id=<?php echo $show_id; ?>">แก้ไข</a></button>
                <button  class="templatemo-white-button"><a href="reporthl.php?show_id=<?php echo $show_id; ?>&&tc_code=<?php echo $rs['traincenter_code'];?>&&c_code=<?php echo $rs['course_code'];?>&&tk=<?php echo $rs['tc_code'];?>" target ='_blank'>พิมพ์</a></button>
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