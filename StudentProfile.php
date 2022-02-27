<?php
	// Start of PHP script
	session_start();

	//to connect the page to the database
	include_once('Connection.php'); 

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Student"))
	{
		header("Location:Loginpage.php");
	}

	$userid = $_SESSION['userid'];
	
	

	/*** Personal Information ***/
	
	//storing the student ID that the student entered at the log in page in the studentid variable
	$getStudentID = $userid;

	//query to get first name
	$firstNameQuery = 'SELECT students.`First Name` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentFirstName = mysqli_query($conn, $firstNameQuery) or die("Error fetching student's first name.");
	$firstName = mysqli_fetch_array($getStudentFirstName,MYSQLI_ASSOC);

	//query to get last name
	$lastNameQuery = 'SELECT students.`Last Name` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentLastName = mysqli_query($conn, $lastNameQuery) or die("Error fetching student's last name.");
	$lastName = mysqli_fetch_array($getStudentLastName,MYSQLI_ASSOC);

	//query to get nationality
	$nationalityQuery = 'SELECT students.`Nationality` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentNationality = mysqli_query($conn, $nationalityQuery) or die("Error fetching student's nationality.");
	$nationality = mysqli_fetch_array($getStudentNationality,MYSQLI_ASSOC);
	
	//query to get gender
	$genderQuery = 'SELECT students.`Gender` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentGender = mysqli_query($conn, $genderQuery) or die("Error fetching student's gender.");
	$gender = mysqli_fetch_array($getStudentGender,MYSQLI_ASSOC);

	//query to get email address
	$emailQuery = 'SELECT students.`Email Address` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentEmail = mysqli_query($conn, $emailQuery) or die("Error fetching student's email.");
	$email = mysqli_fetch_array($getStudentEmail,MYSQLI_ASSOC);
	
	//$avatarQuery = 'SELECT students.`Avatar` FROM `students` WHERE `Student Id` = '.$userid.'';
	//$getStudentAvatar = mysqli_query($conn, $avatarQuery) or die("Error fetching student's avatar.");
	//$avatar = mysqli_fetch_array($getStudentAvatar,MYSQLI_ASSOC);

	/*** Academic Information ***/

	//query to get academic code
	$academicPlanCodeQuery = 'SELECT students.`Academic Plan Code` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentAcademicPlanCode = mysqli_query($conn, $academicPlanCodeQuery) or die("Error fetching student's academic plan code.");
	$academicPlanCode = mysqli_fetch_array($getStudentAcademicPlanCode,MYSQLI_ASSOC);

	//query to get academic plan 
	$academicPlanQuery = 'SELECT `academic plan codes`.`Academic Plan` FROM `academic plan codes` JOIN students ON students.`Academic Plan Code` = `academic plan codes`.`Code` WHERE students.`Student Id` ='.$userid.'';
	$getStudentAcademicPlan = mysqli_query($conn, $academicPlanQuery) or die("Error fetching student's academic plan.");
	$academicPlan = mysqli_fetch_array($getStudentAcademicPlan,MYSQLI_ASSOC);

	//query to get current academic year of student
	$currentYearQuery = 'SELECT students.`Current Year` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentCurrentYear = mysqli_query($conn, $currentYearQuery) or die("Error fetching student's currnt year.");
	$currentYear = mysqli_fetch_array($getStudentCurrentYear,MYSQLI_ASSOC);

	//query to get student academic level
	$levelQuery = 'SELECT students.`Level` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentLevel = mysqli_query($conn, $levelQuery) or die("Error fetching level.");
	$level = mysqli_fetch_array($getStudentLevel,MYSQLI_ASSOC);

	//query to get registration date
	$registrationDateQuery = 'SELECT students.`Registration Date` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentRegistrationDate = mysqli_query($conn, $registrationDateQuery) or die("Error fetching student's registration date.");
	$registrationDate = mysqli_fetch_array($getStudentRegistrationDate,MYSQLI_ASSOC);
	
	$userPasswordQuery = 'SELECT students.`Password` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getUserPassword = mysqli_query($conn, $userPasswordQuery) or die("Error fetching student's password.");
	$userPassword = mysqli_fetch_array($getUserPassword,MYSQLI_ASSOC);
	
	$personalGoals = 'ADD COLUMN `Personal Goals` VARCHAR(145) NULL';
	$getPersonalGoals = mysqli_query($conn, $userPasswordQuery) or die("Error fetching student's password.");
	
	$query = 'ALTER TABLE students ADD COLUMN `Personal Goals` VARCHAR(145) NULL';
	if($conn->query($query)) {
		echo "It worked";
	}
