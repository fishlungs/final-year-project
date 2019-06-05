<?php
session_start();
include "connect.php";

$ID = $_SESSION["ID"];

$sql = "SELECT * FROM user WHERE ID = '$ID'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$backColour = $row["backColour"];
$fontColour = $row["fontColour"];

$sql2 = "SELECT * FROM testScores WHERE userID = '$ID' AND subject = 'eng'";
$result2 = mysqli_query($con, $sql2);
$row2 = mysqli_fetch_assoc($result2);

$sql3 = "SELECT * FROM testScores WHERE userID = '$ID' AND subject = 'mat'";
$result3 = mysqli_query($con, $sql3);
$row3 = mysqli_fetch_assoc($result3);
?>

<!DOCTYPE html>
<style>
body {color:<?php echo $fontColour;?>}
</style>
<html>
<head>
	<title>Account Page</title>
	<link rel = "stylesheet" type = "text/css" href = "dyscss.css">
</head>

<body style="background-color:<?php echo $backColour;?>">

<div id = "header">
	<h1>Your Account Details</h1>
	<img src = "images/dysLogo.png" height = "90" width = "90">
</div>

<div id="naviBar">
	<a href="index.php">Front Page</a>
	<?php
	if(!isset($_SESSION["username"])) {
		echo "<a href='login.php'>Login/Register New Account</a>";
	}
	else {
		echo "<a class= 'active' href='account.php'>Account Details</a>";
		echo "<a href='logout.php'>Logout</a>";
	}
	?>
	<a href="english.php">English</a>
	<a href="maths.php">Maths</a>
	<div class="dropdown">
		<button class="dropBtn">Test</button>
		<div class="dropdown-content">
			<a href="engTest.php">English</a>
			<a href="mathsTest.php">Maths</a>
		</div>
	</div>
</div>	

<div id = "mainContent">
	<br>
	<br>
	<br>
	<p>You have chosen Key Stage <?php echo $row["engKeyStageLevel"];?> for English.</p>
	<p>You have chosen Key Stage <?php echo $row["mathsKeyStageLevel"];?> for Maths.</p>
	
	<p>You scored <?php echo $row2["score"];?> for English.
	<p>You scored <?php echo $row3["score"];?> for Maths.
	
	
	<br>
	<form action = "updateAccount.php" method = "post">
	<input type = "submit" value = "Update Details">
	</form>
</div>

</body>
</html>