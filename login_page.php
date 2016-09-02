<?php

$conn = mysqli_connect('104.155.190.18','root','justbooks','justbooks');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 if (isset($_COOKIE["login"])) {
            echo $_COOKIE["login"];
        }
		
$email =$_POST['user_emaildef'];
$password = $_POST['passworddef'];
$de =0;

$query="SELECT * FROM user where email = '$email'";
$result = $conn->query($query);
 while($row = $result->fetch_assoc()) {
  if(strcmp($password,$row["Password"])==0){
	setcookie("user", $row["name"]);
    setcookie("emailID", $row["Email"]);
	echo $row["name"];
	
	}
	else
	{
	setcookie("login", "Username and password do not match", time()+1);
	echo "Wrong password";
	}
	
} 

$conn->close();
?>