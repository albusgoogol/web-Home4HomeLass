<?php
  $host = "br-cdbr-azure-south-b.cloudapp.net";
  $us = "bf35a4b77631cf";
  $pw = "fdea3b09";
  $db = "dbhame";

  $res = array();
  $item['range'] = array();

  $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db, $us, $pw, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $result = $conn->query('SELECT  *FROM age');
  while ($row = $result->fetch()){
      $res['code'] = $row['age_code'];
      $res['name'] = $row['age_name'];
      array_push($item['range'], $res);
  }
  $res = array();
  $item['job'] = array();
  $result = $conn->query('SELECT  *FROM lastjob');
  while ($row = $result->fetch()){
      $res['job'] = $row['lastjob_name'];
      array_push($item['job'], $res);
  }

  $res = array();
  $item['department'] = array();
  $result = $conn->query('SELECT  *FROM geography');
  while ($row = $result->fetch()){
      $res['dept_id'] = $row['GEO_ID'];
      $res['dept_name'] = $row['GEO_NAME'];
      array_push($item['department'], $res);
  }

  $res = array();
  if($_GET['GEO_ID']) {
    $item['province'] = array();
    $result = $conn->query('SELECT  *FROM province WHERE GEO_ID = '.$_GET['GEO_ID']);
    while ($row = $result->fetch()){
        $res['province_id'] = $row['prov_code'];
        $res['province_name'] = $row['prov_name'];
        array_push($item['province'], $res);
    }
  }
  $res = array();
  if($_GET['prov_code'] != "") {
    $item['district'] = array();
    $result = $conn->query('SELECT district.prov_code,province.prov_code FROM district INNER JOIN province ON district.prov_code = '.$_GET['prov_code']);
    while ($row = $result->fetch()){
        $res['province_id'] = $row['prov_code'];
        $res['district_id'] = $row['dis_code'];
        $res['district_name'] = $row['DISTRICT_NAME'];
        array_push($item['district'], $res);
    }
  }
  echo json_encode($item);
 ?>
