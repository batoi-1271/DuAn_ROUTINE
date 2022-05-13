<?php
$host = 'localhost';
$username = 'root';
$password = '1234';
$dbname = 'pro1014';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset:utf8", $username, $password);
} catch (PDOException $e) {
    echo "Connect mySQL fail!" . $e->getMessage();
}
