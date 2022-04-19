<?php
session_start();
include_once('Connection.php');
if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor"))
{
    header("Location:Loginpage.php");
}
// Info to be passed around, holds the tutor ID
$userid = $_SESSION['userid'];

$getTutorID = $userid;

$tutorNameQuery = 'SELECT tutors.`Name` FROM `tutors` WHERE `Lect ID` = '.$userid.'';
$getTutorName = mysqli_query($conn, $tutorNameQuery) or die("Error fetching tutor's name.");
$name = mysqli_fetch_array($getTutorName, MYSQLI_ASSOC);

$tutorEmailQuery = 'SELECT tutors.`email` FROM `tutors` WHERE `Lect ID` = '.$userid.'';
$getTutorEmail = mysqli_query($conn, $tutorEmailQuery) or die("Error fetching tutor's email.");
$email = mysqli_fetch_array($getTutorEmail, MYSQLI_ASSOC);

$tutorSchoolQuery = 'SELECT tutors.`School` FROM `tutors` WHERE `Lect ID` = '.$userid.'';
$getTutorSchool = mysqli_query($conn, $tutorSchoolQuery) or die("Error fetching tutor's school.");
$school = mysqli_fetch_array($getTutorSchool, MYSQLI_ASSOC);

$tutorOfficeQuery = 'SELECT tutors.`office` FROM `tutors` WHERE `Lect ID` = '.$userid.'';
$getTutorOffice = mysqli_query($conn, $tutorOfficeQuery) or die("Error fetching tutor's office.");
$office = mysqli_fetch_array($getTutorOffice, MYSQLI_ASSOC);

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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="profile_tutor.css">

    </head>
    <body>
	<aside>
            <div class="header">
                <div class="logo">
                    <img src="./image/logo1.png" alt="" >
                    <span class="title">NOTTSTUTOR</span>
                </div>
                <div class="hidden">
                    <img src="./image/icon.png" alt="">
                </div>
            </div>
            <div class="menu">
                <?php 
                    if($_SESSION['category'] == "Student") {
                        require_once "sidebar_student.php";
                    }
                    else if($_SESSION['category'] == "Tutor"){
                        require_once "sidebar_tutor.php";
                    }
                
                ?>
            </div>
            <div class="logout">
                <a href="Loginpage.php">
                    <span class="title">Logout</span>
                    <ion-icon name="log-out"></ion-icon>
                </a>
            </div>
        </aside>
        <main>
            <div class="upper_profile">
                <div class="profile_detail">
                    <div class="photo">
                        <img src="./image/profile.jpeg" alt="">
                    </div>
                    <div class="profile_name">
                        <h3>My Profile:</h3>
                        <h1><?php echo $name['Name']?></h1>
                    </div>
                    <span class="role">Tutor</span>
                </div>
                <div class="to-do-list">
                    <a href="ToDoList.php"><ion-icon name="checkmark-done-circle"></ion-icon></a>
                </div>
            </div>
            <div class="lower_profile">
                <div class="info">
                    <p>Personal Information</p>
					<strong>Lecturer ID: </strong> <?php echo $getTutorID ?> </br>
        			<strong>Name: </strong> <?php echo $name['Name'] ?> </br>
        			<strong>Email: </strong> <?php echo $email['email'] ?> </br>
                </div>
                <div class="academic">
                    <p>Academic Information</p>
					<strong>School: </strong> <?php echo $school['School'] ?> </br>
         			<strong>Office Location: </strong> <?php echo $office['office'] ?> </br>
         			<strong>Tutor Position: </strong> <?php echo $tutorPosition ?> </br>
                </div>
            </div>
		</div>
			</div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
<!-- End of HTML script -->
