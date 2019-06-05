<?php
session_start();
include "connect.php";

$englishLevel = $_POST["engKeyStageLevel"];
$MathsLevel = $_POST["mathsKeyStageLevel"];
$BackColour = $_POST["backColour"];
$TextColour = $_POST["fontColour"];


if(isset($_POST["fName"]))
{
	$fName = $_POST["fName"];
}

if(isset($_POST["age"]))
{
	$age = $_POST["age"];
}

if(isset($_POST["engKeyStageLevel"]))
{
	$engKeyStageLevel = $_POST["engKeyStageLevel"];
}

if(isset($_POST["mathsKeyStageLevel"]))
{
	$mathsKeyStageLevel = $_POST["mathsKeyStageLevel"];
}

if(isset($_POST["backColour"]))
{
	$backColour = $_POST["backColour"];
}

if(isset($_POST["fontColour"]))
{
	$fontColour = $_POST["fontColour"];
}

if(isset($_POST["username"]))
{
	$username = $_POST["username"];
}

if(isset($_POST["password"]))
{
	$password = $_POST["password"];
}

$sql = ("INSERT INTO user (fName, age, engKeyStageLevel, mathsKeyStageLevel, backColour, fontColour, username, password) VALUES ('$fName', '$age', '$engKeyStageLevel', '$mathsKeyStageLevel', '$backColour', '$fontColour', '$username', '$password')");

mysqli_query($con, $sql);

session_destroy();

header("Location: login.php");

?>