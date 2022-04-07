<?php
	session_start();

	include_once('Connection.php');

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or (($_SESSION['category'] != "Tutor") and ($_SESSION['category'] != "Student")))
	{
		header("Location:Loginpage.php");
	}

	$userid = $_SESSION['userid'];

	if($_SESSION['category']=="Student"){
		$sql2 = "SELECT name FROM tutors WHERE `Lect ID` = (SELECT `Tutor Id` FROM students WHERE `Student Id` ='$userid')";
	}
	elseif($_SESSION['category']=="Tutor"){
		$sql2 = "SELECT name FROM tutors WHERE `Lect ID` = $userid";
	}
	
	
	$result2 = $conn->query($sql2);	
	while($rows=$result2->fetch_assoc())
	{
		$tutorname = $rows['name'];
	}

	$sql = "SELECT * FROM announcement WHERE tutor_name = '$tutorname'";
	$result = $conn->query($sql);

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$DeleteQuery = "DELETE FROM announcement WHERE announcement_id='$id'";          
		if(mysqli_query($conn, $DeleteQuery)){
    		header("Location:Announcement.php");
		} else {
    			echo "ERROR: Could not able to execute $DeleteQuery. " . mysqli_error($link);
		}
	}


?>
<!-- start of the HTML script for the student view page  -->

 <!DOCTYPE html>
 <html>
	<style>
		.inline {
		display: inline;
		}

		.link-button {
		background: none;
		border: none;
		color: blue;
		text-decoration: underline;
		cursor: pointer;
		font-size: 1em;
		font-family: serif;
		}
		.link-button:focus {
		outline: none;
		}
		.link-button:active {
		color:red;
		}

	</style>
  <head>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="default.css">
    <title> Announcements </title>
  </head>

<body>
<!-- Start Menu -->
	<div class="nav-btn">Menu</div>
	<div class="container">
	<div class="sidebar">
			<?php
				if($_SESSION['category']=="Tutor"){
					echo '<nav>
					<a href="#">Nottingham <span>Tutor System</span></a>
					<ul>
						<li><a href="tutorpage.php">Tutees</a></li>
						<li><a href="Search.php">Search</a></li>
						<li><a href="Loginpage.php">Log Out</a></li>
					</ul>
	
					</nav>';
				}
				elseif($_SESSION['category']=="Student"){
					echo '<nav>
					<a href="#">Notts<span>Tutor</span></a>
					<ul>
						<li><a href="StudentView.php">List</a></li>
						<li><a href="Loginpage.php">Log Out</a></li>
					</ul>
	
					</nav>';
				}
			?>
		</div>

		<div class="main-content">

			<!-- Start Panel -->
			<div class="panel-wrapper">
				<div class="panel-head">
				<!-- Start Table -->

		<table class="fl-table">
			<thead>
				  <tr>
					<th><strong>Tutor Name</strong></th>
					<th><strong>Title</strong></th>
					<?php 
						if($_SESSION['category']=="Tutor"){
							echo "<th><strong>Action</strong></th>";
						}
					?>
				  </tr>
			</thead>
			<tbody>
				<?php if($result->num_rows > 0){while($row = $result->fetch_assoc()) { ?>
				<tr>
				  <td><?php echo $row["tutor_name"] ?></td>
				  <td>
				  	<form method="post" action="announcementview.php" class="inline">
						<input type="hidden" name="id" value=<?php echo $row["announcement_id"] ?>>
						<button type="submit" name="submit_param" value="submit_value" class="link-button">
							<?php echo $row["title"] ?>
						</button>
					</form>
				  </td>
				  <?php 
						if($_SESSION['category']=="Tutor"){
							echo '
							<td> 
								<a href="AnnouncementEdit.php?id=',$row["announcement_id"],'"class="btn btn-info btn-block" >
									<span class="glyphicon glyphicon-edit"></span>  Edit
						  		</a>
								<form method="post" onsubmit="return confirm(\'Are you sure you want to delete this announcement?\');">
									<input type="hidden" name="delete">
									<input type="hidden" name="id" value="',$row["announcement_id"],'">
									<button type="submit" class="btn btn-danger btn-block">
										<span class="glyphicon glyphicon-trash"></span> Delete 
									</button>
								</form> 
								
								  
							</td>';
						}
					?>
				</tr>
				<?php } } ?>
			</tbody>
		 </table>
		 <br>
		 <?php 
		 	if($_SESSION['category']=="Tutor"){
				 echo '<a href="AddAnnouncement.php" class="btn btn-primary btn-lg">
				 <span class="glyphicon glyphicon-plus"></span> Add a New Announcement
			   </a>';
			 }
		 ?>
		 


				<!-- End Table -->
				</div>
			</div>
		<!-- End Panel -->
		</div>
	</body>
</html>
<!-- End of HTML script -->
