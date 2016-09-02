<?php include_once 'config.php';?>
<?php 
$user = $_COOKIE['user'];
$query1 = "Select * from user_cart where user='$user';";
$rows = $conn->query($query1);

while($rows_del = $rows->fetch_assoc()){
	$book = $rows_del['Book_id'];
	
$email = $rows_del['Email'];
$dat =  date("Y-m-d");

$query = "insert into user_history(Book_id,date,Email,user) values('$book','$dat','$email','$user');";	
 $conn->query($query);
 $que = "delete from user_cart where user='$user' and Book_id='$book';";
 $conn->query($que);
 
}
$que1 = "select count(*)*5 as points from user_history where user='$user';";
$row_cart =  $conn->query($que1);
while($rows_cart = $row_cart->fetch_assoc()){
$points = $rows_cart['points'];
}
$que_points = "update user set points='$points' where name='$user';";
$conn->query($que_points);
/*
$que = "select * from inventory  where BookID='$book';";
$rows1 = $conn->query($que);
while($stock = $rows1->fetch_assoc()){
	$stoc=$stock['Stock'];
	$stoc=$stoc-1;
	echo "ok";
 $ques = "update inventory set Stock=$stoc where BookID='$book';";
 $conn->query($ques);
}*/

    header("Location: http://localhost/cart.php?user=$user");
?>