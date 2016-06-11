<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

    session_start();
    include "configs.php";
    mysql_query("SET NAMES UTF8");
    conndb();

    $sql2 = "SELECT * FROM sicknessdetail
      INNER JOIN sickness ON sickness.sick_id = sicknessdetail.sick_id
      INNER JOIN sickgroup ON sickgroup.sickgroup_id = sicknessdetail.sickgroup_id
      WHERE sicknessdetail.hl_code = '".$_SESSION['hl']."' ";
  $sql_query2 = mysql_query($sql2);
  $rs2 = mysql_fetch_array($sql_query2);

  
    $data = $_GET['data'];
    $val = $_GET['val'];

          /* เงื่อนไข การแบ่งภูมิภาค จังหวัด อำเภอ ตำบล ของที่อยู่ตามภูมิลำเนา*/
         
          if ($data=='sickgroup') { 
              echo "<select class='col-sm-3 form-control' name='sickgroup' onChange=\"dochange('sick', this.value)\">";
              //echo "<option value='0'>- เลือกกลุ่มโรค -</option>\n";
              $sql="SELECT * from sickgroup 
                    ORDER BY sickgroup_name";  
              $query=mysql_query($sql);
             while($rst=mysql_fetch_array($query)){ 
                  if($rst['sickgroup_id']==$rs2['sickgroup_id'])
                      $selsickgroup='selected';
                  else $selsickgroup=''; 
                  echo "<option value='$rst[sickgroup_id]' $selsickgroup >$rst[sickgroup_name]</option>" ;
                   
              }
         } else if ($data=='sick') {
              echo "<select class='col-sm-3 form-control' name='sick'>\n";
              //echo "<option value='0'>- เลือกชือ่โรค -</option>\n";
              $sql4="SELECT * from sickness 
                    WHERE sickgroup_id = '$val' 
                    ORDER BY sick_name";  
              $query4=mysql_query($sql4); 
              while($rst4=mysql_fetch_array($query4)){ 
                  if($rst4['sick_id']==$rs2['sick_id'])
                    $selsick='selected';
                  else $selsick=''; 
                   echo "<option value=\"$rst4[sick_id]\" $selsick >$rst4[sick_name]</option> \n" ;
              }
         }

         echo "</select>\n";

        echo mysql_error();
        closedb();
?>