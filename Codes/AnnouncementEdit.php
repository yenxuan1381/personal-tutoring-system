<?php
	session_start();

	include_once('Connection.php');

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor"))
	{
		header("Location:Loginpage.php");
	}

    $id = $_GET['id'];
    if(isset($_POST['text'])){
		$title = $_POST['title'];
		$announcement = $_POST['text'];
        $sql = "UPDATE announcement SET title='$title',content='$announcement' WHERE announcement_id='$id' ";
        if(mysqli_query($conn, $sql)){
    		header("Location:Announcement.php");
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
	}
	
	
	

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="default.css">

		<title>
			Tutors
		</title>

		<style>
		.close
		{
			position:absolute;
			transition:all 500ms;
			top:20px;
			right:30px;
			font-size:30px;
			font-weight:bold;
			text-decoration:none;
			color:black;
		}

		.overlay
		{
			position:fixed;
			top:0;
			bottom:0;
			left:0;
			right:0;
			background:rgba(0,50,75,0.7);
			transition:all 500ms;
			visibility:hidden;
			opacity:0;
		}

		.overlay:target
		{
			visibility:visible;
			opacity:1;
		}

		.popupchange
		{
			margin:225px auto;
			padding:15 30 30;
			background:white;
			border-radius:5px;
			width:19%;
			height:25%;
			position:relative;
			transition:all 5s ease-in-out;
		}

		.popupconfirm
		{
			margin:225px auto;
			padding:15 30 30;
			background:white;
			border-radius:5px;
			width:17%;
			height:25%;
			position:relative;
			transition:all 5s ease-in-out;
		}
		</style>

	</head>
	<!-- Start Menu -->
	<div class="nav-btn">Menu</div>
	<div class="container">
		<div class="sidebar">

			<nav>
				<a href="#">Nottingham <span>Tutor System</span></a>
				<ul>
					<li><a href="tutorpage.php">Tutees</a></li>
					<li><a href="Search.php">Search</a></li>
					<li><a href="Loginpage.php">Log Out</a></li>
				</ul>

			</nav>
		</div>

	<!-- End Menu -->
    <div class="main-content">
	<h3>Edit Announcment</h3>
	<br><br>
	<form id="announcementform"  method="POST" >
		<label for="title">New Title:</label><br>
		<input type="text" id="title" name="title" size="78"><br>
		<label for="announcement">New Content:</label><br>
		<textarea id="announcement" name="text" rows="10" cols="100"></textarea><br>
		<input type="submit" value="Confirm Changes" >

	</form>

</html>