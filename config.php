<?php 
	$host = "br-cdbr-azure-south-b.cloudapp.net";  
	$us = "bf35a4b77631cf";  
	$pw = "fdea3b09";  
	$db = "dbhame";
	$objConnect = mysql_connect($host,$us,$pw)or die ("Could not connect to MySQL");  
	mysql_select_db($db)or die ("Could not connect to Database"); 
	mysql_query("set NAMES utf8");
?>


