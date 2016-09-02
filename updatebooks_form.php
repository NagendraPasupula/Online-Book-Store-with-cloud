<?php include_once 'config.php';?>
<?php
    $ID = $_POST["id"];
    $name = $_POST["Bookname"];
    $genre = $_POST["Genre"];
	$author = $_POST["Author"];
  #  $image = $_POST["image"];
    $price = $_POST["price"];
    $stock = $_POST["Stock"];
	#echo $stock ;
    if(empty($_POST["image"])){
        $url = "";
    }
    else{
        $url = $_POST["image"];
    }
    $description = addslashes($_POST["description"]);

    $sql = "UPDATE inventory SET  title = '$name', Author = '$author', Price = $price, Genre = '$genre', Description = '$description', Image = '$url', Stock = $stock WHERE BookID=$ID;";
   # $conn->query($sql);
$conn->query($sql);
   
    
    setcookie("editbook", "book details have been updated", time()+1);
   header("Location: http://localhost/book_detail_admin.php?ID=$ID");
?>