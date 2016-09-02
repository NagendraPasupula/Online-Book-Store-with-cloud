<?php
$db_username = 'root';
$db_password = 'justbooks';
$db_name = 'justbooks';
$db_host = '104.155.190.18';
//create connection
$conn =  mysqli_connect($db_host, $db_username, $db_password,$db_name);

//check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>