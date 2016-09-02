<?php
	
	
	$conn = mysqli_connect('104.155.190.18','root','justbooks','justbooks');

// Check connection
$user_email=$_POST['user_email'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

			$query= "SELECT * FROM user where Email = '$user_email'";
			$result = $conn->query($query);
			
			if($result->num_rows == 0){
			
			
			echo '<img src="https://storage.googleapis.com/justbooks/images/up.jpg" style="height:30px;width:30px;"  />';
			
			
			}
			else{
				
				echo '<img src="https://storage.googleapis.com/justbooks/images/down.jpg" style="height:30px;width:30px;" />'; //  not  available
			}
				
		

	$conn->close();
?>