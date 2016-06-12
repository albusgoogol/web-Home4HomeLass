<?php
  $host = "br-cdbr-azure-south-b.cloudapp.net";
  $us = "bf35a4b77631cf";
  $pw = "fdea3b09";
  $db = "dbhame";

  $res = array();
  $item['inform'] = array();

  $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db, $us, $pw, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $result = $conn->query('SELECT  *FROM homelessinform');
  while ($row = $result->fetch()){
      $res['code'] = $row['hlin_id'];
      $res['date'] = $row['hlin_date'];
      $res['location'] = $row['hlin_location'];
      $res['status'] = $row['hlin_status'];
      $res['member_id'] = $row['mem_code'];
      array_push($item['inform'], $res);
  }

  echo json_encode($item);

?>
