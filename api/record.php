<?php
  $host = "br-cdbr-azure-south-b.cloudapp.net";
  $us = "bf35a4b77631cf";
  $pw = "fdea3b09";
  $db = "dbhame";

  $res = array();
  $item['range'] = array();

  $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db, $us, $pw, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
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

  echo json_encode($item);
 ?>
