<?php
session_start();
include "connect.php";

if(isset($_POST["username"])) {
	$username = $_POST["username"];
}
if(isset($_POST["password"])) {
	$password = $_POST["password"];
}

$sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) == 1) {
	$_SESSION["username"] = $username;
	$_SESSION["ID"] = $row["ID"];
	header("Location: account.php");
}
else {
	header("Location: login.php");
}
?>

