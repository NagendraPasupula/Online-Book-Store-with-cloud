<?php

$conn = mysqli_connect('104.155.190.18','root','justbooks','justbooks');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
$user_name = $_POST['user_name'];
$url="index.html";
$stmt = "INSERT INTO user(name,email,password) VALUES('$user_name','$user_email','$user_password')";
$res = $conn->query($stmt);
if(!$res){
	echo "fail";
}else{
echo "success";	
}

?>