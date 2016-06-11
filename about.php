<?php 
  include "config.php";
  include "checkstaff.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Home4Homeless | ติดต่อหน่วยงาน</title>
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
          <div class="square"></div>
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
              <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">           
          </div>
        </form>-->
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="notification.php"><i class="fa fa-bell fa-fw"></i>รับแจ้งความช่วยเหลือ</a></li>
            <li><a href="record.php"><i class="fa fa-edit fa-fw"></i>บันทึกการเข้ารับบริการ</a></li>
            <li><a href="search.php"><i class="fa fa-list-alt fa-fw"></i>ค้นหารายงาน</a></li>
            <li><a href="checkstatus.php"><i class="fa fa-list-alt fa-fw"></i>ตรวจสอบสถานะติดตาม</a></li>
            <li><a href="statistic.php"><i class="fa fa-bar-chart fa-fw"></i>สถิติ</a></li>
            <li><a href="act.php"><i class="fa fa-book fa-fw"></i>คำแนะนำ/ข้อควรปฏิบัติ</a></li>
            <li><a href="about.php"   class="active"><i class="fa fa-envelope fa-fw"></i>ติดต่อหน่วยงาน</a></li>
            <li><a href="memstaff.php"><i class="fa fa-user fa-fw"></i>ข้อมูลส่วนตัว</a></li>
            <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>ออกจากระบบ</a></li>
          </ul>  
        </nav>
      </div>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">ข้อมูลติดต่อหน่วยงาน</h2>
            <form name="frmMain" id="frmMain" action="" class="templatemo-login-form" method="post" >
              <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">              
              <div class="templatemo-content-widget white-bg">
                                
                <div class="media">
                  <!--<div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="images/center.jpg" alt="organizetion">
                    </a>
                  </div>-->
                  <div class="templatemo-content-widget no-padding">
                
                    <div class="panel panel-default table-responsive">
                  <table id="myTable" class="table table-striped table-bordered templatemo-user-table display" cellspacing="0"  width="100%"> 
                    <?php
                      $sql = "SELECT * FROM organization
                              ORDER BY or_name ASC";
                      $query = mysql_query($sql);
                    ?>
                    <thead>
                      <tr>
                        <td class="white-text templatemo-sort-by"align="center">หน่วยงาน<span class="caret"></span></td>
                        <td class="white-text templatemo-sort-by"align="center">เบอร์โทรติดต่อ<span class="caret"></span></td>
                        <td class="white-text templatemo-sort-by"align="center">ที่อยู่หน่วยงาน<span class="caret"></span></td>
                        <td align="center">รายละเอียด</td>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($rs = mysql_fetch_assoc($query)){
                          echo "<tr>";
                            echo "<td width='40' ><div align='center'>$rs[or_name]</div></td>";
                            echo "<td width='68'><div align='center'>$rs[or_tel]</div></td>";
                            echo "<td width='68'><div align='center'>$rs[or_address]</div></td>";
                            echo "<td width='68'><div align='center'><a href='editorganize.php?id=$rs[or_code]'><i class='fa fa-edit fa-fw'></i></div></td>";
                          echo "</tr>";
                        }
                      mysql_close();
                      ?>
                    </tbody>
                  </table>

                </div>
                <FONT COLOR=red>*หมายเหตุการค้นหา: ค้นหาได้จากหน่วยงาน, เบอร์โทรติดต่อ, ที่อยู่หน่วยงาน</FONT>   
                </div>
                            
                  </div>        
                </div>                
              </div>                
            </div>
          </div> <!-- Second row ends -->
            </form>
          </div>
          <footer class="text-right">
            <p>Home4Homeless &copy; 2015 ICT50 </p>
          </footer>
        </div>
      </div>
    </div>
    
  </body>
</html>