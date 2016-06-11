<?php 
  include "config.php";
 include "checkstaff.php";


  $_SESSION['hl']=$_GET['show_id'];
  $show_id=$_GET['show_id'];
 
  $rel_id =$_GET['rel_id'];

  $sqlrel = "SELECT * FROM homeless
            INNER JOIN relativedetail ON relativedetail.hl_code = homeless.hl_code 
            INNER JOIN relative ON relative.relative_id = relativedetail.relative_id
            WHERE homeless.hl_code = '$show_id' 
            AND relativedetail.relative_id = '$rel_id' ";
  $objrel = mysql_query($sqlrel);
  $rsrel = mysql_fetch_array($objrel);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Home4Homeless | ติดตามญาติ</title>
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

    

    <!-- JS -->
     <!-- jQuery -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>  <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>        <!-- Templatemo Script -->
    
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
            <li><a href="notification.php"><i class="fa fa-bell fa-fw"></i>รับแจ้งความช่วยเหลือ</a></li>
            <li><a href="record.php"><i class="fa fa-edit fa-fw"></i>บันทึกการเข้ารับบริการ</a></li>
            <li><a href="search.php"  class="active"><i class="fa fa-list-alt fa-fw"></i>ค้นหารายงาน</a></li>
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
                <li><a href="follow.php?show_id=<?php echo $show_id;?>"class="active">ญาติ</a></li>
                <li><a href="sym.php?show_id=<?php echo $show_id;?>">อาการป่วย</a></li>
                <li><a href="tain.php?show_id=<?php echo $show_id;?>">ฝึกอาชีพ</a></li>
                <li><a href="takecare.php?show_id=<?php echo $show_id;?>">สถานที่รับดูแล</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
          <h2 class="margin-bottom-10">ค้นหารายงาน > ติดตามความช่วยเหลือ > ประวัติญาติ</h2>
            <form name="frmMain" id="frmMain" action="" class="templatemo-login-form" method="post">
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="">รหัสคนไร้ที่พึ่ง</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $show_id;?> </label>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                    <label for="">ชื่อ-สกุล</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rsrel['hl_fname'];?>&nbsp;&nbsp;<?php echo $rsrel['hl_lname'];?></label> <br>
                    
                    <label for="">สถานะการมีญาติ</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rsrel['relative_status'];?> </label><br>
                    <label for="">เลขประจำตัวประชาชน</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rsrel['relative_id'];?> </label> <br>
                    <label for="">ชื่อ-สกุลญาติ</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rsrel['relative_fname'];?>&nbsp;&nbsp;<?php echo $rsrel['relative_lname'];?></label> <br>
                    <label for="">ID: Line</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rsrel['relative_line'];?> </label>&nbsp; &nbsp;&nbsp;
                    <label for="">อีเมล</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rsrel['relative_email'];?> </label> <br>
                    <label for="">เบอร์โทรศัพท์</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rsrel['relative_tel'];?> </label><br>
                    <label for="">ช่องทางอื่นในการติดต่อ</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rsrel['relative_address'];?> </label>
                  </div>
              </div>
              
            
              <div class="form-group text-right">
                <button type="submit" class="templatemo-white-button"><a href="editrelative.php?show_id=<?php echo $show_id; ?>&&rel_id=<?php echo $rsrel['relative_id'];?>&&rel_code=<?php echo $rsrel['relative_code'];?>">แก้ไขข้อมูลญาติ</a></button>
                <button type="submit" class="templatemo-white-button"><a href="follow.php?show_id=<?php echo $show_id; ?>">กลับ</a></button>
                <!--<button type="reset" class="templatemo-white-button">ยกเลิก</button>-->
              </div> 
            </form>
           
          </div>
          <footer class="text-right">
            <p>Home4Homeless &copy; 2015 ICT50 </p>
          </footer>
        </div>
    </div>
    
    

  </body>
</html>