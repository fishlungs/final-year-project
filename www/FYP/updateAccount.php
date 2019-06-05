<?php
session_start();
include "connect.php";

if(!isset($_SESSION["username"])) {
	header("Location: login.php");
}

$ID = $_SESSION["ID"];

$sql = "SELECT * FROM user WHERE ID = '$ID'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<?php
$fontColour = $row["fontColour"];

echo "<style> body {color: $fontColour;} </style>";
?>

<html>
<head>
	<title>Update Details</title>
	<link rel = "stylesheet" type = "text/css" href = "dyscss.css">
</head>

<?php
$backColour = $row["backColour"];

echo "<body style = 'background-color: $backColour'>";
?>

<div id = "header">
	<h1>Update Account Details</h1>
	<img src = "images/dysLogo.png" height = "90" width = "90">
</div>

<div id = "naviBar">
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
			<a href = "mathsTest.php">Maths</a>
		</div>
	</div>
</div>

<div id = "mainContent">
<br>
<br>
<br>
	<form action = "uA2.php" method = "post">
	ID: <input type = "text" name = "ID" value = <?php echo $row["ID"];?> readonly><p>
	Name: <input type = "text" name = "fName" value = <?php echo $row["fName"];?>><p>
	Age: <input type = "number" name = "age" value = <?php echo $row["age"];?>><p>
	Username: <input type = "text" name = "username" value = <?php echo $row["username"];?>><p>
	Password: <input type = "text" name = "password" value = <?php echo $row["password"];?>><p>
	<input type = "submit" value = "Update Details">
	</form>
</div>

</body>
</html>