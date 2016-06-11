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
            <h2 class="margin-bottom-10">ข้อมูลส่วนตัว</h2>
            <div class="templatemo-content-widget white-bg">  
            <form name="frmMain" id="frmMain" action="" class="templatemo-login-form" method="post">
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">  
                    <label>เลขประจำตัวประชาชน </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_id'];?></label>&nbsp; &nbsp;&nbsp;
                     <br>
                    <label>ชื่อ-สกุล </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_fname'];?>&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_lname'];?></label>
                    &nbsp; &nbsp;&nbsp;<label>เพศ </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_sex'];?></label><br>
                    <label>อีเมล </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_email'];?></label>&nbsp; &nbsp;&nbsp; <br>
                    <label>ID Lne </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objResult['mem_line'];?></label>&nbsp; &nbsp;&nbsp;
                  </div>
                </div>
                <div class="form-group text-right">
                <button type="submit" class="templatemo-white-button"><a href="editpop.php?mem_code=<?php echo $objResult['mem_code']; ?>">แก้ไขข้อมูลส่วนตัว</a></button>
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