<?php
require('fpdf/fpdf.php');
include('config.php');
include "checkstaff.php";
ob_start();

function displaydate ($x) {
$date_m=array ("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม");

$date_array=explode("-",$x);
$y=$date_array[0];
$m=$date_array[1]-1;
$d=$date_array[2];
$m=$date_m[$m];
$displaydate="$d $m $y";
return $displaydate;
}

$show_id=$_GET['show_id'];
$tc_code=$_GET['tc_code'];
$tk=$_GET['tk'];
$c_code = $_GET['c_code'];

$strSQL = "SELECT * FROM homeless
            INNER JOIN age ON age.age_code = homeless.age_code
            INNER JOIN lastjob ON lastjob.lastjob_code = homeless.lastjob_code
            LEFT JOIN homelessdetail ON homelessdetail.hl_code = homeless.hl_code
            INNER JOIN members ON members.mem_code = homelessdetail.mem_code
            INNER JOIN typehomelessdetail ON typehomelessdetail.hl_code = homeless.hl_code
            INNER JOIN typehomeless ON typehomeless.th_id = typehomelessdetail.th_id
            INNER JOIN causedetail ON causedetail.hl_code = homeless.hl_code
            INNER JOIN statusdetail ON statusdetail.hl_code = homeless.hl_code
            INNER JOIN typeservicedetail ON typehomelessdetail.hl_code = homeless.hl_code
            LEFT JOIN relativedetail ON relativedetail.hl_code = homeless.hl_code
            LEFT JOIN sicknessdetail ON sicknessdetail.hl_code = homeless.hl_code
            LEFT JOIN trainingcenterdetail ON trainingcenterdetail.hl_code = homeless.hl_code
            WHERE homeless.hl_code = '$show_id' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);


//ทำการสืบทอดคลาส FPDF ให้เป็นคลาสใหม่

$pdf=new FPDF();



$pdf->SetLeftMargin( 30 );
$pdf->SetRightMargin( 7 );
$pdf->SetTopMargin( 25 );

$pdf->AddPage();

$pdf->AddFont('THSarabun','','THSarabun.php');//¸ÃÃÁ´Ò
$pdf->AddFont('THSarabun','b','THSarabun Bold.php');//Ë¹Ò
$pdf->AddFont('THSarabun','i','THSarabun Italic.php');//ÍÕÂ§
$pdf->AddFont('THSarabun','bi','THSarabun Bold Italic.php');//Ë¹ÒàÍÕÂ§

$pdf->SetFont('THSarabun','b',22);
$pdf->Cell( 150, 5,iconv( 'UTF-8','TIS-620','รายงานการเข้ารับบริการ'), 0, 0,"C");
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','วันที่สำรวจ'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','    '), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','  '.displaydate($objResult['hldetail_date']).'  '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                       สถานะการบันทึกเข้ารับบริการ'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                                          '.$objResult['hldetail_status'].'                '), 0 ,0);
$pdf->Ln();
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','ประเภทคนไร้ที่พึ่ง'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                  '.$objResult['th_name'].'                '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                 รหัสคนไร้ที่พึ่ง'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                               '.$show_id.' '), 0 ,0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','1. ข้อมูลส่วนตัว'), 0 ,0);
$pdf->Ln();
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    ชื่อ'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','    '.$objResult['hl_fname'].'                        '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                       นามสกุล'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                              '.$objResult['hl_lname'].'    '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                                                   วัน/เดือน/ปีเกิด'), 0 ,0);
$pdf->SetFont('THSarabun','',14);   
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                                                    '.$objResult['hl_bday'].'          '), 0 ,0);
$pdf->Ln();
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    ช่วงอายุ'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','          '.$objResult['age_name'].'                        '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                       เลขประจำตัวประชาชน'), 0 ,0);
$pdf->Ln();



$strSQL2 = "SELECT * FROM native
            INNER JOIN homeless ON homeless.hl_code = native.hl_code
            LEFT JOIN district ON district.dis_code = native.dis_code
            LEFT JOIN amphur ON amphur.am_code = native.am_code
            LEFT JOIN province ON province.prov_code = native.prov_code
            LEFT JOIN geography ON geography.GEO_ID = native.GEO_ID
            WHERE native.hl_code = '$show_id' ";
$objQuery2 = mysql_query($strSQL2);
$objResult2 = mysql_fetch_array($objQuery2);

