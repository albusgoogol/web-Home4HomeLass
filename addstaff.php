<?php 
  include "config.php";
  include "configs.php";
  include "checkstaff.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Home4Homeless | เพิ่มเจ้าหน้าที่</title>
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

    <!-- Check ID CARD AND Empty-->
      <script language="javascript">

        function check_idcard(mid){
        if(mid.value == ""){ return false;}
        if(mid.length < 13){ return false;}

      var num = str_split(mid); // function เพิ่มเติม
      var sum = 0;
      var total = 0;
      var digi = 13;

        for(i=0;i<12;i++){
          sum = sum + (num[i] * digi);
          digi--;
        }
        total = ((11 - (sum % 11)) % 10);
        
        if(total == num[12]){ //  alert('รหัสหมายเลขประจำตัวประชาชนถูกต้อง');
          return true;
        }else{ // alert('รหัสหมายเลขประจำตัวประชาชนไม่ถูกต้อง');
          return false;
        }
      }


      function str_split ( f_string, f_split_length){
          f_string += '';
          if (f_split_length == undefined) {
              f_split_length = 1;
          }
          if(f_split_length > 0){
              var result = [];
              while(f_string.length > f_split_length) {
                  result[result.length] = f_string.substring(0, f_split_length);
                  f_string = f_string.substring(f_split_length);
              }
              result[result.length] = f_string;
              return result;
          }
          return false;
      }

      function id_card(mid){
        if(check_idcard(mid.value)){
          alert("เลขประจำตัวประชาชนถูกต้อง");
          /*mid.method = "post";
          mid.action = "db_regispop.php";*/
        }else{
          alert("เลขประจำตัวประชาชนไม่ถูกต้อง กรุณากรอกใหม่");  
          mid.value = "";
          mid.focus();
          return false;

        }
      }
      function fncSubmit()
      {
        var checkmid = id_card(mid);
        if(checkmid == false){
          return false;
        }

        if(document.frmMain.orname.value == "")
        {
          alert('กรุณาเลือกสังกัด');
          document.frmMain.orname.focus();    
          return false;
        } 
        if(document.frmMain.pass.value == "")
        {
          alert('กรุณากรอกรหัสผ่าน');
          document.frmMain.pass.focus();    
          return false;
        }
        if(document.frmMain.conpass.value == "")
        {
          alert('กรุณากรอกยืนยันรหัสผ่าน');
          document.frmMain.conpass.focus();    
          return false;
        }
        if(document.frmMain.pass.value != document.frmMain.conpass.value)
        {
          alert('กรุณากรอกรหัสผ่านให้ตรงกัน');
          document.frmMain.conpass.focus();    
          return false;
        }
      }

    </script>

    <!--   Script function AJAX  Address  -->
         <!--<script language=Javascript>
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
    </script>-->
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
            <li><a href="search.php"><i class="fa fa-list-alt fa-fw"></i>ค้นหารายงาน</a></li>
            <li><a href="checkstatus.php"><i class="fa fa-list-alt fa-fw"></i>ตรวจสอบสถานะติดตาม</a></li>
            <li><a href="statistic.php"><i class="fa fa-bar-chart fa-fw"></i>สถิติ</a></li>
            <li><a href="act.php"><i class="fa fa-book fa-fw"></i>คำแนะนำ/ข้อควรปฏิบัติ</a></li>
            <li><a href="about.php"><i class="fa fa-envelope fa-fw"></i>ติดต่อหน่วยงาน</a></li>
            <li><a href="memstaff.php"    class="active"><i class="fa fa-user fa-fw"></i>ข้อมูลส่วนตัว</a></li>
            <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>ออกจากระบบ</a></li>
          </ul>  
        </nav>
      </div>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">ข้อมูลส่วนตัว > เพิ่มเจ้าหน้าที่</h2>
            <form name="frmMain" id="frmMain" action="db_addstaff.php" class="templatemo-login-form" method="post"onSubmit="JavaScript:return fncSubmit();" >
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">เลขประจำตัวประชาชน* </label>
                      <input type="text" class="form-control" name="mid" id="mid" placeholder="กรอกเลข 13 หลัก" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57 ){event.returnValue = false;}" maxlength="13"/>  
                      <input type="hidden" name="mem_code" id="mem_code" value="<?php echo $objResult['mem_code'];?>">
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">
                     <label class="control-label templatemo-block" for="orname">สังกัดศูนย์คนไร้ที่พึ่ง *</label>
                     <select class="form-control" name="orname" id="orname">
                        <option value="">-- เลือกสังกัด --</option>
                  <?php 
                        $sqlor = "SELECT * FROM organization
                                 ORDER BY or_code ASC ";
                        $objor = mysql_query($sqlor);
                        while ($rsor = mysql_fetch_array($objor)){
                          ?>
                          <option value="<?php echo $rsor["or_code"];?>"><?php echo $rsor["or_name"];?></option>
                          <?php
                        }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">วัน/เดือน/ปี เกิด </label>
                    <script type="text/javascript">
                      function demo() {
                        $('.datepicker1').datepicker({
                        format: 'dd-mm-yyyy'
                       });
                     }
                    </script>
                      <input type="text" class="form-control" name="bday" id="datepicker1"data-provide="datepicker" data-date-language="th-th" placeholder="วว/ดด/ปปปป" />  
                  </div>
                     <div class="col-lg-6 col-md-6 form-group">   
                    <label class="control-label templatemo-block">เพศ *</label>                 
                    <div class="margin-right-15 templatemo-inline-block">
                      <input type="radio" name="sex" id="sex1" value="ชาย" checked/>
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
                    <label for="">ชื่อ </label>
                      <input type="text" class="form-control" name="fname" id="fname" placeholder="กรุณากรอกชื่อ">  
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">สกุล </label>
                      <input type="text" class="form-control" name="lname" id="lname" placeholder="กรุณากรอกชื่อ">  
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">เบอร์โทรศัพท์ </label>
                      <input type="text" class="form-control" name="tel" id="tel" placeholder="กรอกเลข 10 หลัก"  />  
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">อีเมล </label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="js@dashboard.com">  
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">รหัสผ่าน </label>
                      <input type="password" class="form-control" name="pass" id="pass" placeholder="*********"  />  
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">ยืนยันรหัสผ่าน </label>
                      <input type="password" class="form-control" name="conpass" id="conpass" placeholder="*********"/>  
                  </div>
                </div>
                  <!--<div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>ที่อยู่</label>
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
              </div>-->
                
        
                <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">บันทึก</button>
                <!--<button type="reset" class="templatemo-white-button">ยกเลิก</button>-->
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