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
         
          if ($data=='oc') { 
              echo "<select class='col-sm-3 form-control' name='oc' onChange=\"dochange('ta', this.value)\">";
              echo "<option value='0'>- เลือกอาชีพ -</option>\n";
              $result=mysql_query("SELECT * from course ORDER BY course_name");
              while($row = mysql_fetch_array($result)){
                   echo "<option value='$row[course_code]' >$row[course_name]</option>" ;
              }
         }else if ($data=='ta') {
              echo "<select class='col-sm-3 form-control' name='ta'>\n";
              echo "<option value='0'>- เลือกศูนย์ฝึกอาชีพ -</option>\n";
              $result=mysql_query("SELECT * FROM trainingcenter WHERE course_code = '$val' ORDER BY traincenter_name");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[traincenter_code]\" >$row[traincenter_name]</option> \n" ;
              }
         }

        echo "</select>\n";

        echo mysql_error();
        closedb();
?>