<?php
session_start();
include "connect.php";

if(!isset($_SESSION["username"])) {
	header("Location: login.php");
}
else {
	$ID = $_SESSION["ID"];
}

$sql = "SELECT engKeyStageLevel FROM user WHERE ID = '$ID'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$englishLevel = $row["engKeyStageLevel"];
?>

<!DOCTYPE html>
<?php
if(isset($_SESSION["username"])) {
	$sql2 = "SELECT *FROM user WHERE ID = '$ID'";
	$result2 = mysqli_query($con, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	
	$fontColour = $row2["fontColour"];
	
	echo "<style> body {color:$fontColour;} </style>";
}
?>

<html>
<head>
	<title>English</title>
	<link rel = "stylesheet" type = "text/css" href = "dyscss.css">
</head>

<?php
if(isset($_SESSION["username"])) {
	$sql = "SELECT * FROM user WHERE ID = '$ID'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	
	$backColour = $row["backColour"];
	
	echo "<body style = 'background-color: $backColour'>";
}	

else {
	echo "<body>";
}
?>

<div id = "header">
	<h1>English</h1>
	<img src = "images/dysLogo.png" height = "90" width = "90">
</div>	

<div id="naviBar">
	<a href="index.php">Front Page</a>
	<?php
	if(!isset($_SESSION["username"])) {
		echo "<a href='login.php'>Login/Register New Account</a>";
	}
	else {
		echo "<a href='account.php'>Account Details</a>";
		echo "<a href='logout.php'>Logout</a>";
	}
	?>
	<a class = "active" href="english.php">English</a>
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
	<?php
	if($englishLevel == 1)
	{
		echo "<object width = '600' height = '600'>
		<param name = 'movie' value = 'ks1eng.html'>
		<embed src = 'ks1eng.html' width = '600' height = '600'>
		</embed>
		</object>"; 
	}
	
	else 
	{
		echo "<object width = '600' height = '600'>
		<param name = 'movie' value = 'ks2eng.html'>
		<embed src = 'ks2eng.html' width = '600' height = '600'>
		</embed>
		</object>";
	}
	?>
</div>

</body>
</html>