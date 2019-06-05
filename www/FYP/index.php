<?php
session_start();
include "connect.php";
?> 

<!DOCTYPE html>
<?php
if(isset($_SESSION["username"])) {
	$ID = $_SESSION["ID"];
	
	$sql2 = "SELECT * FROM user WHERE ID = '$ID'";
	$result2 = mysqli_query($con, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	
	$fontColour = $row2["fontColour"];
	
	echo "<style> body {color:$fontColour;} </style>";
}
?>

<html>
<head>
	<title>DYS LEARNING</title>
	<link rel="stylesheet" type="text/css" href="dyscss.css">
</head>

<?php
if(isset($_SESSION["username"])) {
	$ID = $_SESSION["ID"];
	
	$sql = "SELECT * FROM user WHERE ID = '$ID'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	
	$backColour = $row["backColour"];
	
	echo "<body style = 'background-color: $backColour'>";
}
else{
	echo "<body>";
}
?>

<div id="header">
	<h1>Home </h1>
	<img src = "images/dysLogo.png" height = "90" width = "90">
</div>
	
<div id="naviBar">
	<a class="active" href="index.php">Front Page</a>
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


<div id="mainContent">
	<br>
	<br>
	<br>
	<p>**Parent Notes**</p>
	<p>This is the main page for this dyslexia-assisted learning platform.</p>
	<p>This website provides access to learning-based games for both English and Maths 
	for learners at Key Stage 1 and 2 education levels.</p>
	<p>It tracks each learners current education level including their activity times
	and test scores from each subject within their own personal log in.</p>
	<p>As well as this, the design is inter-changeable with how your child feels they learn
	best.</p>
</div>	

</body>
</html>