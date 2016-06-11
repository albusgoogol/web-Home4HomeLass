<?php 
  include "config.php";
  include "configs.php";
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
  $train_code = $_GET['train_code'];
  $course_code =$_GET['course_code'];

  $sqltrain = "SELECT * FROM homeless
              INNER JOIN trainingcenterdetail ON trainingcenterdetail.hl_code = homeless.hl_code
              INNER JOIN trainingcenter ON trainingcenter.traincenter_code = trainingcenterdetail.traincenter_code
              INNER JOIN course ON course.course_code = trainingcenterdetail.course_code
              WHERE trainingcenterdetail.hl_code = '$show_id' AND trainingcenterdetail.traincenter_code = '$train_code' AND trainingcenterdetail.course_code = '$course_code' ";
  $querytrain = mysql_query($sqltrain);
  $objtrain = mysql_fetch_array($querytrain);

  $sql3 = "SELECT * FROM address
      INNER JOIN district ON district.dis_code = address.dis_code
      INNER JOIN amphur ON amphur.am_code = address.am_code
      INNER JOIN province ON province.prov_code = address.prov_code
      INNER JOIN geography ON geography.GEO_ID = address.GEO_ID
      INNER JOIN trainingcenter ON trainingcenter.traincenter_code = address.traincenter_code
      WHERE trainingcenter.traincenter_code = '$train_code' ";
  $sql_query3 = mysql_query($sql3);
  $rs3 = mysql_fetch_array($sql_query3);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Home4Homeless | ติดตามฝึกอาชีพ</title>
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
                <li><a href="sym.php?show_id=<?php echo $show_id;?>" >อาการป่วย</a></li>
                <li><a href="tain.php?show_id=<?php echo $show_id;?>"class="active">ฝึกอาชีพ</a></li>
                <li><a href="takecare.php?show_id=<?php echo $show_id;?>">สถานที่รับดูแล</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
          <h2 class="margin-bottom-10">ค้นหารายงาน > ติดตามช่วยเหลือ > ประวัติการฝึกอาชีพ</h2>
            <form name="frmMain" id="frmMain" action="" class="templatemo-login-form" method="post">
        
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">  
                    <label>รหัสคนไร้ที่พึ่ง </label> 
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $show_id;?> </label>
                     <br>
                    <label>ชื่อ-สกุล </label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objtrain['hl_fname'];?>      <?php echo $objtrain['hl_lname'];?></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;<label>วันที่เข้าฝึกอาชีพ </label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo displaydate($objtrain['traincenter_tday']);?> </label><br>
                    <label for="">อาชีพที่ต้องการฝึก </label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objtrain['course_name'];?> </label> <br>
                    <label for="">รายละเอียดอาชีพ </label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objtrain['traincenter_detail'];?> </label> <br>
                    <label for="">ชื่อศูนย์ฝึกอาชีพ </label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $objtrain['traincenter_name'];?> </label> <br>
                    <label for="">ที่อยู่ </label>
                    <label for="">บ้านเลขที่ </label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs3['ad_num'];?> </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;<label for="">หมู่ที่ </label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs3['ad_villno'];?> </label> <br>
                    <label for="">ตรอก/ซอย </label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs3['ad_alley'];?> </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;<label for="">ถนน </label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs3['ad_street'];?> </label> <br>
                    <label for="">ตำบล </label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs3['DISTRICT_NAME'];?> </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;<label for="">อำเภอ </label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs3['AMPHUR_NAME'];?> </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;<label for="">จังหวัด </label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs3['prov_name'];?> </label> <br>
                    <label for="">ภูมิภาค </label>
                    <label class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rs3['GEO_NAME'];?> </label>               
                    
          
                  </div>
              
              </div>

              <div class="form-group text-right">
                <button type="submit" class="templatemo-white-button"><a href="tain.php?show_id=<?php echo $show_id; ?>">กลับ</a></button>
                <!--<button type="reset" class="templatemo-white-button">ยกเลิก</button>-->
              </div> 
            </form>
          </div>
          <footer class="text-right">
            <p>Home4Homeless &copy; 2015 ICT50 </p>
          </footer>
        </div>
    </div>
    
    

    <!-- Datepicker -->
    <script type="text/javascript" src="./js/bootstrap-datepicker.js"></script>
    <!-- thai extension -->
    <script type="text/javascript" src="./js/bootstrap-datepicker-thai.js"></script>
    <script type="text/javascript" src="./js/locales/bootstrap-datepicker.th.js"></script>

  </body>
</html>