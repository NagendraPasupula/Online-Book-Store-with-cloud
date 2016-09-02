<?php
if (isset($_COOKIE["user"])){
    unset($_COOKIE['user']);
    setcookie('user', null);
    setcookie("login", "Successfully logged out", time()+1);
header("Location: http://localhost/index.php");}
if (isset($_COOKIE["admin"])){
	unset($_COOKIE['admin']);
    setcookie('admin', null);
    setcookie("login", "Successfully logged out", time()+1);
header("Location: http://localhost/index.php");}
?>