<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log in Form</title>
	<link rel="stylesheet" type="text/css" href="dyscss.css">
</head>

<body>

<div id="header">
	<h1>Log in</h1>
	<img src = "images/dysLogo.png" height = "90" width = "90">
</div>

<div id="naviBar">
	<a href="index.php">Front Page</a>
	<?php
	if(!isset($_SESSION["username"])) {
		echo "<a class= 'active' href='login.php'>Login/Register New Account</a>";
	}
	else {
		echo "<a href='account.php'>Account Details</a>";
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

<div id="mainContent">
<br>
<br>
<br>
<?php
if(!isset($_SESSION["username"])) {
	echo "<form action = 'log2.php' method = 'post'>
	Username: <input type = 'text' name = 'username'><p>
	Password: <input type = 'password' name = 'password'><p>
	<input type = 'submit' value = 'Log in'>
	</form>";
	
	echo "<form action = 'registerLearner.php' method = 'post'>
	<input type = 'submit' value = 'Create New Account'>
	</form>";
}
else {
	echo "Your account information is available <a href = account.php>here</a>";
}
?>
</div>

</body>
</html>