<?php
session_start();
include "connect.php";

$englishLevel = $_POST["englishLevel"];
$ID = $_SESSION["ID"];


	if(isset($_POST["q2_1"])) {
		$q2_1 = $_POST["q2_1"];
	}
	if(isset($_POST["q2_2"])) {
		$q2_2 = $_POST["q2_2"];
	}
	if(isset($_POST["q2_3"])) {
		$q2_3 = $_POST["q2_3"];
	}
	if(isset($_POST["q2_4"])) {
		$q2_4 = $_POST["q2_4"];
	}
	if(isset($_POST["q2_5"])) {
		$q2_5 = $_POST["q2_5"];
	}

$count = 0;

if($q2_1 == 2) {
	$count = $count + 1;
}
else {
	$count = $count + 0;
}

if($q2_2 == 3) {
	$count = $count + 1;
}
else {
	$count = $count + 0;
}

if($q2_3 == 2) {
	$count = $count + 1;
}
else {
	$count = $count + 0;
}

if($q2_4 == 2) {
	$count = $count + 1;
}
else {
	$count = $count + 0;
}

if($q2_5 == 2) {
	$count = $count + 1;
}
else {
	$count = $count + 0;
}

$sql = ("INSERT INTO testScores (userID, subject, level, score) VALUES ('$ID', 'eng', '2', '$count')");
mysqli_query($con, $sql);
header("Location: index.php");
?>