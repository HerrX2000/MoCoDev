<?php

$db_host="localhost";
$db_user="root";
$db_psw="FIRE";
$db_name="mocodev";
$db_prefix="dev_";
$db_con = @new mysqli($db_host, $db_user, $db_psw, $db_name);
$db_con_pro = @mysqli_connect($db_host, $db_user, $db_psw, $db_name);
if ($db_con->connect_errno){printf("Error: ", $db_con->connect_error);exit;}
$error_report=2;
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
