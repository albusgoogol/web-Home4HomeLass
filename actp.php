<?php 
  include "config.php";
  include "checkpop.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Home4Homeless | แจ้งขอความช่วยเหลือ</title>
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
        </div> -->     
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
            <!--<li><a href="indexp.php"><i class="fa fa-home fa-fw"></i>หน้าแรก</a></li>-->
            <li><a href="notify.php"><i class="fa fa-bell fa-fw"></i>แจ้งขอความช่วยเหลือ</a></li>
            <li><a href="checkhl.php"><i class="fa fa-list-alt fa-fw"></i>ตรวจสอบสถานะของคนไร้ที่พึ่ง</a></li>
            <li><a href="actp.php"  class="active"><i class="fa fa-book fa-fw"></i>คำแนะนำ/ข้อควรปฏิบัติ</a></li>
            <li><a href="aboutp.php"><i class="fa fa-envelope fa-fw"></i>ติดต่อหน่วยงาน</a></li>
            <li><a href="mempop.php"><i class="fa fa-user fa-fw"></i>ข้อมูลส่วนตัว</a></li>
            <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>ออกจากระบบ</a></li>
          </ul>  
        </nav>
      </div>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">คำแนะนำ/ข้อควรปฏิบัติ</h2>
            <form name="frmMain" id="frmMain" action="" class="templatemo-login-form" method="post" >
              <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">              
              <div class="templatemo-content-widget white-bg">                
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="images/center.jpg" alt="organizetion">
                    </a>
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase" align="center">พระราชบัญญัติควบคุมขอทาน พุทธศักราช 2484 </h2> <br>
                    <div align="justify">
                      <span style="text-decoration:underline">มาตรา 1</span> พระราชบัญญัตินี้ให้เรียกว่า " พระราชบัญญัติควบคุมการขอทานพุทธศักราช  2484" <br>
                      <span style="text-decoration:underline">มาตรา 2</span> ให้ใช้พระราชบัญญัตินี้ตั้งแต่วันประกาศในราชกิจจานุเบกษาเป็นต้นไป แต่จะใช้ในท้องที่ใดให้ประกาศโดยพระราชกฤษฎีกา <br>
                      <span style="text-decoration:underline">มาตรา 3</span> ตั้งแต่วันใช้พระราชบัญญัตินี้เป็นต้นไปให้ยกเลิกบรรดาบทกฎหมาย และข้อบังคับอื่น ส่วนที่มีบัญญัติไว้แล้วในพระราชบัญญัตินี้ หรือซึ่งแย้งต่อ<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      บทแห่งพระราชบัญญัตินี้ <br>
                      <span style="text-decoration:underline">มาตรา 4</span> การปฏิบัติ อันเป็นกิจวัตรตามลัทธิศาสนา ไม่อยู่ในบังคับแห่ง พระราชบัญญัตินี้ <br>
                      <span style="text-decoration:underline">มาตรา 5</span> ในพระราชบัญญัตินี้<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      "รัฐมนตรี" หมายความว่า รัฐมนตรีผู้รักษาการให้เป็นไปตามพระราช บัญญัตินี้<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      "อธิบดี" หมายความว่า อธิบดีแห่งกรมซึ่งรัฐมนตรีกำหนดให้มีหน้าที่ ปฏิบัติการตามพระราชบัญญัตินี้<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      "พนักงานเจ้าหน้าที่" หมายความว่า พนักงานฝ่ายปกครองหรือตำรวจและพนักงานฝ่ายปกครองหรือตำรวจชั้นผู้ใหญ่ตามความหมายที่บัญญัติไว้<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      ในประมวลกฎหมายวิธีพิจารณาความอาญา และให้หมายความตลอดถึงบุคคลซึ่งรัฐมนตรีแต่งตั้งให้มีหน้าที่ปฏิบัติการอย่างใดอย่างหนึ่งตามพระ<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      ราชบัญญัตินี้<br>
                      <span style="text-decoration:underline">มาตรา 6</span> ห้ามมิให้บุคคลใดทำการขอทานการขอทรัพย์สินของผู้อื่นโดยมิได้ทำการงานอย่างใดหรือให้ทรัพย์สินสิ่งใดตอบแทนและมิใช่เป็นการขอกันใน<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      ฐานญาติมิตรนั้นให้ถือว่าเป็นการขอทาน การขับร้อง การดีดสีตีเป่า การแสดงการเล่นต่าง ๆ หรือการกระทำ อย่างอื่นในทำนองเดียวกันนั้น <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      เมื่อมิได้มีข้อตกลงโดยตรง หรือโดยปริยายที่ จะเรียกเก็บค่าฟังค่าดูแต่ขอรับทรัพย์สินตาม แต่ผู้ฟังผู้ดูจะสมัครใจให้นั้นไม่ให้รับฟังเป็นข้อแก้ตัว<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      ว่าไม่ได้ทำการขอทานตามบทบัญญัติแห่งมาตรานี้<br>
                      <span style="text-decoration:underline">มาตรา 7</span> เมื่อปรากฏจากการสอบสวนว่า ผู้ใดทำการขอทาน และผู้นั้นเป็นคนชราภาพ หรือเป็นคนวิกลจริตพิการ หรือเป็นคนมีโรค ซึ่งไม่สามารถประกอบ<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      การอาชีพอย่างใดและไม่มีทางเลี้ยงชีพอย่างอื่น ทั้งไม่มีญาติมิตรอุปการะเลี้ยงดูก็ให้พนักงานเจ้าหน้าที่ส่งตัวไปยังสถานสงเคราะห์<br>
                      <span style="text-decoration:underline">มาตรา 8</span> เมื่อปรากฏจากการสอบสวนว่าผู้ที่ทำการขอทานไม่อยู่ในลักษณะดั่งบัญญัติไว้ในมาตรา 7 ก็ให้พนักงานเจ้าหน้าที่สั่งให้ไปติดต่อกับสำนักงาน<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      จัดหางานของรัฐบาลเพื่อได้รับความช่วยเหลือจากสถานที่ดั่งกล่าวนั้นต่อไป ถ้าภายในกำหนด 30 วัน นับแต่วันที่ได้รับคำสั่งดั่งกล่าวในวรรคก่อน<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      ผู้รับคำสั่งหาได้ไปติดต่อกับสถานที่ตามคำสั่งนั้นไม่ก็ดีไปติดต่อแล้วแต่ไม่ยอมรับการช่วยเหลือโดยไม่มีเหตุอันสมควรเป็นข้อแก้ตัวก็ดีหรือได้รับ<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      การช่วยเหลือแล้วต่อมาได้ละทิ้งการช่วยเหลือนั้นเสียก็ดีหรือใช้อุบายด้วยประการใด หลีกเลี่ยงไม่ยอมทำการงาน หรือรับการช่วยเหลือ ซึ่ง <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      ทางการแห่งสถานที่ที่กล่าวแล้วได้จัดการช่วยเหลือให้มีงานทำ หรือมีที่อยู่กินอาศัยก็ดี และปรากฏว่าผู้นั้นได้กระทำการขอทานอีกให้เจ้าหน้าที่<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      ส่งตัวไปยังแหล่งประกอบการงานตามนัยแห่งกฎหมายว่าด้วยการจัดหางานให้ผู้ไร้อาชีพ<br>
                      <span style="text-decoration:underline">มาตรา 9</span> ผู้ที่ถูกส่งไปยังสถานสงเคราะห์นั้นอยู่ในอำนาจการควบคุมของอธิบดี อธิบดีอาจมอบหมายให้ข้าหลวงประจำจังหวัด หรือนายกเทศมนตรี เป็นผู้มี<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      อำนาจควบคุมต่อไปอีกชั้นหนึ่งได้ ถ้าปรากฏว่าผู้ที่ถูกส่งไปยังสถานสงเคราะห์นั้นมีที่อาศัย และทางดำรง ชีพพอสมควรแก่อัตตภาพให้อธิบดีหรือ<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      ผู้ที่ได้รับมอบหมายพิจารณาปล่อยตัวไป ถ้าบุคคลนั้นเป็นโรคเรื้อน วัณโรค หรือโรคติดต่ออันตรายจะต้องมีหลักฐาน แสดงให้เป็นที่พอใจด้วยว่าได้<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      พ้นเขตระยะติดต่อแพร่หลายแล้ว หรือเมื่อปล่อยตัวไปแล้วจะไปอยู่ในที่ซึ่งมีขอบเขตจำกัดการแพร่หลายของโรคดั่งว่านั้น<br>
                      <span style="text-decoration:underline">มาตรา 10</span> อธิบดีหรือผู้ที่ได้รับมอบหมายจะสั่งให้ผู้ที่อยู่ในสถานสงเคราะห์ทำการงานตามที่เห็นสมควรหรือจะส่งไปทำการงานที่อื่นก็ได้<br>
                      <span style="text-decoration:underline">มาตรา 11</span> ถ้าผู้ที่ถูกส่งไปยังสถานสงเคราะห์ หรือที่อื่นใดเป็นโรคเรื้อนหรือวัณโรคหรือโรคติดต่ออันตรายให้แยกการควบคุมผู้นั้นไว้เพื่อป้องกันมิให้โรค<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      นั้นแพร่หลายและติดต่อ<br>
                      <span style="text-decoration:underline">มาตรา 12</span> ให้อธิบดีตราข้อบังคับกำหนดวินัยแห่งความประพฤติขึ้น โทษทางวินัยพึงทำได้ไม่เกินกว่าที่กำหนดไว้ดังต่อไปนี้<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      (ก) ขังหรือขังห้องมืด<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      (ข) ตัดหรือลดประโยชน์อันจัดขึ้นเพื่อดำเนินการควบคุม <br>
                      <span style="text-decoration:underline">มาตรา 13</span> ผู้ที่ถูกสั่งตัวไปยังสถานสงเคราะห์หรือที่อื่นใดไม่ไปหรือหลบหนีจากสถานที่นั้นมีความผิดต้องระวางโทษปรับไม่<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      เกินหนึ่งร้อยบาทหรือจำคุกไม่เกินหนึ่งเดือนหรือทั้งปรับทั้งจำ<br>
                      <span style="text-decoration:underline">มาตรา 14</span> ให้รัฐมนตรีว่าการกระทรวงมหาดไทย รักษาการให้เป็น ไปตามพระราชบัญญัตินี้ และมีอำนาจกำหนดกรมในสังกัดกระทรวงมหาดไทยให้มีหน้า<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      ที่ควบคุมดำเนินการปฏิบัติกับมีอำนาจออกกฎกระทรวงเพื่อปฏิบัติการให้เป็นไปตามพระราชบัญญัตินี้
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
    
    <!-- JS -->
    <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
      
    </script>
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

  </body>
</html>