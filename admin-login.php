<?php

$conn = mysqli_connect('104.155.190.18','root','justbooks','justbooks');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$email =$_POST['user_emailadmin'];
$password=$_POST['passwordadmin'];
$de =0;
#$email = "abcd@gmail.com";
$query="SELECT * FROM admin where Email_ad = '$email'";
$result = $conn->query($query);
while($row = $result->fetch_assoc()) {
  if(strcmp($password,$row["Password_ad"])==0){
	setcookie("admin", 'admin');
    setcookie("admin_emailID", $row["Email_ad"]);
	echo "login";
	
	}
	else
	{
	setcookie("login", "Username and password do not match", time()+1);
	echo "Wrong password";
	}
	
}

$conn->close();
?>