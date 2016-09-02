<?php include_once 'config.php';?>
<?php 
$user = $_COOKIE['user'];
$id=$_GET['ID'];
$query1 = "Select * from user where name='$user';";

$rows = $conn->query($query1);


while($row = $rows->fetch_assoc()){
	
$email = $row['Email'];

$dat =  date("Y-m-d");
$label = "upcoming";
$quer = "insert into user_history(Book_id,Email,user,label,date) values('$id','$email','$user','$label','$dat');";	
 $conn->query($quer);
}
    header("Location: http://localhost/history.php?user='$user'"); 
?>