$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    ภูมิลำเนา'), 0 ,0);
$pdf->Ln();
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    บ้านเลขที่'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','               '.$objResult2['n_num'].' '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                หมู่ที่'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                '.$objResult2['n_villno'].' '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                   ตรอก/ซอย'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                   '.$objResult2['n_alley'].' '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                                   ถนน'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                        '.$objResult2['n_street'].' '), 0 ,0);
$pdf->Ln();
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    แขวง/ตำบล'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','               '.$objResult2['DISTRICT_NAME'].' '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                          เขต/อำเภอ'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                          '.$objResult2['AMPHUR_NAME'].' '), 0 ,0);
$pdf->Ln();
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    จังหวัด'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','               '.$objResult2['prov_name'].' '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                          ภูมิภาค'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                     '.$objResult2['GEO_NAME'].' '), 0 ,0);
$pdf->Ln();

$strSQL3 = "SELECT * FROM address
            INNER JOIN homeless ON homeless.hl_code = address.hl_code
            LEFT JOIN district ON district.dis_code = address.dis_code
            LEFT JOIN amphur ON amphur.am_code = address.am_code
            LEFT JOIN province ON province.prov_code = address.prov_code
            LEFT JOIN geography ON geography.GEO_ID = address.GEO_ID
            WHERE address.hl_code = '$show_id' ";
$objQuery3 = mysql_query($strSQL3);
$objResult3 = mysql_fetch_array($objQuery3);

$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    ที่อยู่ปัจจุบัน'), 0 ,0);
$pdf->Ln();
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    บ้านเลขที่'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                '.$objResult3['ad_num'].' '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                หมู่ที่'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                '.$objResult3['ad_villno'].' '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                   ตรอก/ซอย'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                   '.$objResult3['ad_alley'].' '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                                   ถนน'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                        '.$objResult3['ad_street'].' '), 0 ,0);
$pdf->Ln();
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    แขวง/ตำบล'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','               '.$objResult3['DISTRICT_NAME'].' '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                          เขต/อำเภอ'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                          '.$objResult3['AMPHUR_NAME'].' '), 0 ,0);
$pdf->Ln();
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    จังหวัด'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','               '.$objResult3['prov_name'].' '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                          ภูมิภาค'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                     '.$objResult3['GEO_NAME'].' '), 0 ,0);
$pdf->Ln();

$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    อาชีพเดิม'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','          '.$objResult['lastjob_name'].' '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                        อาชีพปัจจุบัน'), 0 ,0);
$pdf->Ln();
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    ระยะเวลา '.$objResult['th_name'].''), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                  '.$objResult['hldetail_period'].' '), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                    วัน '), 0 ,0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','2. สาเหตุที่เป็นคน '.$objResult['th_name'].''), 0 ,0);
$pdf->Ln();

$sqlcause ="SELECT * FROM cause";
$resultcause = mysql_query($sqlcause);

$sqlcausedetail = "SELECT * FROM causedetail           
             WHERE causedetail.hl_code = '$show_id' "; 
$resultcausedetail = mysql_query($sqlcausedetail); 
      
$types = array();
while(($row1 =  mysql_fetch_array($resultcausedetail))) {
      $types[] = $row1['cause_code'];
}
$i=0;
while ($row = mysql_fetch_object($resultcause)) {       
if($row->cause_code == $types[$i]){

      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    -'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','      '.$row->cause_name.' '), 0 ,0);
      $pdf->Ln();


      if($i<sizeof($types)-1){
            $i++;
      }
}
 }
$pdf->Ln();
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','3. สภาพสถานะทางร่างกายปัจจุบัน'), 0 ,0);
$pdf->Ln();

$sqlstatus ="SELECT * FROM statusphysical";
$resultstatus = mysql_query($sqlstatus);
    
$sqlstatusdetail = "SELECT * FROM statusdetail           
                  WHERE statusdetail.hl_code = '$show_id' "; 
$resultstatusdetail = mysql_query($sqlstatusdetail); 
      
$types1 = array();
while(($rows1 =  mysql_fetch_array($resultstatusdetail))) {
      $types1[] = $rows1['status_id'];
}
         
$j=0;
while ($rows = mysql_fetch_object($resultstatus)) {       
      if($rows->status_id == $types1[$j]){
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    -'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','      '.$rows->status_name.' '), 0 ,0);
      $pdf->Ln();


      if($j<sizeof($types1)-1){
            $j++;
      }
}
 }

 $sqlimghl = "SELECT * FROM imagehomeless
            INNER JOIN homeless ON homeless.hl_code = imagehomeless.hl_code
            WHERE imagehomeless.hl_code = '$show_id' ";
