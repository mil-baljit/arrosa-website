<?php error_reporting(0);
/*Offline*/
/*$hostname = "localhost";
$username = "root";
$password = "root";
$database = "tata_leads";*/

/*Online*/
$hostname = "Localhost";
$username = "tataqxv_main";
$password = "^V4VbpHtT1(p";
$database = "tataqxv_main";

mysql_connect($hostname,$username,$password);
mysql_select_db($database) or die("Connection error");
?>