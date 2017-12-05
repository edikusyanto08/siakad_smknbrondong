<?php
session_start();

$root	 = "http://www.siakad.dev/";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "smknbrondong";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'ERROR: Could not connect to database!: '.mysqli_connect_error();
}
?>