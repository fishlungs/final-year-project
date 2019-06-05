<?php
session_start();
include "connect.php";

if(!isset($_SESSION["username"])) {
	header("Location: login.php");
}
else {
	$ID = $_SESSION["ID"];
}

$sql = "SELECT * FROM user WHERE ID = '$ID'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$mathsLevel = $row["mathsKeyStageLevel"];
?>

<!DOCTYPE html>
<?php
if(isset($_SESSION["username"])) {
	$sql2 = "SELECT * FROM user WHERE ID = '$ID'";
	$result2 = mysqli_query($con, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	
	$fontColour = $row2["fontColour"];
	
	echo "<style> body {color: $fontColour;} </style>";
}
?>

<html>
<head>
	<title>Maths Test</title>
	<link rel="stylesheet" type="text/css" href="dyscss.css">
</head>

<?php
if(isset($_SESSION["username"])) {
	$sql3 = "SELECT * FROM user WHERE ID = '$ID'";
	$result3 = mysqli_query($con, $sql3);
	$row3 = mysqli_fetch_assoc($result3);
	
	$backColour = $row3["backColour"];
	
	echo "<body style = 'background-color: $backColour'>";
}

else {
	echo "<body>";
}
?>

<div id = "header">
	<h1>Maths Test</h1>
	<img src = "images/dysLogo.png" height = "90" width = "90">
</div>

<div class = "topNav" id = "naviBar">
	<a href = "index.php">Front Page</a>
	<a href = "account.php">Account Details</a>
	<a href = "logout.php">Logout</a>
	<a href = "english.php">English</a>
	<a href = "maths.php">Maths</a>
	<div class = "dropdown">
		<button class = "dropBtn">Test
			<i class = "fa fa-caret-down"></i>
		</button>
		<div class = "dropdown-content">
			<a href = "engTest.php">English</a>
			<a class = "active" href = "mathsTest.php">Maths</a>
		</div>
	</div>
</div>

<div id = "mainContent">
	<br>
	<br>
	<br>
	Time Left: <span id = "timer"></span>
	<p>
	<?php
	if($mathsLevel == 1) {
		echo '<form action = "mT1.php" method = "post">
		Question 1: What is half of 12?<p>
		<input type = "number" name = "q1_1"><p>
		Question 2: What does 93 + 8 = ?<p>
		<input type = "number" name = "q1_2"><p>
		Question 3: What does 6 x 3 = ?<p>
		<input type = "number" name = "q1_3"><p>
		Question 4: What does 70 ÷ 10 = ?<p>
		<input type = "number" name = "q1_4"><p>
		Question 5: What does 85 - 25 = ?<p>
		<input type = "number" name = "q1_5"><p>
		<input type = "submit" value = "Finish Test">
		
		<input type = "hidden" name = "mathsLevel" value = "$mathsLevel">
		</form>';
	}
	else {
		echo '<form action = "mT2.php" method = "post">
		Question 1: What does 63 ÷ 9 = ?<p>
		<input type = "number" name = "q2_1"><p>
		Question 2: What is missing number? _____ - 100 = 1,059<p>
		<input type = "number" name = "q2_2"><p>
		Question 3: What does 30 x 40 = ?<p>
		<input type = "number" name = "q2_3"><p>
		Question 4: What is 7% of 500?<p>
		<input type = "number" name = "q2_4"><p>
		Question 5: What does 0.04 x 100 = ?<p>
		<input type = "number" name = "q2_5"><p>
		<input type = "submit" value = "Finish Test">
		
		<input type = "hidden" name = "mathsLevel" value = "$mathsLevel">
		</form>';
	}
	?>	
</div>
<script src = "countdown.js"></script>
</body>
</html>