<?php 
  include "config.php";
  include "checkpop.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Home4Homeless | แก้ไขข้อมูลส่วนตัว</title>
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
        
      }
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
            <!--<li><a href="indexp.php"><i class="fa fa-home fa-fw"></i>หน้าแรก</a></li>-->
            <li><a href="notify.php"><i class="fa fa-bell fa-fw"></i>แจ้งขอความช่วยเหลือ</a></li>
            <li><a href="checkhl.php"><i class="fa fa-list-alt fa-fw"></i>ตรวจสอบสถานะของคนไร้ที่พึ่ง</a></li>
            <li><a href="actp.php"><i class="fa fa-book fa-fw"></i>คำแนะนำ/ข้อควรปฏิบัติ</a></li>
            <li><a href="aboutp.php"><i class="fa fa-envelope fa-fw"></i>ติดต่อหน่วยงาน</a></li>
            <li><a href="mempop.php"  class="active"><i class="fa fa-user fa-fw"></i>ข้อมูลส่วนตัว</a></li>
            <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>ออกจากระบบ</a></li>
          </ul>  
        </nav>
      </div>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">ข้อมูลส่วนตัว > แก้ไขข้อมูลส่วนตัว</h2>
            <div class="templatemo-content-widget white-bg">  
            <form name="frmMain" id="frmMain" action="db_editpop.php" class="templatemo-login-form" method="post" onSubmit="JavaScript:return fncSubmit();">
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">เลขประจำตัวประชาชน </label>
                      <input type="text" class="form-control" name="mid" id="mid" value="<?php echo $objResult['mem_id'] ;?>"placeholder="กรอกเลข 13 หลัก" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57 ){event.returnValue = false;}" maxlength="13">  
                      <input type="hidden" name="mem_code" id="mem_code" value="<?php echo $objResult['mem_code'];?>">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-lg-12 form-group">   
                    <label class="control-label templatemo-block">เพศ *</label>                 
                    <div class="margin-right-15 templatemo-inline-block">
                    <?php $rdo="";
                if (isset ($objResult['mem_sex'])){$rdo=$objResult['mem_sex'];}?>
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
                    <label for="">ชื่อ </label>
                      <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $objResult['mem_fname'] ;?>"placeholder="กรุณากรอกชื่อ">  
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">สกุล </label>
                      <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $objResult['mem_lname'] ;?>"placeholder="กรุณากรอกนามสกุล">  
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">อีเมล </label>
                      <input type="email" class="form-control" name="email" id="email" value="<?php echo $objResult['mem_email'] ;?>"placeholder="jdash@hotmail.com">  
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">ID Line </label>
                      <input type="text" class="form-control" name="line" id="line" value="<?php echo $objResult['mem_line'] ;?>"placeholder="ID Line">  
                  </div>
                </div>
                
        
                <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">บันทึก</button>
                <!--<button type="reset" class="templatemo-white-button">ยกเลิก</button>-->
              </div> 
            </form>
            </div>
          </div>
          <footer class="text-right">
            <p>Home4Homeless &copy; 2015 ICT50 </p>
          </footer>         
        </div>
      </div>
    </div>
    
    <!-- JS -->
    <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->

    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

  </body>
</html>