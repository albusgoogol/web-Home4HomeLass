<?php 
  include "config.php";
  include "configs.php";
  include "checkstaff.php";
  
  $_SESSION['hl']=$_GET['show_id'];
  $show_id=$_GET['show_id'];

  $sqlhl = "SELECT * FROM homeless
            WHERE homeless.hl_code = '$show_id' ";
  $objhl = mysql_query($sqlhl);
  $rshl = mysql_fetch_array($objhl);
 

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

    <!-- data table -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

    <!-- JS -->
        <!-- jQuery -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>  <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>        <!-- Templatemo Script -->

     <!-- datat table -->
    <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

     <script language="javascript">

  $(document).ready(function() {
    $('#myTable').DataTable( {
        "info":     false
    } );
  } );
    </script>
    <!--   Script function AJAX  Address  -->
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
             req.open("GET","location.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('geography1',-1);     
    </script>


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
                <li><a href="tain.php?show_id=<?php echo $show_id;?>">ฝึกอาชีพ</a></li>
                <li><a href="takecare.php?show_id=<?php echo $show_id;?>" class="active">สถานที่รับดูแล</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
          <h2 class="margin-bottom-10">ค้นหารายงาน > ติดตามช่วยเหลือ > แบบบันทึกติดตามความช่วยเหลือสถานที่รับดูแล</h2>
            <form name="frmMain" id="frmMain" action="db_takecare.php" class="templatemo-login-form" method="post">
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="hlcode">รหัสคนไร้ที่พึ่ง *</label>
                    <input type="text" class="form-control" name="hlcode" id="hlcode" value="<?php echo $show_id; ?>" disabled/>                  
                    <input type="hidden" name="hl" value="<?php echo $show_id; ?>"/>
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="hlcode">ชื่อ-สกุล*  </label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $rshl['hl_fname']; ?> <?php echo $rshl['hl_lname']; ?>" disabled>
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    
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
                    
                    <input type="hidden" class="form-control" name="tkrec" id="tkrec" value="<?php echo $date?>"/>
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
                    <label for="tcstation">ชื่อสถานที่รับดูแล *</label>
                    <select class="form-control" name="tcstation" id="tcstation" required/>
                      <option value="">-- เลือกสถานที่รับดูแล --</option>
                      <?php
                        $sqlsick = "SELECT * FROM takecarestation
                            ORDER BY tc_name ASC";
                        $objsick = mysql_query($sqlsick);
                        while ($rssick = mysql_fetch_array($objsick)) {
                        ?>
                        <option value="<?php echo $rssick["tc_code"];?>"><?php echo $rssick["tc_name"];?></option>
                        <?php
                        }
                      ?>
                    </select>                  
                  </div>
              </div>
               <div class="row form-group">
                  <div class="col-lg-12 col-md-12 form-group">                  
                    <label for="detail">รายละเอียดสถานที่รับดูแล</label>
                    <textarea class="form-control" id="detail" name="detail" rows="3"></textarea>                  
                  </div>
              </div>
              
              <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">บันทึก</button>
                <button class="templatemo-white-button"><a href="addtk.php?show_id=<?php echo $show_id;?>" target="_blank">เพิ่มสถานที่รับดูแล</a></button>
              </div> 
            </form>
            <h2 class="margin-bottom-10">ประวัติสถานที่รับดูแล</h2>
            <form name="frmMain" id="frmMain" action="" class="templatemo-login-form" method="post">
              <div class="templatemo-content-widget no-padding">
                <div class="panel panel-default table-responsive">
                  <table id="myTable" class="table table-striped table-bordered templatemo-user-table display" cellspacing="0"  width="100%"> 
                    <?php
          
                      $sql = "SELECT * FROM homeless
                              INNER JOIN takecaredetail ON takecaredetail.hl_code = homeless.hl_code
                              INNER JOIN takecarestation ON takecaredetail.tc_code = takecarestation.tc_code
                              WHERE takecaredetail.hl_code = '$show_id' AND takecaredetail.tc_status = 'มีสถานที่รับดูแล'
                              ORDER BY takecaredetail.tc_dayrec ASC";
                      $query = mysql_query($sql);
                    ?>
                    <thead>
                      <tr>
                        <td class="white-text templatemo-sort-by" align="center">วันที่บันทึกข้อมูล<span class="caret"></span></td>
                        <td class="white-text templatemo-sort-by"align="center">สถานที่รับดูแล<span class="caret"></span></td>
                        <td align="center">รายละเอียด</td>
                        <td align="center">ลบ</td>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($rs = mysql_fetch_assoc($query)){
                          echo "<tr>";
                            echo "<td width='40' ><div align='center'>$rs[tc_dayrec]</div></td>";
                            echo "<td width='120'><div align='center'>$rs[tc_name]</div></td>";
                            echo "<td width='70'><div align='center'><a href='takecareshow.php?show_id=$show_id&&tc_name=$rs[tc_name]&&tc_code=$rs[tc_code]' target ='_blank'>ดูรายละเอียด</a></div></td>";
                            echo "<td width='68'><div align='center'><a href='deltakecare.php?show_id=$show_id&&tc_name=$rs[tc_name]&&tc_code=$rs[tc_code]'><i class='fa fa-trash fa-fw'></i></a></div></td>";
                          echo "</tr>";
                        }
                      mysql_close();
                      ?>
                    </tbody>
                  </table>    
                </div>                          
              </div>
              <FONT COLOR=red>*หมายเหตุ: สามารถค้นหาได้จากวันที่บันทึกข้อมูล, สถานที่รับดูแล</FONT>
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