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
	$sql2 = "SELECT * FROM user WHERE ID = '$ID'";
	$result2 = mysqli_query($con, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	
	$fontColour = $row2["fontColour"];
	
	echo "<style> body {color: $fontColour;} </style>";
}
?>

<html>
<head>
	<title>English Test</title>
	<link rel = "stylesheet" type = "text/css" href = "dyscss.css">
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
	<h1>English Test</h1>
	<img src = "images/dysLogo.png" height = "90" width = "90">
</div>

<div class = "topNav" id = "naviBar">
	<a href = "index.php">Front Page</a>
	<?php
	if(!isset($_SESSION["username"])) {
		echo "<a href = 'login.php'>Login/Register New Account</a>";
	}
	else {
		echo "<a href = 'account.php'>Account Details</a>";
		echo "<a href = 'logout.php'>Logout</a>";
	}
	?>
	<a href = "english.php">English</a>
	<a href = "maths.php">Maths</a>
	<div class = "dropdown">
		<button class = "dropBtn">Test
			<i class = "fa fa-caret-down"></i>
		</button>
		<div class = "dropdown-content">
			<a class = "active" href = "engTest.php">English</a>
			<a href = "mathsTest.php">Maths</a>
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
	if($englishLevel == 1) {
	
	echo '<form action = "eT1.php" method = "post">
	Question 1: What is a verb?<p>
	<select name = "q1_1" id = "q1_1">
		<option value = "1">A doing word</option>
		<option value = "2">A describing word</option>
		<option value = "3">A naming word</option>
	</select><p>
	Question 2: "I bit my _______"<p>
	<select name = "q1_2" id = "q1_2">
		<option value = "1">tong</option>
		<option value = "2">tongue</option>
		<option value = "3">tonge</option>
	</select><p>
	Question 3: Monday, Tuesday, _________, Thursday, Friday - What is the missing day?<p>
	<input type = "text" name= "q1_3"><p>
	Question 4: "my dad is going to work today" - What word should be capitalised?<p>
	<select name = "q1_4" id = "q1_4">
		<option value = "1">my</option>
		<option value = "2">dad</option>
		<option value = "3">is</option>
		<option value = "4">going</option>
		<option value = "5">to</option>
		<option value = "6">work</option>
		<option value = "7">today</option>
	</select><p>
	Question 5: "Where are the sandwiches" - What punctuation mark should this have?<p>
	<select name = "q1_5" id = "q1_5">
		<option value = "1">.</option>
		<option value = "2">?</option>
		<option value = "3">!</option>
	</select><p>
	<input type = "submit" value = "Finish Test">
	
	<input type = "hidden" name = "englishLevel" value = "$englishLevel">
	
	</form>';
	
	
	}
	
	else {
		echo '<form action = "eT2.php" method = "post">
		Question 1: "Once Daniel ________ his trophy, he spoke to a reporter." - Select the correct verb form<p>
		<select name = "q2_1" id = "q2_1">
			<option value = "1">is collecting</option>
			<option value = "2">had collected</option>
			<option value = "3">has collected</option>
			<option value = "4">wad collecting</option>
		</select><p>
		Question 2: ____________ an official sport at the Winter Olympics in Japan - Select the correct sentence starter<p>
		<select name = "q2_2" id = "q2_2">
			<option value = "1">In 1998 snowboarding became,</option>
			<option value = "2">In 1998 snowboarding, became</option>
			<option value = "3">In 1998, snowboarding became</option>
			<option value = "4">In, 1998 snowboarding became</option>
		</select><p>
		Question 3: What is an antonym?<p>
		<select name = "q2_3" id = "q2_3">
			<option value = "1">A word meaning the same or similar to another word</option>
			<option value = "2">A word meaning the opposite to another word</option>
			<option value = "3">A describing word</option>
		</select><p>
		Question 4: What is the second person pronoun?<p>
		<select name = "q2_4" id ="q2_4">
			<option value = "1">Me</option>
			<option value = "2">You</option>
			<option value = "3">They</option>
		</select><p>
		Question 5: "On Friday, Lydia hopes to meet Paul in Dorridge". - What is the subject of this sentence?<p>
		<select name = "q2_5" id = "q2_5">
			<option value = "1">Friday</option>
			<option value = "2">Lydia</option>
			<option value = "3">Paul</option>
			<option value = "4">Dorridge</option>
		</select><p>
		<input type = "submit" value = "Finish Test">
		
		<input type = "hidden" name = "englishLevel" value = "$englishLevel">
	
		</form>';
		
		
	}
	?>
</div>
<script src = "countdown.js"></script>
</body>
</html>
