<?php
	session_start();

	include_once('Connection.php');

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Student"))
	{
		header("Location:Loginpage.php");
	}

	$userid = $_SESSION['userid'];
	$sql = "SELECT announcement FROM tutors WHERE `Lect ID`=(SELECT `Tutor Id` FROM students WHERE `Student Id`='$userid')";
	$result = $conn->query($sql);
	echo str_repeat('&nbsp;', 60);
	echo'Announcement: <br> <br>';
	echo str_repeat('&nbsp;', 60);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			echo $row["announcement"];
		}
	}
	

?>

 <!DOCTYPE html>
 <html>
  <head>
	<link rel="stylesheet" href="default.css">
    <title> Notification </title>
  </head>

<body>
<!-- Start Menu -->
	<div class="nav-btn">Menu</div>
	<div class="container">
		<div class="sidebar">

			<nav>
				<a href="#">Notts<span>Tutor</span></a>
				<ul>
					<li><a href="StudentView.php">List</a></li>
					<li><a href="Loginpage.php">Log Out</a></li>
				</ul>

			</nav>

		</div>
	<!-- End Menu -->
</html>