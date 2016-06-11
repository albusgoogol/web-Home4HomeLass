<?php 
  include "config.php";
  include "checkstaff.php";
  include "configs.php";
  $sql3 = "SELECT * FROM address
      INNER JOIN district ON district.dis_code = address.dis_code
      INNER JOIN amphur ON amphur.am_code = address.am_code
      INNER JOIN province ON province.prov_code = address.prov_code
      INNER JOIN geography ON geography.GEO_ID = address.GEO_ID
      INNER JOIN members ON members.mem_code = address.mem_code
      WHERE address.mem_code = '".$objResult['mem_code']."' ";
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
            <h2 class="margin-bottom-10">ข้อมูลส่วนตัว</h2>
            <form name="frmMain" id="frmMain" action="" class="templatemo-login-form" method="post">
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">  
                    <label>รหัสสมาชิก </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_code'];?></label>&nbsp; &nbsp;&nbsp;
                    <label>สถานะสมาชิก </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_status'];?></label>
                     <br>
                    <label>เลขประจำตัวประชาชน </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_id'];?></label>&nbsp; &nbsp;&nbsp;
                     <br>
                    <label>ชื่อ-สกุล </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_fname'];?>&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_lname'];?></label>
                    &nbsp; &nbsp;&nbsp;<label>เพศ </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_sex'];?></label><br>
                    <label>วัน/เดือน/ปี เกิด </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_bday'];?>&nbsp; &nbsp;&nbsp;</label>
                    &nbsp; &nbsp;&nbsp;<label>เบอร์โทรศัพท์ </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_tel'];?></label> <br>
                    <label>อีเมล </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_email'];?></label>&nbsp; &nbsp;&nbsp;
                    <label>ID Line  </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_line'];?></label>&nbsp; &nbsp;&nbsp;<br>
                    <?php 
                        $sqlor = "SELECT * FROM members
                                  INNER JOIN organization ON organization.or_code = members.or_code
                                  WHERE members.mem_code  = '".$objResult['mem_code']."' ";
                        $objor = mysql_query($sqlor);
                        $rsor = mysql_fetch_array($objor);
                    ?>
                    <label>สังกัดหน่วยงาน </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rsor['or_name'];?></label>&nbsp; &nbsp;&nbsp;
                    
                  </div>
                </div>
                <div class="form-group text-right">
                <button type="submit" class="templatemo-white-button"><a href="editstaff.php?mem_code=<?php echo $objResult['mem_code']; ?>">แก้ไขข้อมูลส่วนตัว</a></button>
                <button type="reset" class="templatemo-white-button"><a href="addstaff.php">เพิ่มเจ้าหน้าที่</a></button>
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
  </body>
</html>