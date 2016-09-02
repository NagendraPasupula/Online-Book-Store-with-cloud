<?php include_once 'config.php';?>
<?php 

$user = $_COOKIE['user'];
$id = $_GET['id'];
$query = "delete from user_cart where user='$user' and Book_id='$id';";

 $conn->query($query);
    header("Location: http://localhost/cart.php?user=$user");
?>