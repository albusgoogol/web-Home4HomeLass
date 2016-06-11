<?php
  include "config.php";
  include "checkstaff.php";
  mysql_query("SET NAMES UTF8");


  $hlin_id = $_POST['hlin_id'];
  $location = $_POST['location'];
  $day = $_POST['datepicker'];
  $typehl = $_POST['typehl'];
  $sex = $_POST['sex'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $id = $_POST['hlid'];
  $bday = $_POST['bday'];
  $age = $_POST['age'];
  $job = $_POST['job'];
  $period = $_POST['period'];
  $geography = $_POST['geography'];
  $num = $_POST['num'];
  $villno = $_POST['villno'];
  $alley = $_POST['alley'];
  $street = $_POST['street'];
  $province = $_POST['province'];
  $amphur = $_POST['amphur'];
  $district = $_POST['district'];
  $geography1 = $_POST['geography1'];
  $num1 = $_POST['num1'];
  $villno1 = $_POST['villno1'];
  $alley1 = $_POST['alley1'];
  $street1 = $_POST['street1'];
  $province1 = $_POST['province1'];
  $amphur1 = $_POST['amphur1'];
  $district1 = $_POST['district1'];
  //echo "$fname";
?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Home4Homeless | บันทึกการเข้ารับบริการจากการรับแจ้ง</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!-- 
    Visual Admin Template
    http://www.templatemo.com/preview/templatemo_455_visual_admin
    -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
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
              <input type="text" class="form-control" placeholder="ค้นหา" name="srch-term" id="srch-term">           
          </div>
        </form>-->
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="notification.php"  class="active"><i class="fa fa-bell fa-fw"></i>รับแจ้งความช่วยเหลือ</a></li>
            <li><a href="record.php"><i class="fa fa-edit fa-fw"></i>บันทึกการเข้ารับบริการ</a></li>
            <li><a href="search.php"><i class="fa fa-list-alt fa-fw"></i>ค้นหารายงาน</a></li>
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
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="notfyaccept.php"class="active">จากการรับแจ้ง</a></li>
                <!--<li><a href="records.php">ติดต่อเจ้าหน้าที่โดยตรง</a></li>-->
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">แบบบันทึกการเข้ารับบริการ > จากการรับแจ้งขอความช่วยเหลือ (ต่อ)</h2>
            <form name="frmMain" id="frmMain" action="db_notfyaccept.php" class="templatemo-login-form" method="post">
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">     
                    <label class="control-label templatemo-block">สาเหตุ *(ตอบได้มากกว่า 1 ข้อ)</label>  
                       
                      <div class="templatemo-block margin-bottom-5">
                        <?php


                          $strSQL = "SELECT * FROM cause ORDER BY cause_code ASC";
                          $objQuery = mysql_query($strSQL);
                          while($objResult = mysql_fetch_array($objQuery))
                          {
                        ?>
                        <input type="checkbox" name="cause[<?=$objResult["cause_code"]?>]" id="cause[<?=$objResult["cause_code"]?>]" value="<?php echo $objResult["cause_code"];?>" > 
                        <label for="cause[<?=$objResult["cause_code"]?>]" class="font-weight-400"><span></span><?php echo $objResult["cause_name"];?></label> <br/>
                      <?php  
                      }  
                      ?>
                      <input type="text" class="form-control" id="causedescrip" name="causedescrip" placeholder="ระบุ">
                      </div>
                </div> 
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">     
                    <label class="control-label templatemo-block">สภาพปัจจุบัน *(ตอบได้มากกว่า 1 ข้อ)</label>       
                      <div class="templatemo-block margin-bottom-5">
                        <?php

                          $strSQL1 = "SELECT * FROM statusphysical ORDER BY status_id ASC";
                          $objQuery1 = mysql_query($strSQL1);
                          while($objResult1 = mysql_fetch_array($objQuery1))
                          {
                        ?>
                        <input type="checkbox" name="status[<?=$objResult1["status_id"]?>]" id="status[<?=$objResult1["status_id"]?>]" value="<?php echo $objResult1["status_id"];?>" /> 
                        <label for="status[<?=$objResult1["status_id"]?>]" class="font-weight-400"><span></span><?php echo $objResult1["status_name"];?></label> <br/>
                      <?php  
                      }  
                      ?>
                      <input type="text" class="form-control" id="statusdescrip" name="statusdescrip" placeholder="ระบุ">
                      </div>
                </div> 
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">     
                    <label class="control-label templatemo-block">ความต้องการให้รัฐช่วยเหลือ *(ตอบได้มากกว่า 1 ข้อ)</label>       
                      <div class="templatemo-block margin-bottom-5">
                        <?php

                          $strSQL2 = "SELECT * FROM typeservice ORDER BY tservice_code ASC";
                          $objQuery2 = mysql_query($strSQL2);
                          while($objResult2 = mysql_fetch_array($objQuery2))
                          {
                        ?>
                        <input type="checkbox" name="tservice[<?=$objResult2["tservice_code"]?>]" id="tservice[<?=$objResult2["tservice_code"]?>]" value="<?php echo $objResult2["tservice_code"];?>" > 
                        <label for="tservice[<?=$objResult2["tservice_code"]?>]" class="font-weight-400"><span></span><?php echo $objResult2["tservice_name"];?></label> <br/>
                      <?php  
                      }  
                      ?>
                      <input type="text" class="form-control" id="tservicedescrip" name="tservicedescrip" placeholder="ระบุ">
                      </div>
                </div> 
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">รูปภาพ</label>  
                  <div class="table-responsive">

                  <?php 
                    $sqlimghl = "SELECT * FROM imagehomeless
                                INNER JOIN homelessinform ON homelessinform.hlin_id = imagehomeless.hlin_id
                                WHERE imagehomeless.hlin_id = '$hlin_id' ";
                    $objqueryimg = mysql_query($sqlimghl);
                  ?>
                    <tbody>
                       <tr>
                  <?php 
                      while ($rsimg = mysql_fetch_array($objqueryimg)){ ?>
                        <input name='imgid' value="<?php echo $rsimg['hlin_id']; ?>" type='hidden' class='form-control'>&nbsp;&nbsp;<?php 
                        echo "<td><input name='imgtype' VALUE=".$rsimg['img_type']." type='text' class='form-control' disabled>&nbsp;&nbsp;</td> <br/>";
                        echo "<td><img src= 'images/imghl/".$rsimg['img_name']."' name='imgname' style='width:150px; height:100px;'  border=0 />&nbsp;&nbsp; </td> <br/>"; 
                     
                    } ?>
                      </tr>
                    </tbody>
                     
               
                  </div>
                </div>
              </div>

              <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">บันทึก</button>
                <button type="reset" class="templatemo-white-button">ยกเลิก</button>

                <input type="hidden" name="hlin_id" value="<?php echo $hlin_id?>">
                <input type="hidden" name="day" value="<?php echo $day?>">
                <input type="hidden" name="typehl" value="<?php echo $typehl?>">
                <input type="hidden" name="sex" value="<?php echo $sex?>">
                <input type="hidden" name="fname" value="<?php echo $fname;?>">
                <input type="hidden" name="lname" value="<?php echo $lname;?>">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="hidden" name="bday" value="<?php echo $bday?>">
                <input type="hidden" name="age" value="<?php echo $age?>">
                <input type="hidden" name="job" value="<?php echo $job?>">
                <input type="hidden" name="period" value="<?php echo $period?>">
                <input type="hidden" name="geography" value="<?php echo $geography?>">
                <input type="hidden" name="num" value="<?php echo $num?>">
                <input type="hidden" name="villno" value="<?php echo $villno?>">
                <input type="hidden" name="alley" value="<?php echo $alley?>">
                <input type="hidden" name="street" value="<?php echo $street?>">
                <input type="hidden" name="province" value="<?php echo $province?>">
                <input type="hidden" name="amphur" value="<?php echo $amphur?>">
                <input type="hidden" name="district" value="<?php echo $district?>">
                <input type="hidden" name="geography1" value="<?php echo $geography1?>">
                <input type="hidden" name="num1" value="<?php echo $num1?>">
                <input type="hidden" name="villno1" value="<?php echo $villno1?>">
                <input type="hidden" name="alley1" value="<?php echo $alley1?>">
                <input type="hidden" name="street1" value="<?php echo $street1?>">
                <input type="hidden" name="province1" value="<?php echo $province1?>">
                <input type="hidden" name="amphur1" value="<?php echo $amphur1?>">
                <input type="hidden" name="district1" value="<?php echo $district1?>">
                <input type="hidden" name="location" value="<?php echo $location?>">
                 
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