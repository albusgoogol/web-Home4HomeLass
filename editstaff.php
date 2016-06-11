<?php 
  include "config.php";
  include "checkstaff.php";
  $mem_code = $_GET['mem_code'];
  $sql3 = "SELECT * FROM address
      INNER JOIN district ON district.dis_code = address.dis_code
      INNER JOIN amphur ON amphur.am_code = address.am_code
      INNER JOIN province ON province.prov_code = address.prov_code
      INNER JOIN geography ON geography.GEO_ID = address.GEO_ID
      INNER JOIN members ON members.mem_code = address.mem_code
      WHERE address.mem_code = '$mem_code' ";
  $sql_query3 = mysql_query($sql3);
  $rs3 = mysql_fetch_array($sql_query3);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Home4Homeless | ข้อมูลส่วนตัว</title>
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

    <!--   Script function AJAX  address  -->
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
             req.open("GET","localedit.php?data="+src+"&val="+val); //สร้าง connection
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
            <h2 class="margin-bottom-10">ข้อมูลส่วนตัว > แก้ไขข้อมูลส่วนตัว</h2>
            <form name="frmMain" id="frmMain" action="db_editstaff.php" class="templatemo-login-form" method="post" >
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">รหัสสมาชิก </label>
                      <input type="text" class="form-control" name="" id="" value="<?php echo $objResult['mem_code'] ;?>" disabled/>  
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">สถานะสมาชิก </label>
                      <input type="text" class="form-control" name="" id="" value="<?php echo $objResult['mem_status'] ;?>" disabled/>  
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">เลขประจำตัวประชาชน </label>
                      <input type="text" class="form-control" name="mid" id="mid" value="<?php echo $objResult['mem_id'] ;?>" disabled/>  
                      <input type="hidden" name="mem_code" id="mem_code" value="<?php echo $objResult['mem_code'];?>">
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">
                  <?php 
                        $sqlor = "SELECT * FROM members
                                  INNER JOIN organization ON organization.or_code = members.or_code
                                  WHERE mem_code  = '".$objResult['mem_code']."' ";
                        $objor = mysql_query($sqlor);
                        $rsor = mysql_fetch_array($objor);
                    ?>
                    <label for="">สังกัดหน่วยงาน </label>
                      <input type="text" class="form-control" name="orname" id="orname" value="<?php echo $rsor['or_name'] ;?>" disabled/>  
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
                      <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $objResult['mem_lname'] ;?>"placeholder="กรุณากรอกชื่อ">  
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
                      <input type="text" class="form-control" name="bday" value="<?php echo $objResult['mem_bday'] ;?>" id="datepicker1"data-provide="datepicker" data-date-language="th-th" placeholder="วว/ดด/ปปปป" />  
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">เบอร์โทรศัพท์ </label>
                      <input type="text" class="form-control" name="tel" id="tel" value="<?php echo $objResult['mem_tel'] ;?>"  />  
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">อีเมล </label>
                      <input type="email" class="form-control" name="email" id="email" value="<?php echo $objResult['mem_email'] ;?>">  
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="">ID Line </label>
                      <input type="text" class="form-control" name="line" id="line" value="<?php echo $objResult['mem_line'] ;?>">  
                  </div>
                </div>
                  
                
        
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