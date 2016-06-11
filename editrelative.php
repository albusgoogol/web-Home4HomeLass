<?php 
  include "config.php";
 include "checkstaff.php";
  $_SESSION['hl']=$_GET['show_id'];
  $show_id=$_GET['show_id'];
 
  $rel_id =$_GET['rel_id'];
  $rel_code = $_GET['rel_code'];
  $sqlrel = "SELECT * FROM homeless
            INNER JOIN relativedetail ON relativedetail.hl_code = homeless.hl_code 
            INNER JOIN relative ON relative.relative_id = relativedetail.relative_id
            WHERE homeless.hl_code = '$show_id' 
            AND relativedetail.relative_id = '$rel_id' AND relativedetail.relative_code = '$rel_code' ";
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
          <h2 class="margin-bottom-10">ค้นหารายงาน > ติดตามความช่วยเหลือ > ประวัติญาติ > แก้ไขประวัติญาติ</h2>
            <form name="frmMain" id="frmMain" action="db_editrel.php" class="templatemo-login-form" method="post" >
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="hlcode">รหัสคนไร้ที่พึ่ง</label>
                    <input type="text" class="form-control" name="hlcode" id="hlcode" value="<?php echo $show_id; ?>" disabled/>                  
                    <input type="hidden" name="hl" value="<?php echo $show_id; ?>"/>
                    <input type="hidden" name="rel_code" id="rel_code" value="<?php echo $rel_code;?>">
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="rday">ชื่อ-สกุลคนไร้ที่พึ่ง</label>
                    <input type="text" class="form-control" name="namehl" id="namehl" value="<?php echo $rsrel['hl_fname'];?>  <?php echo $rsrel['hl_lname'];?>" disabled/>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-12 form-group">   
                    <label class="control-label templatemo-block">สถานะการมีญาติ *
                      <div class="margin-right-15 templatemo-inline-block">
                        <label for="myradio" class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rsrel['relative_status'];?> </label>
                    </div>
                    </label>                 
                </div>
              </div>
              <div id="place_select">
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label>กรณีที่มีญาติ กรุณากรอกข้อมูลให้ถูกต้อง</label>                
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="rid">เลขประจำตัวประชาชน</label>
                    <input type="text" class="form-control" name="rid" id="rid" placeholder="เลขประจำตัวประชาชน 13 หลัก"  maxlength="13" value="<?php echo $rel_id;?>">                  
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="fname">ชื่อ</label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="ชื่อ" value="<?php echo $rsrel['relative_fname'];?>" required>                  
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="lname">นามสกุล</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="นามสกุล" value="<?php echo $rsrel['relative_lname'];?>"required>                  
                  </div> 
                </div>
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="line">ID: Line</label>
                    <input type="text" class="form-control" name="line" id="line" placeholder="ID Line" value="<?php echo $rsrel['relative_line'];?>">                  
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="j@dashbord.com" value="<?php echo $rsrel['relative_email'];?>">                  
                  </div> 
                </div>
                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="tel">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" name="tel" id="tel" placeholder="เบอร์โทรศัพท์ 10 หลัก" maxlength="10" value="<?php echo $rsrel['relative_tel'];?>">                  
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="detail">ช่องทางอื่นในการติดต่อ</label>
                    <textarea class="form-control" id="detail" name="detail" rows="3" value="<?php echo $rsrel['relative_address'];?>"><?php echo $rsrel['relative_address'];?></textarea>                  
                  </div>
                </div>
              </div> <br/>
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
    
    

  </body>
</html>