<?php
    $servername = "104.155.190.18";
    $username = "root";
    $password = "justbooks";
    $dbname = "justbooks";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $book_id = $_GET["ID"];
    $sql = "Update inventory set del=1 where BookID = '$book_id';";
    $conn->query($sql);
    $conn->close();
   
    header("Location: http://localhost/index.php");
?>