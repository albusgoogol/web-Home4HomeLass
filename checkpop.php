<?php 
session_start();
  if($_SESSION['mem_code'] == "")
  {
    echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
    echo "<script type='text/javascript'>alert('กรุณาเข้าสู่ระบบ')</script>";
    echo "<script>window.location='login.php'</script>";
    exit();
  }

  if($_SESSION['mem_status'] == "เจ้าหน้าที่")
  {
    echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF8' />";
    echo "<script type='text/javascript'>alert('เจ้าหน้าที่ไม่มีสิทธิ์เข้าถึง')</script>";
    echo "<script>window.location='login.php'</script>";
    exit();
  }
  mysql_query("SET NAMES UTF8");  
  mysql_connect("br-cdbr-azure-south-b.cloudapp.net","bf35a4b77631cf","fdea3b09");
  mysql_select_db("dbhame");     
  $strSQL = "SELECT * FROM members WHERE mem_code = '".$_SESSION['mem_code']."' ";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);
?>