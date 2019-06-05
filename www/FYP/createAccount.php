<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<link rel="stylesheet" type="text/css" href="">
</head>

<body>

<div id="header">
	<h1>Create Account</h1>
</div>

<div id="naviBar">
	<a href="index.php">Front Page</a>
	<?php
	if(!isset($_SESSION["username"])) {
		echo "<a class = 'active' href='createAccount.php'>Login/Register New Account</a>";
	}
	else {
		echo "<a href='account.php'>Account Details</a>";
		echo "<a href='logout.php'>Logout</a>";
	}
	?>
	<a href="english.php">English</a>
	<a href="maths.php">Maths</a>	
</div>


<div id="mainContent">
	<p>**ATTENTION PARENTS**</p>
	<p>This information will not be shared with anyone but is in order to make<p>
	the website the most useful for the child.</p>
	<p>Once account has been registered, you will need to login.<p>
	
	<form action="cA2.php" method="post">
	First Name: <input type="text" name="fName"><p>
	Username: <input type="text" name="username"><p>
	Password: <input type="password" name="password"><p>
	Age: <input type="int" name="age"><p>
	English Key Stage Level: <select name="engKeyStageLevel" id="engKeyStageLevel">
		<option value="1">KS1</option>
		<option value="2">KS2</option>
	</select>
	Maths Key Stage Level: <select name="mathKeyStageLevel" id="mathKeyStageLevel">
		<option value="1">KS1</option>
		<option value="2">KS2</option>
	</select>
	<input type="submit" value="Create Account">
	</form>
</div>
	
</body>
</html>