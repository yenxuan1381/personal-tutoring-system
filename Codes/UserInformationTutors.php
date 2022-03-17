<?php

include_once('Connection.php');

// Info to be passed around, holds the tutor ID
$userid = $_GET['LectID'];

$getTutorID = $userid;

//query to get tutor's name
$tutorNameQuery = 'SELECT tutors.`Name` FROM `tutors` WHERE `Lect ID` = '.$userid.'';
$getTutorName = mysqli_query($conn, $tutorNameQuery) or die("Error fetching tutor's name.");
$name = mysqli_fetch_array($getTutorName, MYSQLI_ASSOC);

//query to get tutor's email address
$tutorEmailQuery = 'SELECT tutors.`email` FROM `tutors` WHERE `Lect ID` = '.$userid.'';
$getTutorEmail = mysqli_query($conn, $tutorEmailQuery) or die("Error fetching tutor's email.");
$email = mysqli_fetch_array($getTutorEmail, MYSQLI_ASSOC);

//query to get tutor's school
$tutorSchoolQuery = 'SELECT tutors.`School` FROM `tutors` WHERE `Lect ID` = '.$userid.'';
$getTutorSchool = mysqli_query($conn, $tutorSchoolQuery) or die("Error fetching tutor's school.");
$school = mysqli_fetch_array($getTutorSchool, MYSQLI_ASSOC);

//query to get tutor's office
$tutorOfficeQuery = 'SELECT tutors.`office` FROM `tutors` WHERE `Lect ID` = '.$userid.'';
$getTutorOffice = mysqli_query($conn, $tutorOfficeQuery) or die("Error fetching tutor's office.");
$office = mysqli_fetch_array($getTutorOffice, MYSQLI_ASSOC);

//query to get tutor's position
$seniorTutorsListQuery = 'SELECT `Lect ID` FROM `senior tutors`';
$getSeniorTutors = mysqli_query($conn, $seniorTutorsListQuery) or die("Error fetching tutor's name.");
$seniorTutorsList = mysqli_fetch_array($getSeniorTutors, MYSQLI_NUM);

while($data = mysqli_fetch_array($getSeniorTutors, MYSQLI_NUM)){
  if(in_array($userid, $data)) {
      $tutorPosition = "Senior Tutor";
    } else {
      $tutorPosition = "Regular Tutor";
    }
}


 ?>
 <!-- start of the HTML script for the student view page  -->

  <!DOCTYPE html>
  <html>
   <head>
		<link rel="stylesheet" href="Profile.css">
		<title> Tutor Profile </title>
			
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
 				<a href="#">Nottingham <span>Tutor System</span></a>
 				<ul>
					<li><a href="Tutorpage.php">Tutees</a></li>
 					<li><a href="loginpage.php">Log Out</a></li>
 				</ul>
 			</nav>
 		</div>
 	<!-- End Menu -->
	
	<!--Personal Information -->
	<div class="student-profile py-4">
		<div class="container">
			<div class="row">
					<div class="col-lg-4" >
						<div class="card shadow-sm">
							<div class="card-header bg-transparent text-center">
							<img class="profile_img" src="default-dp.jpg" alt="avatar">
								<h3><strong><?php echo $name['Name']?></strong></h3>
							</div>
							<div class="card-body">
								<p class="mb-0"><strong class="pr-1">Lecturer ID:</strong> <?php echo $getTutorID ?> </p>
								<p class="mb-0"><strong class="pr-1">Email:</strong> <?php echo $email['email'] ?> </p>										
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="card shadow-sm">
							<div class="card-header bg-transparent border-0">
								<h3 class="mb-0"><i class="far fa-clone pr-1"></i>Academic Information</h3> 
							</div>
							<div class="card-body pt-0">
								<table class="table table-bordered">
									<tr>
										<th width="30%">Office</th>
										<td width="2%">:</td>
										<td> <?php echo $office['office'] ?> </td>
									</tr>
									<tr>
										<th width="30%">School</th>
										<td width="2%">:</td>
										<td> <?php echo $school['School'] ?> </td>
									</tr>
									<tr>
										<th width="30%">Position</th>
										<td width="2%">:</td>
										<td> <?php echo $tutorPosition ?> </td>
									</tr>
								</table>
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
