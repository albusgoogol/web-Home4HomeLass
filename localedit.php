<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

    session_start();\

    include "configs.php";
    mysql_query("SET NAMES UTF8");
    conndb();



  $sql3 = "SELECT * FROM address
      INNER JOIN district ON district.dis_code = address.dis_code
      INNER JOIN amphur ON amphur.am_code = address.am_code
      INNER JOIN province ON province.prov_code = address.prov_code
      INNER JOIN geography ON geography.GEO_ID = address.GEO_ID
      LEFT JOIN members ON members.mem_code = address.mem_code
      WHERE address.mem_code = '".$_SESSION['mem_code']."' ";
  $sql_query3 = mysql_query($sql3);
  $rs3 = mysql_fetch_array($sql_query3);

    $data = $_GET['data'];
    $val = $_GET['val'];


         /* เงื่อนไข การแบ่งภูมิภาค จังหวัด อำเภอ ตำบล ของที่อยู่ปัจจุบัน*/

          if ($data=='geography1') { 
              echo "<select class='col-sm-3 form-control' name='geography1' onChange=\"dochange('province1', this.value)\">";
              echo "<option value='0'>- เลือกภูมิภาค -</option>\n";
              $sql5="SELECT * from geography 
                    ORDER BY GEO_NAME";  
              $query5=mysql_query($sql5);
             while($rst5=mysql_fetch_array($query5)){ 
                  if($rst5['GEO_ID']==$rs3['GEO_ID'])
                      $selgeo1='selected';
                  else $selgeo1=''; 
                  echo "<option value='$rst5[GEO_ID]' $selgeo1 >$rst5[GEO_NAME]</option>" ;
              }
         }else if ($data=='province1') { 
              echo "<select class='col-sm-3 form-control' name='province1' onChange=\"dochange('amphur1', this.value)\">";
              echo "<option value='0'>- เลือกจังหวัด -</option>\n";
              $sql6="SELECT * from province 
                    WHERE GEO_ID = '$val'
                    ORDER BY prov_name";  
              $query6=mysql_query($sql6); 
              while($rst6=mysql_fetch_array($query6)){ 
                    if($rst6['prov_code']==$rs3['prov_code'])
                      $selprov1='selected';
                    else $selprov1='';
                   echo "<option value=\"$rst6[prov_code]\" $selprov1 >$rst6[prov_name]</option>" ;
              }
         } 
         else if ($data=='amphur1') {
              echo "<select class='col-sm-3 form-control' name='amphur1' onChange=\"dochange('district1', this.value)\">";  
              echo "<option value='0'>- เลือกอำเภอ -</option>\n";                      
              $sql7="SELECT * from amphur 
                    WHERE prov_code = '$val' 
                    ORDER BY AMPHUR_NAME";  
              $query7=mysql_query($sql7); 
              while($rst7=mysql_fetch_array($query7)){ 
                if($rst7['am_code']==$rs3['am_code'])
                    $selam1='selected';
                else $selam1='';                          
              echo "<option value=\"$rst7[am_code]\" $selam1 >$rst7[AMPHUR_NAME]</option> " ;
              }
         } else if ($data=='district1') {
              echo "<select class='col-sm-3 form-control' name='district1'>\n";
              echo "<option value='0'>- เลือกตำบล -</option>\n";
              $sql8="SELECT * from district 
                    WHERE am_code = '$val' 
                    ORDER BY DISTRICT_NAME";  
              $query8=mysql_query($sql8); 
              while($rst8=mysql_fetch_array($query8)){ 
                  if($rst8['dis_code']==$rs3['dis_code'])
                    $seldis1='selected';
                  else $seldis1=''; 
                   echo "<option value=\"$rst8[dis_code]\" $seldis1 >$rst8[DISTRICT_NAME]</option> \n" ;
              }
         }

         echo "</select>\n";

        echo mysql_error();
        closedb();
?>