
<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

    include "configs.php";
    
    conndb();

    $id = $_GET['id'];



    $where="";

    
  if ($id=="ทั้งหมด") {
      $where=$where."";
    }else{
      $where="where date_format(hldetail_date,'%Y')= '$id' ";
    }
    
    

 
//define array
//we need two arrays - "male" and "female" so $arr and $arr1 respectively!
$arr  = array();
$result = array();
 
//get the result from the table "highcharts_data"
//if ($id=="ทั้งหมด") {
//  $sql = "SELECT date_format(dateinform,'%M') as monthse,COUNT('policestation_id') AS 'ipolice' FROM crime GROUP BY date_format(dateinform,'%m') ORDER BY date_format(dateinform,'%m')";

//}else{

$sql = "SELECT date_format(hldetail_date,'%M') as monthse,COUNT('hl_code') AS 'ihl'  
FROM homelessdetail  '".$where."'
GROUP BY date_format(hldetail_date,'%m') 
ORDER BY date_format(hldetail_date,'%m')";
//}

$q = mysql_query($sql);
$j = 0;
while($row = mysql_fetch_assoc($q)){
 
//highcharts needs name, but only once, so give a IF condition
  if($j == 0){
  $arr['name'] = 'จำนวนคนไร้ที่พึ่งที่เข้ารับบริการในปี '.$id.' ';
    $j++;
  }
  //and the data for male and female is here
  $arr['data'][] = $row['ihl'];
}
 
//after get the data for male and female, push both of them to an another array called result
array_push($result,$arr);

 
//now create the json result using "json_encode"
print json_encode($result, JSON_NUMERIC_CHECK);
 


        echo mysql_error();
        closedb();
?>