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
  $tc_name=$_GET['tc_name'];
  $tc_code=$_GET['tc_code'];
  //echo $tc_code;

  $sql3 = "SELECT * FROM address
      INNER JOIN district ON district.dis_code = address.dis_code
      INNER JOIN amphur ON amphur.am_code = address.am_code
      INNER JOIN province ON province.prov_code = address.prov_code
      INNER JOIN geography ON geography.GEO_ID = address.GEO_ID
      INNER JOIN takecarestation ON address.tc_code = takecarestation.tc_code 
      WHERE  takecarestation.tc_code = '$tc_code' ";
  $sql_query3 = mysql_query($sql3);
  $rs3 = mysql_fetch_array($sql_query3);
  
  $sql = "SELECT * FROM homeless
          INNER JOIN takecaredetail ON takecaredetail.hl_code = homeless.hl_code
          INNER JOIN takecarestation ON takecaredetail.tc_code = takecarestation.tc_code
          WHERE homeless.hl_code = '$show_id' ";
  $query = mysql_query($sql);
  $rstc = mysql_fetch_array($query);



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
<!--   Script function AJAX  address  -->
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
             req.open("GET","localtion.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('geography1',-1);     
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
                    <input type="hidden" name="tccode" value="<?php echo $tc_code; ?>"/>
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="hlcode">วันที่บันทึกข้อมูล *</label>
                    
                    <input type="text" class="form-control" name="tday" id="tday" value="<?php echo $rstc['tc_dayrec'];?>" disabled/>
                    <input type="hidden" class="form-control" name="tkrec" id="tkrec" value="<?php echo $rstc['tc_dayrec'];?>"/>
                   
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
                    <input type="text" class="form-control" name="tcin" id="datepicker1" value="<?php echo $rstc['td_in'];?>" data-provide="datepicker" data-date-language="th-th" required> </input>                  
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
                    <input type="text" class="form-control" name="tcout" id="datepicker2" data-provide="datepicker" data-date-language="th-th"value="<?php echo $rstc['td_out'];?>"> </input>                  
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="">ชื่อสถานที่รับดูแล *</label>
                    <input type="text" class="form-control" name="tcstation" id="tcstation" placeholder="ชื่อสถานที่รับดูแล" value="<?php echo $tc_name;?>" required> </input>                  
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" name="tel" id="tel" placeholder="เบอร์โทรศัพท์ 10 หลัก" value="<?php echo $rstc['tc_tel'];?>"> </input>                  
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="">E-mail</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="j@dashbord.com" value="<?php echo $rstc['tc_email'];?>"> </input>                  
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
                    <input type="text" class="form-control" name="num1" id="num1" placeholder="เลขที่" value="<?php echo $rs3['ad_num'];?>" required/>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="villno1">หมู่ที่</label>
                    <input type="text" class="form-control" name="villno1" id="villno1" placeholder="หมู่ที่" value="<?php echo $rs3['ad_villno'];?>" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="alley1">ตรอก/ซอย</label>
                    <input type="text" class="form-control" name="alley1" id="alley1" placeholder="ตรอกหรือซอย" value="<?php echo $rs3['ad_alley'];?>"/>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="street1">ถนน</label>
                    <input type="text" class="form-control" name="street1" id="street1" placeholder="ถนน" value="<?php echo $rs3['ad_street'];?>"/>
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

                        <?php 
                            $result=mysql_query("SELECT * FROM province WHERE GEO_ID = '".$rs3['GEO_ID']."' ");
                            while($row = mysql_fetch_array($result)){
                              if($row['prov_code']==$rs3['prov_code'])
                              $selprov1='selected';
                              else $selprov1='';
                              echo "<option value='$row[prov_code]' $selprov1 >$row[prov_name]</option> " ;
                            }
                          ?>
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
                        <?php 
                            $result=mysql_query("SELECT * FROM amphur WHERE prov_code = '".$rs3['prov_code']."' ");
                            while($row = mysql_fetch_array($result)){
                              if($row['am_code']==$rs3['am_code'])
                              $selam1='selected';
                              else $selam1='';
                              echo "<option value='$row[am_code]' $selam1 >$row[AMPHUR_NAME]</option> " ;
                            }
                          ?>
                      </select>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="district1">ตำบล</label>
                    <span id="district1">
                      <select class="form-control " name="district1" id="district1" >
                        <option value='0' >-- เลือกตำบล --</option>  
                        <?php 
                            $result=mysql_query("SELECT * FROM district WHERE am_code = '".$rs3['am_code']."' ");
                            while($row = mysql_fetch_array($result)){
                              if($row['dis_code']==$rs3['dis_code'])
                              $seldis1='selected';
                              else $seldis1='';
                              echo "<option value='$row[dis_code]' $seldis1 >$row[DISTRICT_NAME]</option> " ;
                            }
                          ?> 
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