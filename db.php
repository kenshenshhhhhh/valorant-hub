<?php
$conn = new mysqli("localhost","root","","socmed");

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

session_start();
?>