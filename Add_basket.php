<?php include_once 'config.php';?>
<?php 
$user = $_COOKIE['user'];
$id=$_GET['ID'];
$query1 = "Select * from user where name='$user';";

$rows = $conn->query($query1);


while($row = $rows->fetch_assoc()){
	
$email = $row['Email'];
}

$quer = "insert into user_cart(Book_id,Email,user) values('$id','$email','$user');";	
 $conn->query($quer);
     header("Location: http://localhost/book_detail.php?ID=$id");
?>