$objqueryimg = mysql_query($sqlimghl);



$pdf->Ln();
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','4. ความต้องการให้รัฐช่วยเหลือ'), 0 ,0);
$pdf->Ln();

$sqltservice ="SELECT * FROM typeservice";
$resulttservice = mysql_query($sqltservice);
    
$sqltservicedetail = "SELECT * FROM typeservicedetail           
                  WHERE typeservicedetail.hl_code = '$show_id' "; 
$resulttservicedetail = mysql_query($sqltservicedetail); 
      
$types2 = array();
while(($rowt1 =  mysql_fetch_array($resulttservicedetail))) {
      $types2[] = $rowt1['tservice_code'];
}
$k=0;
while ($rowt = mysql_fetch_object($resulttservice)) {       
      if($rowt->tservice_code == $types2[$k]){
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','    -'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','      '.$rowt->tservice_name.' '), 0 ,0);
      $pdf->Ln();


      if($k<sizeof($types2)-1){
            $k++;
      }
}
 }

$pdf->AddPage();
$sqlrel = "SELECT * FROM homeless
      INNER JOIN relativedetail ON relativedetail.hl_code = homeless.hl_code
      LEFT JOIN  relative ON relative.relative_id = relativedetail.relative_id
      WHERE relativedetail.hl_code = '$show_id' ";
$objrel = mysql_query($sqlrel);

$pdf->SetFont('THSarabun','b',22);
$pdf->Cell( 150, 5,iconv( 'UTF-8','TIS-620','รายงานติดตามความช่วยเหลือ'), 0, 0,"C");
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('THSarabun','b',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','รหัสคนไร้ที่พึ่ง'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','               '.$show_id.' '), 0 ,0);
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                               ชื่อ-สกุลคนไร้ที่พึ่ง'), 0 ,0);
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                                     '.$objResult['hl_fname'].'       '.$objResult['hl_lname'].''), 0 ,0);
$pdf->Ln();
$pdf->SetFont('THSarabun','b',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','1. ข้อมูลญาติ'), 0 ,0);
$pdf->Ln();
$pdf->SetFont('THSarabun','',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','      '.$objResult['relative_status'].' '), 0 ,0);
$pdf->Ln();

while ($rsrel = mysql_fetch_array($objrel)) {
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','     - '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','   เลขประจำตัวประชาชน'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                           '.$rsrel['relative_id'].' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                                         ชื่อ-สกุล'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                              '.$rsrel['relative_fname'].'   '.$rsrel['relative_lname'].' '), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','   ID Line'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','      '.$rsrel['relative_line'].' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                          อีเมล'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                            '.$rsrel['relative_email'].' '), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','   เบอร์โทรศัพท์'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','              '.$rsrel['relative_tel'].' '), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','   ช่องทางอื่นในการติดต่อ'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                '.$rsrel['relative_address'].' '), 0 ,0);
      $pdf->Ln();

}

$sqlsym = "SELECT * FROM homeless
            INNER JOIN sicknessdetail ON sicknessdetail.hl_code = homeless.hl_code
            INNER JOIN sickness ON sickness.sick_id = sicknessdetail.sick_id
            WHERE sicknessdetail.hl_code = '$show_id' ";
$objssym = mysql_query($sqlsym);

$pdf->SetFont('THSarabun','b',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','2. ข้อมูลอาการป่วย'), 0 ,0);
$pdf->Ln();
 
while ($rssym = mysql_fetch_array($objssym)) {
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','     - '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','  วันที่เข้ารับการตรวจรักษา'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                             '.displaydate($rssym['sick_date']).' '), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','   สถานะการป่วย'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                   '.$rssym['sick_status'].' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                        ชื่อโรค'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                              '.$rssym['sick_name'].' '), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','   อาการป่วย'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','          '.$rssym['sick_descript'].' '), 0 ,0);
      $pdf->Ln();
}



$sqltrain = "SELECT * FROM homeless
            INNER JOIN trainingcenterdetail ON trainingcenterdetail.hl_code = homeless.hl_code
            INNER JOIN trainingcenter ON trainingcenter.traincenter_code = trainingcenterdetail.traincenter_code 
            INNER JOIN course ON course.course_code = trainingcenter.course_code
            WHERE homeless.hl_code = '$show_id' ";
$objtrain = mysql_query($sqltrain);

