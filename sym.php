<?php 
  include "config.php";
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
             req.open("GET","localsick.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('sickgroup',-1);     
    </script>

    <script language="javascript">

  $(document).ready(function() {
    $('#myTable').DataTable( {
        "info":     false
    } );
  } );
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
                <li><a href="sym.php?show_id=<?php echo $show_id;?>" class="active">อาการป่วย</a></li>
                <li><a href="tain.php?show_id=<?php echo $show_id;?>">ฝึกอาชีพ</a></li>
                <li><a href="takecare.php?show_id=<?php echo $show_id;?>">สถานที่รับดูแล</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
          <h2 class="margin-bottom-10">ค้นหารายงาน > ติดตามช่วยเหลือ > แบบบันทึกติดตามความช่วยเหลืออาการป่วย</h2> <br>
            
            <form name="frmMain" id="frmMain" action="db_symp.php" class="templatemo-login-form" method="post">
              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="hlcode">รหัสคนไร้ที่พึ่ง*  </label>
                    <input type="text" name="hlcode" id="hlcode" class="form-control" value="<?php echo $show_id; ?>" disabled>     
                    <input type="hidden" name="hl"class="form-control" value="<?php echo $show_id; ?>"/>
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="hlcode">ชื่อ-สกุล*  </label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $rshl['hl_fname']; ?> <?php echo $rshl['hl_lname']; ?>" disabled>
                  </div>
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
                   
                    <input type="hidden" class="form-control" name="dayrec" id="dayrec" value="<?php echo $date;?>"/>
              </div>
              
              <div class="row form-group">
                <div class="col-lg-12 form-group">   
                    <label class="control-label templatemo-block">อาการป่วย *
                      <div class="margin-right-15 templatemo-inline-block">
                        <input type="radio" name="tussym" id="tussym1" value="ทางกาย" checked>
                        <label for="tussym1" class="font-weight-400"><span></span>ทางกาย</label>
                      </div>
                      <div class="margin-right-15 templatemo-inline-block">
                        <input type="radio" name="tussym" id="tussym2" value="ทางจิต">
                        <label for="tussym2" class="font-weight-400"><span></span>ทางจิต</label>
                      </div>
                      <div class="margin-right-15 templatemo-inline-block">
                        <input type="radio" name="tussym" id="tussym3" value="ปกติ">
                        <label for="tussym3" class="font-weight-400"><span></span>ปกติ</label>
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
                    <input type="text" class="form-control" name="sickdate" id="datepicker2" data-provide="datepicker" data-date-language="th-th" placeholder="วว/ดด/ปปปป" required> </input>                  
                  </div>
              </div>
              <div class="row form-group">
                   <div class="col-lg-6 col-md-6 form-group"> 
                  <label class="control-label templatemo-block" for="sickgroup">กลุ่มโรค *</label>   
                  <span id="sickgroup">              
                  <select class="form-control" name="sickgroup" id="sickgroup">
                    <option value="0">-- เลือกกลุ่มโรค --</option>
                              
                  </select>
                  </span>
                </div>
                  <div class="col-lg-6 col-md-6 form-group">                  
                    <label class="control-label templatemo-block" for="sick">ชื่อโรค *</label>
                    <span id="sick">
                      <select class="form-control" name="sick" id="sick" >
                    <option value="0">-- เลือกชื่อโรค --</option>
                                    
                  </select>
                    </span>
                    
                                  
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col-lg-12 col-md-12 form-group">                  
                    <label for="detail">รายละเอียดโรค</label>
                    <textarea class="form-control" id="detail" name="detail" rows="3"></textarea>                  
                  </div>
              </div>
              <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">บันทึก</button>
                <button  class="templatemo-white-button"><a href="addsickgroup.php?show_id=<?php echo $show_id;?>" target ='_blank' >เพิ่มกลุ่มโรค</a></button>
              </div> 
            </form>
            <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">ประวัติอาการป่วย</h2></div>
            <form name="frmMain" id="frmMain" action="" class="templatemo-login-form" method="post" >
              <div class="templatemo-content-widget no-padding">
                <div class="panel panel-default table-responsive">
                  <table id="myTable" class="table table-striped table-bordered templatemo-user-table display" cellspacing="0"  width="100%"> 
                    <?php
                      $sql = " SELECT * FROM homeless
                              INNER JOIN sicknessdetail ON sicknessdetail.hl_code = homeless.hl_code
                              INNER JOIN sickness ON sickness.sick_id = sicknessdetail.sick_id
                              INNER JOIN sickgroup ON sickgroup.sickgroup_id = sicknessdetail.sickgroup_id
                              WHERE homeless.hl_code = '$show_id' 
                              ORDER BY homeless.hl_code ASC";
                      $query = mysql_query($sql);
                    ?>
                    <thead>
                      <tr>
                        <td class="white-text templatemo-sort-by" align="center">วันที่บันทึกข้อมูล<span class="caret"></span></td>
                        <td class="white-text templatemo-sort-by" align="center">อาการป่วย<span class="caret"></span></td>
                        <td align="center">รายละเอียด</td>
                        <td align="center">ลบ</td>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($rs = mysql_fetch_assoc($query)){
                          echo "<tr>";
                            echo "<td width='30' ><div align='center'>$rs[sick_rec]</div></td>";
                            echo "<td width='70' ><div align='center'>$rs[sick_name] ($rs[sickgroup_name])</div></td>";
                            echo "<td width='68'><div align='center'><a href='symshow.php?show_id=$show_id&&sym_name=$rs[sick_name]&&sym_code=$rs[sick_id]&&sickgroup=$rs[sickgroup_id]' target ='_blank'>รายละเอียด</a></div></td>";
                            echo "<td width='40'><div align='center'><a href='delsym.php?show_id=$show_id&&sym_name=$rs[sick_name]&&sym_code=$rs[sick_id]&&sickgroup=$rs[sickgroup_id]'><i class='fa fa-trash fa-fw'></i></a></div></td>";
                          echo "</tr>";
                        }
                      mysql_close();
                      ?>
                    </tbody>
                  </table>    
                </div>                          
              </div>
              <FONT COLOR=red>*หมายเหตุ: สามารถค้นหาได้จากวันที่บันทึกข้อมูล, อาการป่วย</FONT>
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