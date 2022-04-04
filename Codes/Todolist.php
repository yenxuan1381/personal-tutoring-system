<?php
session_start();

include_once('Connection.php');

// If haven't login, then change to login page
if ((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor")) {
	header("Location:Loginpage.php");
}
$userid = $_SESSION['userid'];


	
	
	if(ISSET($_POST['add'])){
		if($_POST['task'] != ""){
			$task = $_POST['task'];
			
			$conn->query("INSERT INTO `task` VALUES('','$userid','$task', '')");
			header('location:Todolist.php');
		}
	}
?>

?>
<!DOCTYPE html>
<html>

<head>

	<!-- Bootstrap 5 CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<title>
		Tutors
	</title>

	<style>
		h3 {
			font-weight: normal;
		}

		.nav-btn {
			width: 100%;
			height: 35px;
			padding-top: 4px;
			color: #D5D3D3;
			background-color: #212121;
			text-align: center;
			cursor: pointer;
			display: none;
		}

		.nav-btn:active {
			background-color: #090909;
		}

		.a-nav {
			color: #ffffff;
			text-decoration: none;
			font-size: 17px;
			padding-right: 50px;
		}

		.container {
			width: 100%;
			height: 100%;
			position: relative;
		}

		.sidebar {
			width: 250px;
			background: #001b33;
			position: fixed;
			top: 0px;
			left: 0;
			bottom: 0;
			box-shadow: 1px 0px 10px #777;
		}

		.sidebar nav>a {
			font-size: 150%;
			display: inline-block;
			padding: 30px 0px;
			padding-left: 30px;
			opacity: 0.7;
			transition: all 0.2s;
		}

		.sidebar nav>a-nav:hover {
			opacity: 1;
		}

		.sidebar nav a-nav span {
			font-weight: 300;
		}

		.sidebar nav ul {
			list-style: none;
		}

		.sidebar nav ul li {
			font-size: 90%;
			padding: 19px 0;
			padding-left: 20px;
			border: collapse;
		}

		.sidebar nav ul li:hover {
			background-color: #2c6f99;
		}

		.sidebar nav ul li:active {
			background-color: #2c6f99;
		}

		.sidebar nav ul li a-nav {
			color: #D7D5D5;
		}

		.sidebar nav ul li:hover a-nav {
			color: #fff;
		}


		.main-content {
			width: calc(100% - 250px);
			height: 100%;
			margin-left: 250px;
			padding: 20px 30px;
		}

		.main-content .panel-wrapper .panel-head {
			background-color: #fff;
			padding: 10px 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2)
		}


		@media only screen and (max-width: 420px) {
			
			.nav-btn {
				display: block;
			}

			.sidebar {
				position: relative;
				height: 378px;
				width: 100%;
				display: none;
				margin-bottom: 40px;
				z-index: 1000;
			}

			.main-content {
				width: 100%;
				margin-left: 0;
				z-index: -1;
				position: relative;
			}
		}

		/* Responsive */

		@media only screen and (max-width: 768px) {
			.nav-btn {
				display: block;
			}

			.sidebar {
				position: relative;
				height: 378px;
				width: 100%;
				display: none;
				margin-bottom: 40px;
				z-index: 1000;
			}

			.main-content {
				width: 100%;
				margin-left: 0;
				z-index: -1;
				position: relative;
			}
		}
	</style>

</head>
<!-- Start Menu -->
<div class="nav-btn">Menu</div>
<div class="container">
	<div class="sidebar">

		<nav>
			<a class="a-nav" href="#">Nottingham <span>Tutor System</span></a>
			<ul>
				<li><a class="a-nav" href="UserInformationTutors.php?LectID=<?php echo $userid ?>">Profile</a></li>
				<li><a class="a-nav" href="Search.php">Search</a></li>
				<li><a class="a-nav" href="Announcement.php">Announcement</a></li>
				<li><a class="a-nav" href="Todolist.php">To-Do list</a></li>
				<li><a class="a-nav" href="Chatroom.php">Tutor Messenger</a></li>
				<li><a class="a-nav" href="ContactTutorspage.php">Contact Us</a></li>
				<li><a class="a-nav" href="Loginpage.php">Log Out</a></li>
			</ul>

		</nav>
	</div>

	<!-- End Menu -->

	<div class="main-content">
		<div class="d-flex justify-content-center">
			<div class="col-md-9">
				<h3> To-Do List</h3><br />
				<div class="col-md-auto">
					<!-- Scale length of form -->
					<form method="POST" action="">
						<div class="input-group">
							<input type="text" class="form-control" name="task" />
							<button class="btn btn-primary" name="add">Add Task</button>
						</div>
					</form>

				</div>

				<br />
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Tasks</th>
							<th>Progress</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						require 'Connection.php';
						$query = $conn->query("SELECT * FROM `task` WHERE `Lect ID` = '$userid' ORDER BY `task_id` ASC");
						$count = 1;
						while ($fetch = $query->fetch_array()) {
						?>
							<tr>
								<td><?php echo $count++ ?></td>
								<td><?php echo $fetch['task'] ?></td>
								<td><?php echo $fetch['status'] ?></td>
								<td>

									<?php
									if ($fetch['status'] != "Completed") {
										echo
										'<a href="update_task.php?task_id=' . $fetch['task_id'] . '" > <span class="btn-label"><i class="fa fa-check"></i></span></a> |';
									}
									?>
									<a href="delete_query.php?task_id=<?php echo $fetch['task_id'] ?>"> <span class="btn-label"><i class="fa fa-trash"></i></span></a>

								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		</form>

</html>