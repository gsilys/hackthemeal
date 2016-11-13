<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hackthemeal";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysql_query("SET NAMES 'utf8'");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	echo "failed";
}