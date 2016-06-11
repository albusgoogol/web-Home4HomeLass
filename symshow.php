<?php 
  include "config.php";
  include "checkstaff.php";

  function displaydate ($x) {
$date_m=array ("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม");

$date_array=explode("-",$x);
$y=$date_array[0];
$m=$date_array[1]-1;
$d=$date_array[2];
$m=$date_m[$m];
$displaydate="$d $m $y";
return $displaydate;
}

  $_SESSION['hl']=$_GET['show_id'];
  $show_id=$_GET['show_id'];
  $sym_name =$_GET['sym_name'];
  $sym_code = $_GET['sym_code'];
  $sickgroup = $_GET['sickgroup'];

  $sqlsym = "SELECT * FROM homeless
            INNER JOIN sicknessdetail ON sicknessdetail.hl_code = homeless.hl_code
            INNER JOIN sickness ON sickness.sick_id = sicknessdetail.sick_id
            INNER JOIN sickgroup ON sickness.sickgroup_id = sickness.sickgroup_id
            WHERE sicknessdetail.hl_code = '$show_id' AND sicknessdetail.sick_id = '$sym_code' AND sicknessdetail.sickgroup_id = '$sickgroup' ";
  $objsym = mysql_query($sqlsym);
  $rssym = mysql_fetch_array($objsym);
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Home4Homeless | ติดตามอาการป่วย</title>
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
            <li><a href="search.php" class="active"><i class="fa fa-list-alt fa-fw"></i>ค้นหารายงาน</a></li>
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
                <li><a href="follow.php?show_id=<?php echo $show_id;?>">ญาติ</a></li>
                <li><a href="sym.php?show_id=<?php echo $show_id;?>" class="active">อาการป่วย</a></li>
                <li><a href="tain.php?show_id=<?php echo $show_id;?>">ฝึกอาชีพ</a></li>
                <li><a href="takecare.php?show_id=<?php echo $show_id;?>">สถานที่รับดูแล</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
          <h2 class="margin-bottom-10">ค้นหารายงาน > ติดตามช่วยเหลือ > ประวัติอาการป่วย</h2>
            <form name="frmMain" id="frmMain" action="db_editsym.php" class="templatemo-login-form" method="post">
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                  <label for="">รหัสคนไร้ที่พึ่ง</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $show_id;?> </label>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                    <label for="">ชื่อ-สกุล</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rssym['hl_fname'];?>&nbsp;&nbsp;<?php echo $rssym['hl_lname'];?></label> <br> 
                    <label for="">วันที่เข้ารับรักษา</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo displaydate($rssym['sick_date']);?> </label><br> 
                    <label for="">สถานะอาการป่วย</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rssym['sick_status'];?> </label><br>                
                    <label for="">กลุ่มโรค</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rssym['sickgroup_name'];?> </label>&nbsp; &nbsp;&nbsp;&nbsp;
                    <label for="">ชื่อโรค</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rssym['sick_name'];?> </label> <br>
                    <label for="">รายละเอียดโรค</label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rssym['sick_descript'];?> </label>
                  </div>
              </div>
              <div class="form-group text-right">
                
                <button class="templatemo-white-button"><a href="sym.php?show_id=<?php echo $show_id; ?>"> กลับ</a></button>
              </div> 
            </form>
          </div>
          <footer class="text-right">
            <p>Home4Homeless &copy; 2015 ICT50 </p>
          </footer>
        </div>
    </div>
    
    <!-- JS -->
    <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

    <!-- Datepicker -->
    <script type="text/javascript" src="./js/bootstrap-datepicker.js"></script>
    <!-- thai extension -->
    <script type="text/javascript" src="./js/bootstrap-datepicker-thai.js"></script>
    <script type="text/javascript" src="./js/locales/bootstrap-datepicker.th.js"></script>

  </body>
</html>