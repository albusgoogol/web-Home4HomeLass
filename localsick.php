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
         
          if ($data=='sickgroup') { 
              echo "<select class='col-sm-3 form-control' name='sickgroup' onChange=\"dochange('sick', this.value)\">";
              echo "<option value='0'>- เลือกกลุ่มโรค -</option>\n";
              $result=mysql_query("SELECT * from sickgroup ORDER BY sickgroup_name");
              while($row = mysql_fetch_array($result)){
                   echo "<option value='$row[sickgroup_id]' >$row[sickgroup_name]</option>" ;
              }
         }else if ($data=='sick') {
              echo "<select class='col-sm-3 form-control' name='sick'>\n";
              echo "<option value='0'>- เลือกชื่อโรค -</option>\n";
              $result=mysql_query("SELECT * FROM sickness WHERE sickgroup_id = '$val' ORDER BY sick_name");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[sick_id]\" >$row[sick_name]</option> \n" ;
              }
         }

        // echo "</select>\n";

        echo mysql_error();
        closedb();
?>