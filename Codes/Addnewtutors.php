<?php
	session_start();
	
	include('Connection.php');
	
	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Admin"))
	{
		header("Location:Loginpage.php");
	}
	
	include('ImportNewTutors.php');
	
?>

<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="default.css">
		<title>
			Add New Tutors
		</title>
	</head>
<!-- Start Menu -->
<div class="nav-btn">Menu</div>
	<div class="container">
		<div class="sidebar">

			<nav>
				<a href="#">Nottingham <span>Tutor System</span></a>
				<ul>
					<li><a href="Modulespage.php">Modules</a></li>
					<li><a href="Addnewtutors.php">Add New Tutors</a></li>
					<li><a href="Loginpage.php">Log Out</a></li>
				</ul>

			</nav>
		</div>
<!-- End Menu -->
	<div class="main-content">
			<h3><b>Add New Tutors</b></h3>
			<br>	
			<!-- Start Panel -->
			<div class="panel-wrapper">
				<div class="panel-head">
			<!-- Start Table -->
	
			<form enctype="multipart/form-data" method="post" action="" id="importfile">
			<table class="fl-table">
				<thead>
					<tr >
						<th colspan="2"><strong>Import CSV file</strong></th>
					</tr>
					<tr>
						<td	>CSV File:</td><td><input style="margin-right: 10%;" type="file" name="filename" id="file"></td>
					</tr>
					<tr >
						<td colspan="2"><input type="submit" name="submitfile" value="Submit"></td>
					</tr>
				</thead>
			</table>
			
		</form>

				<!-- End Table -->
				</div>
			</div>
		<!-- End Panel -->
		</div>

</html>



  