<?php
session_start();
include "connect.php";

$ID = $_SESSION["ID"];

if(isset($_POST["fName"])) {
	$fName = $_POST["fName"];
}
if(isset($_POST["age"])) {
	$age = $_POST["age"];
}
if(isset($_POST["username"])) {
	$username = $_POST["username"];
}
if(isset($_POST["password"])) {
	$password = $_POST["password"];
}

$fName = mysqli_real_escape_string($con, $fName);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$sql = "UPDATE user SET fName='$fName', age='$age', username='$username', password='$password' WHERE ID = '$ID'";
mysqli_query($con, $sql);

header("Location: account.php");
?>