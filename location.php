<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

    include "configs.php";
    mysql_query("SET NAMES UTF8");
    conndb();

    $data = $_GET['data'];
    $val = $_GET['val'];

          /* เงื่อนไข การแบ่งภูมิภาค จังหวัด อำเภอ ตำบล ของที่อยู่ตามภูมิลำเนา*/
         
          if ($data=='geography') { 
              echo "<select class='col-sm-3 form-control' name='geography' onChange=\"dochange('province', this.value)\">";
              echo "<option value='0'>- เลือกภูมิภาค -</option>\n";
              $result=mysql_query("SELECT * from geography ORDER BY GEO_NAME");
              while($row = mysql_fetch_array($result)){
                   echo "<option value='$row[GEO_ID]' >$row[GEO_NAME]</option>" ;
              }
         }else if ($data=='province') { 
              echo "<select class='col-sm-3 form-control' name='province' onChange=\"dochange('amphur', this.value)\">";
              echo "<option value='0'>- เลือกจังหวัด -</option>\n";
              $result=mysql_query("SELECT * FROM province WHERE GEO_ID = '$val' ORDER BY prov_name");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[prov_code]\" >$row[prov_name]</option>" ;
              }
         } 
         else if ($data=='amphur') {
              echo "<select class='col-sm-3 form-control' name='amphur' onChange=\"dochange('district', this.value)\">";  
              echo "<option value='0'>- เลือกอำเภอ -</option>\n";                           
              $result=mysql_query("SELECT * FROM amphur WHERE prov_code = '$val' ORDER BY AMPHUR_NAME");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[am_code]\" >$row[AMPHUR_NAME]</option> " ;
              }
         } else if ($data=='district') {
              echo "<select class='col-sm-3 form-control' name='district'>\n";
              echo "<option value='0'>- เลือกตำบล -</option>\n";
              $result=mysql_query("SELECT * FROM district WHERE am_code = '$val' ORDER BY DISTRICT_NAME");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[dis_code]\" >$row[DISTRICT_NAME]</option> \n" ;
              }
         }

         /* เงื่อนไข การแบ่งภูมิภาค จังหวัด อำเภอ ตำบล ของที่อยู่ปัจจุบัน*/

          if ($data=='geography1') { 
              echo "<select class='col-sm-3 form-control' name='geography1' onChange=\"dochange('province1', this.value)\">";
              echo "<option value='0'>-- เลือกภูมิภาค --</option>\n";
              $result=mysql_query("SELECT * from geography ORDER BY GEO_NAME");
              while($row = mysql_fetch_array($result)){
                   echo "<option value='$row[GEO_ID]' >$row[GEO_NAME]</option>" ;
              }
         }else if ($data=='province1') { 
              echo "<select class='col-sm-3 form-control' name='province1' onChange=\"dochange('amphur1', this.value)\">";
              echo "<option value='0'>-- เลือกจังหวัด --</option>\n";
              $result=mysql_query("SELECT * FROM province WHERE GEO_ID = '$val' ORDER BY prov_name");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[prov_code]\" >$row[prov_name]</option>" ;
              }
         } 
         else if ($data=='amphur1') {
              echo "<select class='col-sm-3 form-control' name='amphur1' onChange=\"dochange('district1', this.value)\">";  
              echo "<option value='0'>-- เลือกอำเภอ --</option>\n";                           
              $result=mysql_query("SELECT * FROM amphur WHERE prov_code = '$val' ORDER BY AMPHUR_NAME");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[am_code]\" >$row[AMPHUR_NAME]</option> " ;
              }
         } else if ($data=='district1') {
              echo "<select class='col-sm-3 form-control' name='district1'>\n";
              echo "<option value='0'>-- เลือกตำบล --</option>\n";
              $result=mysql_query("SELECT * FROM district WHERE am_code = '$val' ORDER BY DISTRICT_NAME");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[dis_code]\" >$row[DISTRICT_NAME]</option> \n" ;
              }
         }

         echo "</select>\n";

        echo mysql_error();
        closedb();
?>