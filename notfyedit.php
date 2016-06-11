<?php 
  include "config.php";
  include "configs.php";
 include "checkstaff.php";

  $show_id=$_GET['show_id'];//รับค่าGETที่ส่งมาจากไฟล์โชว์
  $sqlhomeless = "SELECT * FROM homeless
                  WHERE homeless.hl_code = '$show_id'";
  $queryhl = mysql_query($sqlhomeless); 
  $rshl = mysql_fetch_array($queryhl);

?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Home4Homeless | แก้ไขการรับแจ้งความช่วยเหลือ</title>
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
             req.open("GET","location.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('geography',-1);     
    </script>
    <!--   Script function AJAX  Address  -->
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
             req.open("GET","location.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('geography1',-1);     
    </script>
    <script language="javascript">
        function fncSubmit()
        {
          
          if(document.frmMain.typehl.value == "")
          {
            alert('กรุณากรอกประเภทคนไร้ที่พึ่ง');
            document.frmMain.typehl.focus();    
            return false;
          } 
  
        }
      </script>
  
    

  </head>
  <body>  
    <!-- Left column -->
    <header class="logo-header">
    <a><img src="images/logoweb2.png"></a>
      <div class="text-right">
        <FONT COLOR="white"><?php echo $objResult['mem_fname'];?>  <?php echo $objResult['mem_lname'];?> (<?php echo $objResult['mem_status']; ?>) &nbsp; &nbsp;</FONT><br><br>
      </div>
    </header>
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        
          <!--<img src="images/logopng.png" alt="home4homeless" class="img-responsive">-->
        
        <!--<div class="profile-photo-container">
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
            <li><a href="notification.php" class="active"><i class="fa fa-bell fa-fw"></i>รับแจ้งความช่วยเหลือ</a></li>
            <li><a href="record.php"><i class="fa fa-edit fa-fw"></i>บันทึกรายงาน</a></li>
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
        
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">แก้ไขการรับแจ้งความช่วยเหลือ</h2>
            <form name="frmMain" id="frmMain" action="db_notfyedit.php" class="templatemo-login-form" method="post" onSubmit="JavaScript:return fncSubmit();">
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="datepicker">วันที่สำรวจ *</label>
                    <?php  
                      $_month_name = array("01"=>"มกราคม",  "02"=>"กุมภาพันธ์",  "03"=>"มีนาคม",    
                                    "04"=>"เมษายน",  "05"=>"พฤษภาคม",  "06"=>"มิถุนายน",    
                                    "07"=>"กรกฎาคม",  "08"=>"สิงหาคม",  "09"=>"กันยายน",    
                                    "10"=>"ตุลาคม", "11"=>"พฤศจิกายน",  "12"=>"ธันวาคม"); 
 
                      $vardate=date('Y-m-d');
                      $yy=date('Y');
                      $mm =date('m');$dd=date('d'); 
                      if ($dd<10){
                        $dd=substr($dd,1,2);
                      }
                      $date=$dd ."/".$mm."/".$yy+= 543;
                      //echo $date;
                    ?>
                    <input type="text" class="form-control" name="day" id="day" value="<?php echo $date?>" disabled/>
                    <input type="hidden" class="form-control" name="today" id="today" value="<?php echo $date?>"/>   
                    <input type="hidden" class="form-control" name="hl" id="hl" value="<?php echo "$show_id"; ?>"/> 

                </div>
                <div class="col-lg-6 col-md-6 form-group"> 
                  <label class="control-label templatemo-block" for="tpyehl">ประเภทคนไร้ที่พึ่ง *</label>                 
                  <select class="form-control" name="typehl" id="typehl">
                    <option value="">-- เลือกประเภทคนไร้ที่พึ่ง --</option>
                    <?php

                      $strSQL1 = "SELECT * FROM typehomeless ORDER BY th_id ASC";
                      $objQuery1 = mysql_query($strSQL1);
                      while($objResuut1 = mysql_fetch_array($objQuery1))
                      {
                      ?>
                      <option value="<?php echo $objResuut1["th_id"];?>"><?php echo $objResuut1["th_name"];?></option>
                      <?php
                      }
                      ?>                      
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="place">สถานที่พบ *</label>
                    <input type="text" name="place" id="place"class="form-control" value="<?php echo $rshl['hl_location'];?>" disabled></input>  
                    <input type="hidden" name="place1" id="place1" value="<?php echo $rshl['hl_location'];?>"></input>            
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-12 form-group">   
                    <label class="control-label templatemo-block">เพศ *</label>                 
                    <div class="margin-right-15 templatemo-inline-block">
                      <input type="radio" name="sex" id="sex1" value="ชาย" checked>
                      <label for="sex1" class="font-weight-400"><span></span>ชาย</label>
                    </div>
                    <div class="margin-right-15 templatemo-inline-block">
                      <input type="radio" name="sex" id="sex2" value="หญิง">
                      <label for="sex2" class="font-weight-400"><span></span>หญิง</label>
                    </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="fname">ชื่อ</label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="ชื่อ" >                  
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="lname">นามสกุล</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="นามสกุล" >                  
                </div> 
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="hlid">เลขประจำตัวประชาชน</label>
                    <input type="text" class="form-control" name="hlid" id="hlid" placeholder="เลขประจำตัวประชาชน 13 หลัก">                  
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
                    <input type="text" class="form-control" name="bday" id="datepicker2" data-provide="datepicker" data-date-language="th-th" placeholder="วว/ดด/ปปปป">                  
                </div> 
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group"> 
                  <label class="control-label templatemo-block" for="age">ช่วงอายุ *</label>                 
                  <select class="form-control" name="age" id="age" required>
                    <option value="">-- เลือกช่วงอายุ --</option>
                    <?php

                    $strSQL2 = "SELECT * FROM age ORDER BY age_code ASC";
                    $objQuery2 = mysql_query($strSQL2);
                    while($objResuut2 = mysql_fetch_array($objQuery2))
                    {
                    ?>
                    <option value="<?php echo $objResuut2["age_code"];?>"><?php echo $objResuut2["age_name"];?></option>
                    <?php
                    }
                    ?>                      
                  </select>
                </div>
                <div class="col-lg-6 col-md-6 form-group"> 
                  <label class="control-label templatemo-block" for="job">อาชีพเดิม *</label>                 
                  <select class="form-control" name="job" id="job" required>
                    <option value="">-- เลือกอาชีพเดิม --</option>
                    <?php

                    $strSQL3 = "SELECT * FROM lastjob ORDER BY lastjob_code ASC";
                    $objQuery3 = mysql_query($strSQL3);
                    while($objResuut3 = mysql_fetch_array($objQuery3))
                    {
                    ?>
                    <option value="<?php echo $objResuut3["lastjob_code"];?>"><?php echo $objResuut3["lastjob_name"];?></option>
                    <?php
                    }
                    ?>                      
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="period">ระยะเวลาไร้บ้าน (ประมาณ/วัน)</label>
                    <input type="text" class="form-control" name="period" id="period" placeholder="">
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
                    <input type="text" class="form-control" name="num" id="num" placeholder="เลขที่">
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="villno">หมู่ที่</label>
                    <input type="text" class="form-control" name="villno" id="villno" placeholder="หมู่ที่">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="alley">ตรอก/ซอย</label>
                    <input type="text" class="form-control" name="alley" id="alley" placeholder="ตรอกหรือซอย">
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="street">ถนน</label>
                    <input type="text" class="form-control" name="street" id="street" placeholder="ถนน">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="geography">ภูมิภาค</label>
                    <span id="geography">
                      <select class="form-control " name="geography" id="geography">
                        <option value='0' >-- เลือกภูมิภาค --</option>   
                      </select>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="province">จังหวัด</label>
                    <span id="province">
                      <select class="form-control " name="province" id="province">
                        <option value='0' >-- เลือกจังหวัด --</option>   
                      </select>
                    </span>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="amphur">อำเภอ</label>
                    <span id="amphur">
                      <select class="form-control " name="amphur" id="amphur">
                        <option value='0' >-- เลือกอำเภอ --</option>   
                      </select>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="district">ตำบล</label>
                    <span id="district">
                      <select class="form-control " name="district" id="district">
                        <option value='0' >-- เลือกตำบล --</option>   
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
                    <input type="text" class="form-control" name="num1" id="num1" placeholder="เลขที่">
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="villno1">หมู่ที่</label>
                    <input type="text" class="form-control" name="villno1" id="villno1" placeholder="หมู่ที่">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="alley1">ตรอก/ซอย</label>
                    <input type="text" class="form-control" name="alley1" id="alley1" placeholder="ตรอกหรือซอย">
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="street1">ถนน</label>
                    <input type="text" class="form-control" name="street1" id="street1" placeholder="ถนน">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="geography1">ภูมิภาค</label>
                    <span id="geography1">
                      <select class="form-control " name="geography1" id="geography1">
                        <option value='0' >-- เลือกภูมิภาค --</option>   
                      </select>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="province1">จังหวัด</label>
                    <span id="province1">
                      <select class="form-control " name="province1" id="province1">
                        <option value='0' >-- เลือกจังหวัด --</option>   
                      </select>
                    </span>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="amphur1">อำเภอ</label>
                    <span id="amphur1">
                      <select class="form-control " name="amphur1" id="amphur1">
                        <option value='0' >-- เลือกอำเภอ --</option>   
                      </select>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="district1">ตำบล</label>
                    <span id="district1">
                      <select class="form-control " name="district1" id="district1">
                        <option value='0' >-- เลือกตำบล --</option>   
                      </select>
                    </span>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">     
                    <label class="control-label templatemo-block">สาเหตุ(ตอบอย่างน้อย 1 ข้อ)</label>       
                      <div class="templatemo-block margin-bottom-5">
                        <?php

                          $strSQLc = "SELECT * FROM cause ORDER BY cause_code ASC";
                          $objQueryc = mysql_query($strSQLc);
                          while($objResultc = mysql_fetch_array($objQueryc))
                          {
                        ?>
                        <input type="checkbox" name="cause[<?=$objResultc["cause_code"]?>]" id="cause[<?=$objResultc["cause_code"]?>]" value="<?php echo $objResultc["cause_code"];?>" /> 
                        <label for="cause[<?=$objResultc["cause_code"]?>]" class="font-weight-400"><span></span><?php echo $objResultc["cause_name"];?></label> <br/>
                      <?php  
                      }  
                      ?>
                      <input type="text" class="form-control" id="causedescrip" name="causedescrip" placeholder="ระบุ">
                      </div>
                </div> 
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">     
                    <label class="control-label templatemo-block">สภาพปัจจุบัน(ตอบอย่างน้อย 1 ข้อ)</label>       
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
                    <label class="control-label templatemo-block">ความต้องการให้รัฐช่วยเหลือ(ตอบอย่างน้อย 1 ข้อ)</label>       
                      <div class="templatemo-block margin-bottom-5">
                        <?php

                          $strSQL2 = "SELECT * FROM typeservice ORDER BY tservice_code ASC";
                          $objQuery2 = mysql_query($strSQL2);
                          while($objResult2 = mysql_fetch_array($objQuery2))
                          {
                        ?>
                        <input type="checkbox" name="tservice[<?=$objResult2["tservice_code"]?>]" id="tservice[<?=$objResult2["tservice_code"]?>]" value="<?php echo $objResult2["tservice_code"];?>" /> 
                        <label for="tservice[<?=$objResult2["tservice_code"]?>]" class="font-weight-400"><span></span><?php echo $objResult2["tservice_name"];?></label> <br/>
                      <?php  
                      }  
                      ?>
                      <input type="text" class="form-control" id="tservicedescrip" name="tservicedescrip" placeholder="ระบุ">
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

                      echo "<td><img src= 'images/imghl/".$rsimg['img_name']."' style='width:150px; height:100px;'  border=0 />&nbsp;&nbsp;</td>";
                     
                    } ?>
                    </tr>
                  
                    </table>
                    
                 
                                  
                </div>
              </div> 
              <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">บันทึก</button>
                <button type="reset" class="templatemo-white-button">ยกเลิก</button>
              </div>
            </form>
          </div>
        </div>
        <footer class="text-right">
            <p>Home4Homeless &copy; 2015 ICT50 </p>
          </footer> 
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