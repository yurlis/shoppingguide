<?php

$siteHost = $_SERVER['HTTP_HOST'];

if ( $siteHost == 'yurylisovsky.colocall.com') {
	$servername = 'db.colocall.net';	
	$password = 'Parol1973cl4';		
	$username = 'yurylisovsky4';		
	$dbname  = 'yurylisovsky4';
} else {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "guide";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");