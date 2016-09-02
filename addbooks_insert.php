<?php
    $servername = "104.155.190.18";
    $username = "root";
    $password = "justbooks";
    $dbname = "justbooks";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $name = $_POST["Bookname"];
    $genre = $_POST["Genre"];
	$author = $_POST["Author"];
    $rating = $_POST["rating"];
    $price = $_POST["price"];
    $stock = $_POST["Stock"];
    if(empty($_POST["image"])){
        $url = "";
    }
    else{
        $url = $_POST["image"];
    }
    $description = addslashes($_POST["description"]);
    $sql = "Insert into inventory(title,Author,Genre,Rating,Image,Stock,Description,Price) values ('$name','$author','$genre','$rating','$url',$stock,'$description',$price)";
    $conn->query($sql);
    $conn->close();
    setcookie("addbook", "Book details added", time()+1);
    header("Location: http://localhost/index.php");
?>