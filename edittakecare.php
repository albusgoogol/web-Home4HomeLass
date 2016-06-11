<?php 
  include "config.php";
  include "configs.php";
  session_start();
  if($_SESSION['mem_code'] == "")
  {
    echo "Please Login!";
    header("location:login.php");
    exit();
  }

  if($_SESSION['mem_status'] == "พลเมืองดี")
  {
    echo "This page for Staff only!";
    exit();
  }
  mysql_query("SET NAMES UTF8");  
  mysql_connect("localhost","root","123456");
  mysql_select_db("dbhame");     
  $strSQL = "SELECT * FROM members WHERE mem_code = '".$_SESSION['mem_code']."' ";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);

  $_SESSION['hl']=$_GET['show_id'];
  $show_id=$_GET['show_id'];
 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Home4Homeless | ติดตามสถานที่รับดูแล</title>
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
    <!-- Left column -->
    <header class="logo-header">
      <a><img src="images/logoweb2.png"></a>
      <div class="text-right">
        <FONT COLOR="white"><?php echo $objResult['mem_fname'];?>  <?php echo $objResult['mem_lname'];?> (<?php echo $objResult['mem_status']; ?>) &nbsp; &nbsp;</FONT><br><br>
      </div>
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
            <li><a href="record.php"><i class="fa fa-edit fa-fw"></i>บันทึกรายงาน</a></li>
            <li><a href="search.php" class="active"><i class="fa fa-list-alt fa-fw"></i>ค้นหารายงาน</a></li>
            <li><a href="checkstatus.php"><i class="fa fa-list-alt fa-fw"></i>ตรวจสอบสถานะติดตาม</a></li>
            <li><a href="statistic.php"><i class="fa fa-bar-chart fa-fw"></i>สถิติ</a></li>
            <li><a href="act.php"><i class="fa fa-book fa-fw"></i>คำแนะนำ/ข้อควรปฏิบัติ</a></li>
            <li><a href="about.php"><i class="fa fa-envelope fa-fw"></i>ติดต่อหน่วยงาน</a></li>
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
                <li><a href="tain.php?show_id=<?php echo $show_id;?>">ฝึกอาชีพ</a></li>
                <li><a href="takecare.php?show_id=<?php echo $show_id;?>" class="active">สถานที่รับดูแล</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
          <h2 class="margin-bottom-10">แบบบันทึกติดตามสถานที่รับดูแล</h2>
            <form name="frmMain" id="frmMain" action="db_takecare.php" class="templatemo-login-form" method="post">
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="hlcode">รหัสคนไร้ที่พึ่ง *</label>
                    <input type="text" class="form-control" name="hlcode" id="hlcode" value="<?php echo $show_id; ?>" disabled/>                  
                    <input type="hidden" name="hl" value="<?php echo $show_id; ?>"/>
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="hlcode">วันที่บันทึกข้อมูล *</label>
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
                    <input type="text" class="form-control" name="tday" id="tday" value="<?=$date?>" disabled/>
                    <input type="hidden" class="form-control" name="tkrec" id="tkrec" value="<?=$date?>"/>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="">วันที่เข้าสถานที่รับดูแล *</label>
                    <script type="text/javascript">
                      function demo() {
                        $('.datepicker1').datepicker({
                        format: 'dd-mm-yyyy'
                       });
                     }
                    </script>
                    <input type="text" class="form-control" name="tcin" id="datepicker1" data-provide="datepicker" data-date-language="th-th"placeholder="วว/ดด/ปปปป" required> </input>                  
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="">วันที่ออกจากสถานที่รับดูแล</label>
                    <script type="text/javascript">
                      function demo() {
                        $('.datepicker2').datepicker({
                        format: 'dd-mm-yyyy'
                       });
                     }
                    </script>
                    <input type="text" class="form-control" name="tcout" id="datepicker2" data-provide="datepicker" data-date-language="th-th"placeholder="วว/ดด/ปปปป"> </input>                  
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="">ชื่อสถานที่รับดูแล *</label>
                    <input type="text" class="form-control" name="tcstation" id="tcstation" placeholder="ชื่อสถานที่รับดูแล" required> </input>                  
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" name="tel" id="tel" placeholder="เบอร์โทรศัพท์ 10 หลัก"> </input>                  
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="">E-mail</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="j@dashbord.com"> </input>                  
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="">ที่อยู่สถานที่รับดูแล</label>                  
                  </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="num1">เลขที่</label>
                    <input type="text" class="form-control" name="num1" id="num1" placeholder="เลขที่" required/>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="villno1">หมู่ที่</label>
                    <input type="text" class="form-control" name="villno1" id="villno1" placeholder="หมู่ที่" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="alley1">ตรอก/ซอย</label>
                    <input type="text" class="form-control" name="alley1" id="alley1" placeholder="ตรอกหรือซอย" />
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="street1">ถนน</label>
                    <input type="text" class="form-control" name="street1" id="street1" placeholder="ถนน" />
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
                      <select class="form-control " name="province1" id="province1" >
                        <option value='0' >-- เลือกจังหวัด --</option>   
                      </select>
                    </span>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="amphur1">อำเภอ</label>
                    <span id="amphur1">
                      <select class="form-control " name="amphur1" id="amphur1" >
                        <option value='0' >-- เลือกอำเภอ --</option>   
                      </select>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="district1">ตำบล</label>
                    <span id="district1">
                      <select class="form-control " name="district1" id="district1" >
                        <option value='0' >-- เลือกตำบล --</option>   
                      </select>
                    </span>
                </div>
              </div>
              <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">บันทึก</button>
                <button type="reset" class="templatemo-white-button">ยกเลิก</button>
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