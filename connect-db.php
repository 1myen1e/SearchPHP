<?php

$hostname = 'db';
$username = 'myuser';
$password = '123456789';
$database = 'mysearchapp';

$conn = new mysqli($hostname, $username, $password, $database);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
