<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "dysdata";

$con = mysqli_connect($host, $username, $password, $db);

if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
}
?>