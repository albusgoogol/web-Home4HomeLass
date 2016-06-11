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
            <!--<li><a href="indexp.php"><i class="fa fa-home fa-fw"></i>หน้าแรก</a></li>-->
            <li><a href="notify.php" class="active"><i class="fa fa-bell fa-fw"></i>แจ้งขอความช่วยเหลือ</a></li>
            <li><a href="checkhl.php"><i class="fa fa-list-alt fa-fw"></i>ตรวจสอบสถานะของคนไร้ที่พึ่ง</a></li>
            <li><a href="actp.php"><i class="fa fa-book fa-fw"></i>คำแนะนำ/ข้อควรปฏิบัติ</a></li>
            <li><a href="aboutp.php"><i class="fa fa-envelope fa-fw"></i>ติดต่อหน่วยงาน</a></li>
            <li><a href="mempop.php"><i class="fa fa-user fa-fw"></i>ข้อมูลส่วนตัว</a></li>
            <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>ออกจากระบบ</a></li>
          </ul>  
        </nav>
      </div>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <!--<div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="" class="active">Admin panel</a></li>
                <li><a href="">Dashboard</a></li>
                <li><a href="">Overview</a></li>
                <li><a href="login.html">Sign in form</a></li>
              </ul>  
            </nav> 
          </div>
        </div>-->
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <form name="frmMain" id="frmMain" action="db_notify.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
              <div class="col-1">
                  <div class="panel-heading templatemo-position-relative"><h2>แจ้งขอความช่วยเหลือ</h2></div>
                  <div class="row form-group">
                    <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="fname">สถานที่ *</label>
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
                      <input type="hidden" class="form-control" name="nday" id="nday" value="<?=$date?>"/>

                      <input type="text" class="form-control" name="autocomplete" id="autocomplete" placeholder="ค้นหาสถานที่" onFocus="geolocate()" type="text" required/>                  
                      <script>
                        // This example displays an address form, using the autocomplete feature
                        // of the Google Places API to help users fill in the information.
                        // This example requires the Places library. Include the libraries=places
                        // parameter when you first load the API. For example:
                        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                        var placeSearch, autocomplete;
                        var componentForm = {
                          street_number: 'short_name',
                          route: 'long_name',
                          locality: 'long_name',
                          administrative_area_level_1: 'short_name',
                          country: 'long_name',
                          postal_code: 'short_name'
                        };

                        function initAutocomplete() {
                          // Create the autocomplete object, restricting the search to geographical
                          // location types.
                          autocomplete = new google.maps.places.Autocomplete(
                          /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                          {types: ['geocode']});

                          // When the user selects an address from the dropdown, populate the address
                          // fields in the form.
                          autocomplete.addListener('place_changed', fillInAddress);
                        }

                        function fillInAddress() {
                          // Get the place details from the autocomplete object.
                          var place = autocomplete.getPlace();

                          for (var component in componentForm) {
                            document.getElementById(component).value = '';
                            document.getElementById(component).disabled = false;
                          }

                          // Get each component of the address from the place details
                          // and fill the corresponding field on the form.
                          for (var i = 0; i < place.address_components.length; i++) {
                            var addressType = place.address_components[i].types[0];
                            if (componentForm[addressType]) {
                              var val = place.address_components[i][componentForm[addressType]];
                              document.getElementById(addressType).value = val;
                            }
                          }
                        }

                        // Bias the autocomplete object to the user's geographical location,
                        // as supplied by the browser's 'navigator.geolocation' object.
                        function geolocate() {
                          if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function(position) {
                              var geolocation = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                              };
                              var circle = new google.maps.Circle({
                                center: geolocation,
                                radius: position.coords.accuracy
                              });
                              autocomplete.setBounds(circle.getBounds());
                            });
                          }
                        }
                      </script>
                      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUimia01-ef8WyeSaCGtwXf6WkaYNi7YI&libraries=places&callback=initAutocomplete"async defer></script>
                  </div>
                </div>
                
                  <div class="table-responsive">
                    <center>
                      <table class="table table-striped table-bordered" id="tbExp" border-color:#c0c0c0 >
                        <tr style="background: #0cadbe; color:#ffffff";>
                          <td><div align="center"><label>รูปที่</div></td>
                          <td><div align="center"><label>คำอธิบายรูปภาพ</label></div></td>
                          <td><div align="center"><label>รูปภาพ</label></div></td>
                          <td><div align="center"><label>ตัวอย่างภาพ</label></div></td>
                        </tr>
                        <tr>
                          <td><center>1</center> </td>
                          <td><center><INPUT TYPE="TEXT" size="60" class="form-control input-sm" style="width:100%" NAME="Column2_1" VALUE=""></center> </td>
                          <td><center><input type="file" name="filUpload1" id="file_upload" OnChange="showPreview(this,1)" required></center></td>
                          <td><center><img id="imgAvatar1" width="150" height="150"></img></center></td>
                        </tr>
                      </table>
                      <br/>

                      <input type="hidden" name="hdnMaxLine" value="1">
                      <button name="btnAdd" type="button" id="btnAdd" class="templatemo-blue-button" onClick="CreateNewRow();">เพิ่มรูปภาพ</button>
                      <button name="btnDel" type="button" id="btnDel" class="templatemo-white-button" onClick="RemoveRow();">ลบรูปภาพ</button>
                      <br/><br/>
                  </center>

                  <script language="JavaScript">
                    function showPreview(ele,idx)
                    {

                      $('#imgAvatar'+idx).attr('src', ele.value); // for IE
                      if (ele.files && ele.files[0]) {
                        var reader = new FileReader();
                  
                        reader.onload = function (e) {
                          $('#imgAvatar'+idx).attr('src', e.target.result);
                        }

                        reader.readAsDataURL(ele.files[0]);
                      }
                    }
                  </script>
        
                  <script type="text/javascript">

                  function CreateNewRow()
                  {
                    var intLine = parseInt(document.frmMain.hdnMaxLine.value);
                    intLine++;
                
                    var theTable = document.all.tbExp
                    var newRow = theTable.insertRow(theTable.rows.length)
                    newRow.id = newRow.uniqueID
              
                    var item1 = 1
                    var newCell
              
                    //*** Column 1 ***//
                    newCell = newRow.insertCell(0)
                    newCell.id = newCell.uniqueID
                    newCell.setAttribute("className", "css-name");
                    newCell.innerHTML = "<center>"+intLine+"</center>"



                    //*** Column 2 ***//
                    newCell = newRow.insertCell(1)
                    newCell.id = newCell.uniqueID
                    newCell.setAttribute("className", "css-name");
                    newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" size=\"200\" class=\"form-control input-sm\" style=\"width:100%\" NAME=\"Column2_"+intLine+"\" VALUE=\"\"></center>"   
              
                    //*** Column 3 ***//
                    newCell = newRow.insertCell(2)
                    newCell.id = newCell.uniqueID
                    newCell.setAttribute("className", "css-name");
                    newCell.innerHTML = "<center><input type=\"file\" name=\"filUpload"+intLine+"\" id=\"file_upload\" OnChange=\"showPreview(this,"+intLine+")\"></center>" 

                    //*** Column 4 ***//
                    newCell = newRow.insertCell(3)
                    newCell.id = newCell.uniqueID
                    newCell.setAttribute("className", "css-name");
                    newCell.innerHTML = "<center><img id=\"imgAvatar"+intLine+"\" width=\"150\" height=\"150\"></img></center>"    
              
                    document.frmMain.hdnMaxLine.value = intLine;
                  }
  
                  function RemoveRow()
                  {
                    intLine = parseInt(document.frmMain.hdnMaxLine.value);
                    if(parseInt(intLine) > 1)
                    {
                      theTable = (document.all) ? document.all.tbExp : 
                      document.getElementById("tbExp")
                      theTableBody = theTable.tBodies[0];
                      theTableBody.deleteRow(intLine);
                      intLine--;
                      document.frmMain.hdnMaxLine.value = intLine;
                    } 
                  } 

                  //////////////////////////
                  </script>  
                </center>    
            </div>
                  <div class="form-group text-right">
                <button type="submit" name="submit" id="submit" class="templatemo-blue-button">โพสต์</button>
              </div>
              </div>  
            </form> 
          </div>        
        </div> <!-- Second row ends -->
          <footer class="text-right">
            <p>Home4Homeless &copy; 2015 ICT50 </p>
          </footer>         
        </div>
      </div>
    </div>
    
    <!-- JS -->
    <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

  </body>
</html>