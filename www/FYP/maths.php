<?php
session_start();
include "connect.php";

if(!isset($_SESSION["username"])) {
	header("Location: login.php");
}
else {
	$ID = $_SESSION["ID"];
}

$sql = "SELECT mathsKeyStageLevel FROM user WHERE ID = '$ID'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$mathsLevel = $row["mathsKeyStageLevel"];
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
	<title>Maths</title>
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
	<h1>Maths</h1>
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
	<a href="english.php">English</a>
	<a class = "active" href="maths.php">Maths</a>
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
	if($mathsLevel == 1)
	{
		echo "<object width = '600' height = '600'>
		<param name = 'movie' value = 'ks1mat.html'>
		<embed src = 'ks1mat.html' width = '600' height = '600'>
		</embed>
		</object>"; 
	}
	
	else 
	{
		echo "<object width = '600' height = '600'>
		<param name = 'movie' value = 'ks2mat.html'>
		<embed src = 'ks2mat.html' width = '600' width = '600'>
		</embed>
		</object>";
	}
	?>
</div>

</body>
</html>