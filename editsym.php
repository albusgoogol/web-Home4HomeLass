<?php 
  include "config.php";
  include "checkstaff.php";

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
    <script language=Javascript>
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
             req.open("GET","localsickness.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('sickgroup1',-1);     
    </script>


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
          <h2 class="margin-bottom-10">ค้นหารายงาน > ติดตามช่วยเหลือ > ประวัติอาการป่วย > แก้ไขอาการป่วย</h2>
            <form name="frmMain" id="frmMain" action="db_editsym.php" class="templatemo-login-form" method="post">
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="hlcode">รหัสคนไร้ที่พึ่ง *</label>
                    <input type="text" class="form-control" name="" id="" value="<?php echo $show_id; ?>" disabled/>                  
                    <input type="hidden" name="hl" value="<?php echo $show_id; ?>"/>
                    <input type="hidden" name="sym_code" value="<?php echo $sym_code; ?>"/>
                    <input type="hidden" name="sickgroup" value="<?php echo $sickgroup; ?>"/>
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="hlcode">วันที่บันทึกข้อมูล *</label>
                    <input type="text" class="form-control" name="rec" id="rec" value="<?php echo $rssym['sick_rec'];?>" disabled/>  
                    <input type="hidden" class="form-control" name="drec" id="drec" value="<?php echo $rssym['sick_rec'];?>"/>  
                    <input type="hidden" class="form-control" name="tussym" id="tussym" value="<?php echo $rssym['sick_status'];?>"/>              
                  </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-12 form-group">   
                    <label class="control-label templatemo-block">อาการป่วย *
                      <div class="margin-right-15 templatemo-inline-block">
                        <label for="tussym1" class="font-weight-400">&nbsp; &nbsp;&nbsp;<?php echo $rssym['sick_status'];?> </label>
                      </div>
                    </label>                 
                </div>
              </div>
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="hlcode">วันที่เข้ารับการรักษา *</label>
                    <script type="text/javascript">
                      function demo() {
                        $('.datepicker2').datepicker({
                        format: 'dd-mm-yyyy'
                       });
                     }
                    </script>
                    <input type="text" class="form-control" name="sickdate" id="datepicker2" value="<?php echo $rssym['sick_date']; ?>" data-provide="datepicker" data-date-language="th-th" placeholder="วว/ดด/ปปปป" required> </input>                  
                  </div>
                  
              </div>
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group"> 
                    <label class="control-label templatemo-block" for="sickgroup">กลุ่มโรค *</label> 
                    <span id="sickgroup1">                
                    <select class="form-control" name="sickgroup1" id="sickgroup1">
                      <option value="0">-- เลือกกลุ่มโรค --</option>
                  </select>
                  </span>
                </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label class="control-label templatemo-block" for="sick">ชื่อโรค *</label>
                    <span id="sick">
                    <select class="form-control" name="sick1" id="sick1">
                      
                     <?php 
                            $result=mysql_query("SELECT * FROM sickness WHERE sickgroup_id = '".$rssym['sickgroup_id']."' ");
                            while($row = mysql_fetch_array($result)){
                              if($row['sick_id']==$rs2['sick_id'])
                              $selprov='selected';
                              else $selprov='';
                              echo "<option value='$row[sick_id]' $selprov >$row[sick_name]</option> " ;
                            }
                          ?>
                  </select>  
                  </span>
                  </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-12 col-md-12 form-group">                  
                    <label for="detail">รายละเอียดโรค</label>
                    <textarea class="form-control" id="detail" name="detail" rows="3" value="<?php echo $rssym['sick_descript'];?>"><?php echo $rssym['sick_descript'];?></textarea>                  
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