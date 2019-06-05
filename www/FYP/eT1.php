<?php
session_start();
include "connect.php";

$ID = $_SESSION["ID"];

if(isset($_POST["q1_1"])) {
	$q1_1 = $_POST["q1_1"];
}
if(isset($_POST["q1_2"])) {
	$q1_2 = $_POST["q1_2"];
}
if(isset($_POST["q1_3"])) {
	$q1_3 = $_POST["q1_3"];
}
if(isset($_POST["q1_4"])) {
	$q1_4 = $_POST["q1_4"];
}
if(isset($_POST["q1_5"])) {
	$q1_5 = $_POST["q1_5"];
}

$count = 0;

if($q1_1 == 1) {
	$count = $count + 1;
}
else {
	$count = $count + 0;
}

if($q1_2 == 2) {
	$count = $count + 1;
}
else {
	$count = $count + 0;
}

if($q1_3 == "Wednesday") {
	$count = $count + 1;
}
else {
	$count = $count + 0;
}

if($q1_4 == 1) {
	$count = $count + 1;
}
else {
	$count = $count + 0;
}

if($q1_5 == 2) {
	$count = $count + 1;
}
else {
	$count = $count + 0;
}

$sql = ("INSERT INTO testScores (userID, subject, level, score) VALUES ('$ID', 'eng', '1', '$count')");
mysqli_query($con, $sql);
header("Location: index.php");
?>