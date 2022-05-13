<?php
$server = "localhost";
$user="root";
$pass="1234";
$database="pro1014";
$connect=mysqli_connect($server,$user,$pass,$database);
$run =mysqli_query($connect,'set names "utf8"');
?>