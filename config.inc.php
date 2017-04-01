<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tutsplanet_sample_login";
try {
	//Connect to database
    $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}