$strSQLad = "SELECT * FROM address
            INNER JOIN trainingcenter ON trainingcenter.traincenter_code = address.traincenter_code
            INNER JOIN district ON district.dis_code = address.dis_code
            INNER JOIN amphur ON amphur.am_code = address.am_code
            INNER JOIN province ON province.prov_code = address.prov_code
            INNER JOIN geography ON geography.GEO_ID = address.GEO_ID
            WHERE trainingcenter.traincenter_code = '$tc_code' ";
$objQueryad = mysql_query($strSQLad);
$objResultad = mysql_fetch_array($objQueryad);




$pdf->SetFont('THSarabun','b',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','3. ข้อมูลการฝึกอาชีพ'), 0 ,0);
$pdf->Ln();


while ($rstrain = mysql_fetch_array($objtrain)) {
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','      '.$rstrain['traincenter_status'].' '), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','     - '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','  วันที่เข้าฝึกอาชีพ'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                 '.displaydate($rstrain['traincenter_tday']).' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                                      อาชีพ'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                        '.$rstrain['course_name'].' '), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','  ศูนย์ฝึกอาชีพ'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','             '.$rstrain['traincenter_name'].' '), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','  ที่อยู่ศูนย์ฝึกอาชีพ'), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','  บ้านเลขที่'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','        '.$objResultad['ad_num'].' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','          หมู่ที่'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','             '.$objResultad['ad_villno'].' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                  ตรอก/ซอย'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                         '.$objResultad['ad_alley'].' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                                    ถนน'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                        '.$objResultad['ad_street'].' '), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','  แขวง/ตำบล'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                '.$objResultad['DISTRICT_NAME'].' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                                      เขต/อำเภอ'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                                 '.$objResultad['AMPHUR_NAME'].' '), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','  จังหวัด'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                '.$objResultad['prov_name'].' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                            ภูมิภาค'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);   
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                       '.$objResultad['GEO_NAME'].' '), 0 ,0);
      $pdf->Ln();

}

$sqltk = "SELECT * FROM homeless
            INNER JOIN takecaredetail ON takecaredetail.hl_code = homeless.hl_code
            INNER JOIN takecarestation ON takecarestation.tc_code = takecaredetail.tc_code
            WHERE homeless.hl_code = '$show_id' ";
$objtk = mysql_query($sqltk);

$strSQLadtk = "SELECT * FROM address
            INNER JOIN takecarestation ON takecarestation.tc_code = address.tc_code
            INNER JOIN district ON district.dis_code = address.dis_code
            INNER JOIN amphur ON amphur.am_code = address.am_code
            INNER JOIN province ON province.prov_code = address.prov_code
            INNER JOIN geography ON geography.GEO_ID = address.GEO_ID
            WHERE takecarestation.tc_code = '$tk' ";
$objQueryadtk = mysql_query($strSQLadtk);
$objResultadtk = mysql_fetch_array($objQueryadtk);

$pdf->SetFont('THSarabun','b',14);
$pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','4. ข้อมูลสถานที่รับดูแล'), 0 ,0);
$pdf->Ln();
while ($rstk = mysql_fetch_array($objtk)) {
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','     - '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','  วันที่เข้าสถานที่รับดูแล'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                          '.displaydate($rstk['td_in']).' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                                      ชื่อสถานที่'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                            '.$rstk['tc_name'].' '), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','  เบอร์โทรศัพท์'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','               '.$rstk['tc_tel'].' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                         อีเมล'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                         '.$rstk['tc_email'].' '), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','  ที่อยู่สถานที่รับดูแล'), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','  บ้านเลขที่'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','        '.$objResultadtk['ad_num'].' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','          หมู่ที่'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','             '.$objResultadtk['ad_villno'].' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                  ตรอก/ซอย'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                         '.$objResultadtk['ad_alley'].' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                                    ถนน'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                        '.$objResultadtk['ad_street'].' '), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','  แขวง/ตำบล'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                '.$objResultad['DISTRICT_NAME'].' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                                      เขต/อำเภอ'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                                 '.$objResultad['AMPHUR_NAME'].' '), 0 ,0);
      $pdf->Ln();
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','  จังหวัด'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                '.$objResultad['prov_name'].' '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','       '), 0 ,0);
      $pdf->SetFont('THSarabun','b',14);
      $pdf->Cell(11  , 7 ,iconv( 'UTF-8','TIS-620','                            ภูมิภาค'), 0 ,0);
      $pdf->SetFont('THSarabun','',14);   
      $pdf->Cell( 11  , 7 ,iconv( 'UTF-8','TIS-620','                                       '.$objResultad['GEO_NAME'].' '), 0 ,0);
      $pdf->Ln();
}


$pdf->Output();
?>



















