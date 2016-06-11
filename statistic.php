<?php 
  include "config.php";
  include "checkstaff.php";
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Home4Homeless | สถิติ</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!-- 
    Visual Admin Template
    http://www.templatemo.com/preview/templatemo_455_visual_admin
    -->
    <link href='css/css.css' rel='stylesheet' type='text/css'> <!-- font -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <script src="js/jquery-1.10.2.min.js"></script>

  <!----script graph-------->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<!--[if IE 7]>
<link rel="stylesheet" href="css/font-awesome-ie7.min.css">
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
        <div class="mobile-menu-icon">
          <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="notification.php"><i class="fa fa-bell fa-fw"></i>รับแจ้งความช่วยเหลือ</a></li>
            <li><a href="record.php"><i class="fa fa-edit fa-fw"></i>บันทึกการเข้ารับบริการ</a></li>
            <li><a href="search.php"><i class="fa fa-list-alt fa-fw"></i>ค้นหารายงาน</a></li>
            <li><a href="checkstatus.php"><i class="fa fa-list-alt fa-fw"></i>ตรวจสอบสถานะติดตาม</a></li>
            <li><a href="statistic.php" class="active"><i class="fa fa-bar-chart fa-fw"></i>สถิติ</a></li>
            <li><a href="act.php"><i class="fa fa-book fa-fw"></i>คำแนะนำ/ข้อควรปฏิบัติ</a></li>
            <li><a href="about.php"><i class="fa fa-envelope fa-fw"></i>ติดต่อหน่วยงาน</a></li>
            <li><a href="memstaff.php"><i class="fa fa-user fa-fw"></i>ข้อมูลส่วนตัว</a></li>
            <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>ออกจากระบบ</a></li>
          </ul>  
        </nav>
      </div>
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-content-container">
          <div class="templatemo-flex-row flex-content-row templatemo-overflow-hidden"> <!-- overflow hidden for iPad mini landscape view-->
            <div class="col-1 templatemo-overflow-hidden">
              <div class="templatemo-content-widget white-bg templatemo-overflow-hidden">
              <h2 class="margin-bottom-10">สถิติ > รายงานสถิติ</h2>
              <div class="row form-group">
                
                
                <script>
                  $(function () {
                    $('#container').highcharts({
                      data: {
                        table: 'datatable'
                      },
                      chart: {
                        type: 'column'
                      },
                      title: {
                        text: 'สถิติคนไร้ที่พึ่งทั้งหมดแบ่งตามช่วงอายุ'
                      },
                      yAxis: {
                        allowDecimals: false,
                        title: {
                          text: 'จำนวน (คน)'
                        }
                      },
                      tooltip: {
                        formatter: function () {
                          return '<b>' + this.series.name + '</b><br/>' +
                          this.point.y + ' ' + this.point.name.toLowerCase();
                        }
                      }
                    });
                  });
                </script>
              </div>
                <div id='container' style='min-width: 310px; height: 400px; margin: 0 auto'></div>
                <?php $query = mysql_query("SELECT * FROM age"); ?>
                <table id="datatable">
                  <thead>
                    <tr>
                      <th></th>
                      <th>ชาย</th>
                      <th>หญิง</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                 while ($age = mysql_fetch_array($query)) {
  
                      ?>
                    <tr>
                      <th><?php
                  
                        echo $age["age_name"];
                      ?></th>
                        <td><?php
                        $male = mysql_query("SELECT homeless.age_code,age_name,COUNT('homeless.age_code') AS agecount 
                                            FROM homeless
                                            LEFT JOIN age ON homeless.age_code = age.age_code
                                            WHERE `hl_sex` = 'ชาย'
                                            GROUP BY age_code");
                        while ($num_male = mysql_fetch_array($male)){
                          if($num_male["age_name"] == $age["age_name"]){
                             echo $num_male["agecount"];
                          }
                        }
                         // echo $age_male[0]["agecount"];
                        ?></td>
                        <td> <?php
                         $female = mysql_query("SELECT homeless.age_code,age_name,COUNT('homeless.age_code') AS agecount FROM homeless
                                            LEFT JOIN age ON homeless.age_code = age.age_code
                                            WHERE `hl_sex` = 'หญิง'
                                            GROUP BY age_code");


                        while ($num_female = mysql_fetch_array($female)){
                          if($num_female["age_name"] == $age["age_name"]){
                             echo $num_female["agecount"];
                          }
                        }
                          //echo $age_female[0]["agecount"];
                        ?></td>
                    </tr>
                    <?php
                  }
                  ?>
                  </tbody>
                </table>
                <br>
                <br> <br><br>
                <div class="row row form-group">
                <center><h2 class="margin-bottom-10">สถิติการเข้ารับบริการ</h2></center>
                <div class="col-lg-4 col-md-4 form-group" align="center">
                  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label>ปี: </label>
                </div>
                <div class="col-lg-4 col-md-4 form-group">
                  <select class="form-control" id="dynamic_data7">
                        <option value="*">- เลือกปี -</option>
                        <option value="ทั้งหมด">ทั้งหมด</option>
                        <?php 
                            $result=mysql_query("SELECT date_format(hldetail_date,'%Y') as allyear FROM homelessdetail  GROUP BY date_format(hldetail_date,'%y') ORDER BY date_format(hldetail_date,'%y')");
                            while($row = mysql_fetch_array($result)){
                         ?>
                         <option value='<?php echo $row['allyear']; ?>' ><?php echo $row['allyear']; ?></option>
                         <?php 
                           }
                         ?>
                  </select> 
                </div> 
                <div class="col-lg-4 col-md-4 form-group">
                  
                  <button type="submit" name="btn7" id="btn7" class="templatemo-white-button">ค้นหา</button>
                 
                </div>
                 <script type="text/javascript">
              $(function () {
                //on page load  
              getAjaxData7(1); 
              //on changing select option
              $('#btn7').click(function(){
                var val = $('#dynamic_data7').val();
                getAjaxData7(val);
              });
 
              function getAjaxData7(id){
                //use getJSON to get the dynamic data via AJAX call
                $.getJSON('localtion_report_statussv.php', {id: id}, function(chartData7) {
                $('#container7').highcharts({
                  chart: {
                          plotBackgroundColor: null,
                          plotBorderWidth: null,
                          plotShadow: false,
                          type: 'pie'
                  },
                  title: {
                          text: 'เข้ารับบริการ'
                  },
                  tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                  },
                  plotOptions: {
                                pie: {
                                      allowPointSelect: true,
                                      cursor: 'pointer',
                                      dataLabels: {
                                                    enabled: true,
                                                    format: '<b>{point.name}</b>: {point.y} คน คิดเป็น: {point.percentage:.1f} %',
                                                    style: {
                                                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                    }
                                      }
                                }
                              },
                  series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: chartData7
                          }]

        
                });
              });
            }
          });
            </script>

            <div id="container7" style='min-width: 310px; height: 400px; margin: 0 auto'></div>
             
            </div> <br><br><br>
            <div class="row row form-group">
                <center><h2 class="margin-bottom-10">สถิติอายุคนไร้ที่พึ่ง</h2></center>
                <div class="col-lg-4 col-md-4 form-group" align="center">
                  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label>ปี: </label>
                </div>
                <div class="col-lg-4 col-md-4 form-group">
                  <select class="form-control" id="dynamic_data3">
                        <option value="*">- เลือกปี -</option>
                        <option value="ทั้งหมด">ทั้งหมด</option>
                        <?php 
                            $result=mysql_query("SELECT date_format(hldetail_date,'%Y') as allyear FROM homelessdetail  GROUP BY date_format(hldetail_date,'%y') ORDER BY date_format(hldetail_date,'%y')");
                            while($row = mysql_fetch_array($result)){
                         ?>
                         <option value='<?php echo $row['allyear']; ?>' ><?php echo $row['allyear']; ?></option>
                         <?php 
                           }
                         ?>
                  </select> 
                </div> 
                <div class="col-lg-4 col-md-4 form-group">
                  
                  <button type="submit" name="btn3" id="btn3" class="templatemo-white-button">ค้นหา</button>
                 
                </div>
                 <script type="text/javascript">
              $(function () {
                //on page load  
              getAjaxData3(1); 
              //on changing select option
              $('#btn3').click(function(){
                var val = $('#dynamic_data3').val();
                getAjaxData3(val);
              });
 
              function getAjaxData3(id){
                //use getJSON to get the dynamic data via AJAX call
                $.getJSON('localtion_report_age.php', {id: id}, function(chartData3) {
                $('#container3').highcharts({
                  chart: {
                          plotBackgroundColor: null,
                          plotBorderWidth: null,
                          plotShadow: false,
                          type: 'pie'
                  },
                  title: {
                          text: 'ช่วงอายุ'
                  },
                  tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                  },
                  plotOptions: {
                                pie: {
                                      allowPointSelect: true,
                                      cursor: 'pointer',
                                      dataLabels: {
                                                    enabled: true,
                                                    format: '<b>{point.name}</b>: {point.y} คน คิดเป็น: {point.percentage:.1f} %',
                                                    style: {
                                                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                    }
                                      }
                                }
                              },
                  series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: chartData3
                          }]

        
                });
              });
            }
          });
            </script>

            <div id="container3" style='min-width: 310px; height: 400px; margin: 0 auto'></div>
             
            </div> <br><br><br>
              <div class="row row form-group">
                <center><h2 class="margin-bottom-10">สถิติสถานที่พบคนไร้ที่พึ่ง</h2></center>
                <div class="col-lg-4 col-md-4 form-group" align="center">
                  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label>ปี: </label>
                </div>
                <div class="col-lg-4 col-md-4 form-group">
                  <select class="form-control" id="dynamic_data2">
                        <option value="*">- เลือกปี -</option>
                        <option value="ทั้งหมด">ทั้งหมด</option>
                        <?php 
                            $result=mysql_query("SELECT date_format(hldetail_date,'%Y') as allyear FROM homelessdetail  GROUP BY date_format(hldetail_date,'%y') ORDER BY date_format(hldetail_date,'%y')");
                            while($row = mysql_fetch_array($result)){
                         ?>
                         <option value='<?php echo $row['allyear']; ?>' ><?php echo $row['allyear']; ?></option>
                         <?php 
                           }
                         ?>
                  </select> 
                </div> 
                <div class="col-lg-4 col-md-4 form-group">
                  
                  <button type="submit" name="btn2" id="btn2" class="templatemo-white-button">ค้นหา</button>
                 
                </div>
                 <script type="text/javascript">
              $(function () {
                //on page load  
              getAjaxData2(1); 
              //on changing select option
              $('#btn2').click(function(){
                var val = $('#dynamic_data2').val();
                getAjaxData2(val);
              });
 
              function getAjaxData2(id){
                //use getJSON to get the dynamic data via AJAX call
                $.getJSON('localtion_report_lt.php', {id: id}, function(chartData2) {
                $('#container2').highcharts({
                  chart: {
                          plotBackgroundColor: null,
                          plotBorderWidth: null,
                          plotShadow: false,
                          type: 'pie'
                  },
                  title: {
                          text: 'สถานที่พบคนไร้ที่พึ่ง'
                  },
                  tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                  },
                  plotOptions: {
                                pie: {
                                      allowPointSelect: true,
                                      cursor: 'pointer',
                                      dataLabels: {
                                                    enabled: true,
                                                    format: '<b>{point.name}</b>: {point.y} คน คิดเป็น: {point.percentage:.1f} %',
                                                    style: {
                                                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                    }
                                      }
                                }
                              },
                  series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: chartData2
                          }]

        
                });
              });
            }
          });
            </script>

            <div id="container2" style='min-width: 310px; height: 400px; margin: 0 auto'></div>
             
            </div> 
          <br><br><br>
              <div class="row row form-group">
                <center><h2 class="margin-bottom-10">สถิติสาเหตุการเป็นคนไร้ที่พึ่ง</h2></center>
                <div class="col-lg-4 col-md-4 form-group" align="center">
                  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label>ปี: </label>
                </div>
                <div class="col-lg-4 col-md-4 form-group">
                  <select class="form-control" id="dynamic_data4">
                        <option value="*">- เลือกปี -</option>
                        <option value="ทั้งหมด">ทั้งหมด</option>
                        <?php 
                            $result=mysql_query("SELECT date_format(hldetail_date,'%Y') as allyear FROM homelessdetail  GROUP BY date_format(hldetail_date,'%y') ORDER BY date_format(hldetail_date,'%y')");
                            while($row = mysql_fetch_array($result)){
                         ?>
                         <option value='<?php echo $row['allyear']; ?>' ><?php echo $row['allyear']; ?></option>
                         <?php 
                           }
                         ?>
                  </select> 
                </div> 
                <div class="col-lg-4 col-md-4 form-group">
                  
                  <button type="submit" name="btn4" id="btn4" class="templatemo-white-button">ค้นหา</button>
                 
                </div>
                 <script type="text/javascript">
              $(function () {
                //on page load  
              getAjaxData4(1); 
              //on changing select option
              $('#btn4').click(function(){
                var val = $('#dynamic_data4').val();
                getAjaxData4(val);
              });
 
              function getAjaxData4(id){
                //use getJSON to get the dynamic data via AJAX call
                $.getJSON('localtion_report_cause.php', {id: id}, function(chartData4) {
                $('#container4').highcharts({
                  chart: {
                          plotBackgroundColor: null,
                          plotBorderWidth: null,
                          plotShadow: false,
                          type: 'pie'
                  },
                  title: {
                          text: 'สถิติสาเหตุการเป็นคนไร้ที่พึ่ง'
                  },
                  tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                  },
                  plotOptions: {
                                pie: {
                                      allowPointSelect: true,
                                      cursor: 'pointer',
                                      dataLabels: {
                                                    enabled: true,
                                                    format: '<b>{point.name}</b>: {point.y} คน คิดเป็น: {point.percentage:.1f} %',
                                                    style: {
                                                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                    }
                                      }
                                }
                              },
                  series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: chartData4
                          }]

        
                });
              });
            }
          });
            </script>

            <div id="container4" style='min-width: 310px; height: 400px; margin: 0 auto'></div>
             
            </div> <br><br><br>
            <div class="row row form-group">
                <center><h2 class="margin-bottom-10">สถิติสถานะทางร่างกายของคนไร้ที่พึ่ง</h2></center>
                <div class="col-lg-4 col-md-4 form-group" align="center">
                  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label>ปี: </label>
                </div>
                <div class="col-lg-4 col-md-4 form-group">
                  <select class="form-control" id="dynamic_data5">
                        <option value="*">- เลือกปี -</option>
                        <option value="ทั้งหมด">ทั้งหมด</option>
                        <?php 
                            $result=mysql_query("SELECT date_format(hldetail_date,'%Y') as allyear FROM homelessdetail  GROUP BY date_format(hldetail_date,'%y') ORDER BY date_format(hldetail_date,'%y')");
                            while($row = mysql_fetch_array($result)){
                         ?>
                         <option value='<?php echo $row['allyear']; ?>' ><?php echo $row['allyear']; ?></option>
                         <?php 
                           }
                         ?>
                  </select> 
                </div> 
                <div class="col-lg-4 col-md-4 form-group">
                  
                  <button type="submit" name="btn5" id="btn5" class="templatemo-white-button">ค้นหา</button>
                 
                </div>
                 <script type="text/javascript">
              $(function () {
                //on page load  
              getAjaxData5(1); 
              //on changing select option
              $('#btn5').click(function(){
                var val = $('#dynamic_data5').val();
                getAjaxData5(val);
              });
 
              function getAjaxData5(id){
                //use getJSON to get the dynamic data via AJAX call
                $.getJSON('localtion_report_status.php', {id: id}, function(chartData5) {
                $('#container5').highcharts({
                  chart: {
                          plotBackgroundColor: null,
                          plotBorderWidth: null,
                          plotShadow: false,
                          type: 'pie'
                  },
                  title: {
                          text: 'สถิติสถานะทางร่างกายของคนไร้ที่พึ่ง'
                  },
                  tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                  },
                  plotOptions: {
                                pie: {
                                      allowPointSelect: true,
                                      cursor: 'pointer',
                                      dataLabels: {
                                                    enabled: true,
                                                    format: '<b>{point.name}</b>: {point.y} คน คิดเป็น: {point.percentage:.1f} %',
                                                    style: {
                                                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                    }
                                      }
                                }
                              },
                  series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: chartData5
                          }]

        
                });
              });
            }
          });
            </script>

            <div id="container5" style='min-width: 310px; height: 400px; margin: 0 auto'></div>
             
            </div> <br><br><br>

            <div class="row row form-group">
                <center><h2 class="margin-bottom-10">สถิติความต้องการให้รัฐช่วยเหลือของคนไร้ที่พึ่ง</h2></center>
                <div class="col-lg-4 col-md-4 form-group" align="center">
                  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label>ปี: </label>
                </div>
                <div class="col-lg-4 col-md-4 form-group">
                  <select class="form-control" id="dynamic_data6">
                        <option value="*">- เลือกปี -</option>
                        <option value="ทั้งหมด">ทั้งหมด</option>
                        <?php 
                            $result=mysql_query("SELECT date_format(hldetail_date,'%Y') as allyear FROM homelessdetail  GROUP BY date_format(hldetail_date,'%y') ORDER BY date_format(hldetail_date,'%y')");
                            while($row = mysql_fetch_array($result)){
                         ?>
                         <option value='<?php echo $row['allyear']; ?>' ><?php echo $row['allyear']; ?></option>
                         <?php 
                           }
                         ?>
                  </select> 
                </div> 
                <div class="col-lg-4 col-md-4 form-group">
                  
                  <button type="submit" name="btn6" id="btn6" class="templatemo-white-button">ค้นหา</button>
                 
                </div>
                 <script type="text/javascript">
              $(function () {
                //on page load  
              getAjaxData6(1); 
              //on changing select option
              $('#btn6').click(function(){
                var val = $('#dynamic_data6').val();
                getAjaxData6(val);
              });
 
              function getAjaxData6(id){
                //use getJSON to get the dynamic data via AJAX call
                $.getJSON('localtion_report_tservive.php', {id: id}, function(chartData6) {
                $('#container6').highcharts({
                  chart: {
                          plotBackgroundColor: null,
                          plotBorderWidth: null,
                          plotShadow: false,
                          type: 'pie'
                  },
                  title: {
                          text: 'สถิติความต้องการให้รัฐช่วยเหลือของคนไร้ที่พึ่ง'
                  },
                  tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                  },
                  plotOptions: {
                                pie: {
                                      allowPointSelect: true,
                                      cursor: 'pointer',
                                      dataLabels: {
                                                    enabled: true,
                                                    format: '<b>{point.name}</b>: {point.y} คน คิดเป็น: {point.percentage:.1f} %',
                                                    style: {
                                                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                    }
                                      }
                                }
                              },
                  series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: chartData6
                          }]

        
                });
              });
            }
          });
            </script>

            <div id="container6" style='min-width: 310px; height: 400px; margin: 0 auto'></div>
             
            </div> <br><br><br>
          </div>

            </div>
            

        </div>
        <footer class="text-right">
            <p>Home4Homeless &copy; 2015 ICT50 </p>
        </footer>  
        </div>
</div>
<!--end content-->


</body>

</html>