?>

<!-- start of the HTML script for the student view page  -->

<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" href="profile.css">
			<title> Student Profile </title>
			
			<!-- Google Fonts -->
			<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
			<!-- Bootstrap CSS -->
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
			<!-- Font Awesome CSS -->
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
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
			
			<div class="student-profile py-4">
				<div class="container">
					<div class="row">
							<div class="col-lg-4" >
								<div class="card shadow-sm">
									<div class="card-header bg-transparent text-center">
									<img class="profile_img" src="default-dp.jpg" alt="avatar">
										<h3><strong><?php echo $firstName['First Name']. ' , '.$lastName['Last Name']?></strong></h3>
									</div>
									<div class="card-body">
										<p class="mb-0"><strong class="pr-1">Student ID:</strong> <?php echo $getStudentID ?> </p>
										<p class="mb-0"><strong class="pr-1">Academic Plan Code:</strong> <?php echo $academicPlanCode['Academic Plan Code'] ?> </p>
										<p class="mb-0"><strong class="pr-1">Course:</strong> <?php echo $academicPlan['Academic Plan'] ?> </p>
										<p class="mb-0"><strong class="pr-1">Level:</strong> <?php echo $level['Level'] ?> </p>
									</div>							
						<br>
						
									<div class="card-header bg-transparent text-center">
										<h3 class="mb-0"><i class="far fa-clone pr-1"></i>Personal Goals</h3>
									</div>
									<div align = "center" class="card-body pt-0">
										<p class="text-muted">Insert your personal goals</p>
									</div>
								</div>
							</div>
						
					<div class="col-lg-8">
						<div class="card shadow-sm">
							<div class="card-header bg-transparent border-0">
								<a href="profile.php" class="btn btn-sm btn-default float-right">Edit Profile</a>
								<h3 class="mb-0"><i class="far fa-clone pr-1"></i>Personal Information</h3> 
							</div>
							<div class="card-body pt-0">
								<table class="table table-bordered">
									<tr>
										<th width="30%">Nationality</th>
										<td width="2%">:</td>
										<td> <?php echo $nationality['Nationality'] ?> </td>
									</tr>
									<tr>
										<th width="30%">Email Address</th>
										<td width="2%">:</td>
										<td> <?php echo $email['Email Address'] ?> </td>
									</tr>
									<tr>
										<th width="30%">Gender</th>
										<td width="2%">:</td>
										<td> <?php echo $gender['Gender'] ?> </td>
									</tr>
									<tr>
										<th width="30%">Year</th>
										<td width="2%">:</td>
										<td> <?php echo $currentYear['Current Year'] ?> </td> 
									</tr>
									<tr>
										<th width="30%">Registration Date</th>
										<td width="2%">:</td>
										<td> <?php echo $registrationDate['Registration Date'] ?> </td>
									</tr>
								</table>
							 </div>
						</div>
					<br>
					
						<div class="col-lg-8">
							<div class="card shadow-sm">
								<div class="card-header bg-transparent border-0">
									<h3 class="mb-0"><i class="far fa-clone pr-1"></i>Account Information</h3>
								</div>
								<div class="card-body pt-0">
									<table class="table table-bordered">
										<tr>
											<th width="30%">User ID</th>
											<td width="2%">:</td>
											<td> <?php echo $getStudentID ?> </td>
										</tr>
										<tr>
											<th width="30%">Password</th>
											<td width="2%">:</td>
											<td> <?php echo $userPassword['Password'] ?> </td>
										</tr>
									</table>
								</div>
							</div>
					</div>	  
				<br>
					
					<div class="col-lg-8">
						<div class="card shadow-sm">
							<div class="card-header bg-transparent border-0">
								<h3 class="mb-0"><i class="far fa-clone pr-1"></i>To-Do List</h3>
							</div>
							<div class="card-body pt-0">
								<p>*a to-do list which autosaves and enables users to strikethrough the list done*</p>
							</div>
						</div>
					</div>
				</div>	  
					</div>
				</div>
			</div>
			</div>
		</body>
</html>
<!-- End of HTML script -->
