<?php include_once 'config.php';?>
<?php 
$user = $_COOKIE['user'];
$id=$_GET['ID'];
$query1 = "Select * from user_cart where user='$user';";

$rows = $conn->query($query1);


while($row = $rows->fetch_assoc()){
	
$email = $row['Email'];

$dat =  date("Y-m-d");

$quer = "insert into user_history(Book_id,Email,user,label,date) values('$id','$email','$user','ebook','$dat');";	
 $conn->query($quer);
}
   header("Location: http://localhost/history.php?user='$user'"); 
?>

