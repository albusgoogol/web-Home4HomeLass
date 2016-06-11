<?php 
  include "config.php";
  include "checkstaff.php";
?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Home4Homeless | รับแจ้งความช่วยเหลือ</title>
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
    <!--<script language ="javascript">
   $(function(){
        $("#data-table").dataTable();
    });
    </script>-->
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
        
          <!--<img src="images/logopng.png" alt="home4homeless" class="img-responsive">-->
        
        <!--<div class="profile-photo-container">
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
            <li><a href="notification.php" class="active"><i class="fa fa-bell fa-fw"></i>รับแจ้งความช่วยเหลือ</a></li>
            <li><a href="record.php"><i class="fa fa-edit fa-fw"></i>บันทึกการเข้ารับบริการ</a></li>
            <li><a href="search.php"><i class="fa fa-list-alt fa-fw"></i>ค้นหารายงาน</a></li>
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
      
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">รับแจ้งความช่วยเหลือ</h2>
            <form name="frmMain" id="frmMain" action="" class="templatemo-login-form" method="post">
              <div class="templatemo-content-widget no-padding">
                <div class="panel panel-default table-responsive">
                  <table id="myTable" class="table table-striped table-bordered templatemo-user-table display" cellspacing="0"  width="100%"> 
                    <?php
                     
          
                      $sql = "SELECT * FROM homelessinform
                                  INNER JOIN members ON members.mem_code = homelessinform.mem_code
                                  WHERE homelessinform.hlin_status = 'แจ้งขอความช่วยเหลือ'
                                  ORDER BY homelessinform.hlin_id ASC";
                      $query = mysql_query($sql);
                    ?>
                    <thead>
                      <tr>
                        <!--<td class="white-text templatemo-sort-by" align="center">รหัส</td>-->
                        <td class="white-text templatemo-sort-by"align="center">วันที่แจ้งขอความช่วยเหลือ<span class="caret"></span></td>
                        <td class="white-text templatemo-sort-by"align="center">สถานที่พบคนไร้ที่พึ่ง<span class="caret"></span></td>
                        <td class="white-text templatemo-sort-by"align="center">ผู้แจ้ง<span class="caret"></span></td>
                        <td align="center">รายละเอียด</td>
                        <!--<td align="center">ลบ</td>-->
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($rs = mysql_fetch_array($query)){
                          echo "<tr>";
                            /*echo "<td width='40' ><div align='center'>$rs[hl_code]</div></td>";*/
                            echo "<td width='68'><div align='center'>$rs[hlin_date]</div></td>";
                            echo "<td width='120'><div align='center'>$rs[hlin_location]</div></td>";
                            echo "<td width='68'><div align='center'>$rs[mem_fname] $rs[mem_lname]</div></td>";
                            echo "<td width='68'><div align='center'><a href='notificationshow.php?show_id=$rs[hlin_id]' target ='_blank'>ข้อมูล</a></div></td>";
                            /*echo "<td width='68'><div align='center'><a href='deletenotfy.php?show_id=$rs[hl_code]'>ลบ</a></div></td>";*/
                          echo "</tr>";
                        }
                      mysql_close();
                      ?>
                    </tbody>
                  </table>    
                </div>                          
              </div>
            </form>
            <FONT COLOR=red>*หมายเหตุการค้นหา: ค้นหาได้จากวันที่, สถานที่พบ, ชื่อ-สกุลผู้แจ้งขอความช่วยเหลือ</FONT> 
            
          </div>
        </div>
        <footer class="text-right">
            <p>Home4Homeless &copy; 2015 ICT50 </p>
          </footer> 
      </div>
    </div>

  
  </body>
</html>