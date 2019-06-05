<?php
session_start();
include "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<link rel="stylesheet" type="text/css" href="dyscss.css">
</head>

<body>

<div id="header">
	<h1>Create Account</h1>
	<img src = "images/dysLogo.png" height = "90" width = "90">
</div>

<div id="naviBar">
	<a href="index.php">Front Page</a>
	<?php
	if(!isset($_SESSION["username"])) {
		echo "<a class= 'active' href='registerLearner.php'>Login/Register New Account</a>";
	}
	else {
		echo "<a href='account.php'>Account Details</a>";
		echo "<a href='logout.php'>Logout</a>";
	}
	?>
	<a href="english.php">English</a>
	<a href="maths.php">Maths</a>	
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
</div>

<div id="mainContent">
	<br>
	<br>
	<br>
	<p>**ATTENTION PARENTS**</p>
	<p>This information will not be shared with anyone but is in order to make<p>
	the website the most useful for the child.</p>
	<br>
	Once account has been registered, you will need to login.</p>
	<br>	

	<form action = "rL2.php" method = "post">
	First Name: <input type = "text" name = "fName"><p>
	Age: <input type = "number" name = "age"><p>
	English Key Stage Level: <select name = "engKeyStageLevel" id = "engKeyStageLevel">
		<option value = "1">KS1</option>
		<option value = "2">KS2</option>
	</select><p>
	Maths Key Stage Level: <select name = "mathsKeyStageLevel" id = "mathsKeyStageLevel">
		<option value = "1">KS1</option>
		<option value = "2">KS2</option>
	</select><p>
	Background Colour: <input type = "color" name = "backColour"><p>
	Font Colour: <input type = "color" name = "fontColour"><p>
	Username: <input type = "text" name = "username"><p>
	Password: <input type = "password" name = "password"><p>
	<input type = "submit" value = "Create Account">
	
	
	<input type = "hidden" name = "EnglishLevel" value = "$engKeyStageLevel">
	<input type = "hidden" name = "MathsLevel" value = "$mathsKeyStageLevel">
	<input type = "hidden" name = "BackColour" value = "$backColour">
	<input type = "hidden" name = "TextColour" value = "$fontColour">
	
	
	</form>
	
</div>

</body>
</html>