<?php
//start of PHP script
	session_start();

	//to connect the page to the database
	include_once('Connection.php');

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Student"))
	{
		header("Location:Loginpage.php");
	}

	//storing the student ID that the student entered at the log in page in the studentid variable
	$userid = $_SESSION['userid'];

	// an sql query to get the tutor ID
	$getTutorID = mysqli_query($conn, 'SELECT tutors.`Lect ID` FROM tutors JOIN students ON students.`Tutor Id` = tutors.`Lect ID` WHERE students.`Student Id`= ' .$userid) or die('Error Fetching Tutor ID');
	//fetching the tutor ID received from the query
	$tutorID = mysqli_fetch_array($getTutorID,MYSQLI_ASSOC);

	//an sql query to get all students under the same tutor in the same year
	$query = 'SELECT students.`Student Id`, students.`First Name`, students.`Last Name`, `academic plan codes`.`Academic Plan`, students.`Current Year` FROM `academic plan codes` JOIN students ON students.`Academic Plan Code` = `academic plan codes`.`Code` WHERE students.`Tutor Id` LIKE '.$tutorID['Lect ID'].' AND students.`Student Id` NOT LIKE '.$userid.' AND students.`Current Year` LIKE (SELECT students.`Current Year` FROM students WHERE students.`Student Id` LIKE '.$userid.')';
	$studentsUnderSameTutor = mysqli_query($conn, $query) or die("Error fetching students data.");

	//sql query to get the tutor's name
	$getTutorName = mysqli_query($conn, 'SELECT tutors.`Name` FROM tutors JOIN students ON students.`Tutor Id` = tutors.`Lect ID` WHERE students.`Student Id`= ' .$userid) or die('Error Fetching Tutor Name');
	//fetching the tutor name received from the query
	$tutorName = mysqli_fetch_array($getTutorName,MYSQLI_ASSOC);

	//sql query to get the tutor's school
	$getTutorSchool = mysqli_query($conn, 'SELECT tutors.`School` FROM tutors JOIN students ON students.`Tutor Id` = tutors.`Lect ID` WHERE students.`Student Id`= ' .$userid) or die('Error Fetching Tutor Name');
	//fetching the tutor's school received from the query
	$tutorSchool = mysqli_fetch_array($getTutorSchool,MYSQLI_ASSOC);

	//sql query to get the tutor's email
	$getTutorEmail = mysqli_query($conn, 'SELECT tutors.`email` FROM tutors JOIN students ON students.`Tutor Id` = tutors.`Lect ID` WHERE students.`Student Id`= ' .$userid) or die('Error Fetching Tutor Name');
	//fetching the tutor's email received from the query
	$tutorEmail = mysqli_fetch_array($getTutorEmail,MYSQLI_ASSOC);

	//sql query to get the tutor's office
	$getTutorOffice = mysqli_query($conn, 'SELECT tutors.`office` FROM tutors JOIN students ON students.`Tutor Id` = tutors.`Lect ID` WHERE students.`Student Id`= ' .$userid) or die('Error Fetching Tutor Name');
	//fetching the tutor's office received from the query
	$tutorOffice = mysqli_fetch_array($getTutorOffice,MYSQLI_ASSOC);

	//query to get first name
	$firstNameQuery = 'SELECT students.`First Name` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentFirstName = mysqli_query($conn, $firstNameQuery) or die("Error fetching student's first name.");
	$firstName = mysqli_fetch_array($getStudentFirstName,MYSQLI_ASSOC);

  //query to get last name
	$lastNameQuery = 'SELECT students.`Last Name` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentLastName = mysqli_query($conn, $lastNameQuery) or die("Error fetching student's last name.");
	$lastName = mysqli_fetch_array($getStudentLastName,MYSQLI_ASSOC);

 //query to get academic plan
	$academicPlanQuery = 'SELECT `academic plan codes`.`Academic Plan` FROM `academic plan codes` JOIN students ON students.`Academic Plan Code` = `academic plan codes`.`Code` WHERE students.`Student Id` ='.$userid.'';
	$getStudentAcademicPlan = mysqli_query($conn, $academicPlanQuery) or die("Error fetching student's academic plan.");
	$academicPlan = mysqli_fetch_array($getStudentAcademicPlan,MYSQLI_ASSOC);

//end of PHP script
 ?>

<!-- start of the HTML script for the student view page  -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="home.css">
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
            <div class="upper">
                <div class="Tutor">
                    <div class="Tutor_picture">
                        <img src="./image/profile.jpeg" alt="">
                    </div>
                    <div class="Tutor_detail">
                        <h3>Your Tutor:</h3>
                        <h1><?php echo $tutorName['Name'] ?></h1>
                        <h3><?php echo $tutorEmail['email'] ?></h3>
                        <h3><?php echo $tutorSchool['School'] ?></h3>
                        <h3><?php echo $tutorOffice['office'] ?></h3>
                    </div>
                </div>
            </div>
            <div class="nav">
                <a href="Appointmentview.php">
                    <span class="title">Appointment</span>
                </a>
            </div>
            <div class="lower">
                <div class="search">
                    <input type="text" id="myInput" onkeyup="filterSearch()" placeholder="Search Student...">
                    <ion-icon name="search-outline"></ion-icon>
                </div>
                <div class="table">
                    <h4>List of students under the same tutor</h4>
					<table id="myTable" class="fl-table">
                        <tr class="top" height="40px">
							<th><strong>ID</strong></th>
							<th><strong>First Name</strong></th>
							<th><strong>Last Name</strong></th>
							<th><strong>Academic Plan</strong></th>
						</tr>
						<!--Placing the student data into the rows of the table -->
						<tbody>
						<?php
						$studentsList = $studentsUnderSameTutor;
						while ($rows = mysqli_fetch_array($studentsList,MYSQLI_ASSOC)) {
							?>

							<tr>
							<?php
							echo '<td>'.$rows['Student Id'].'</td>';
							echo '<td>'.$rows['First Name'].'</td>';
							echo '<td>'.$rows['Last Name'].'</td>';
							echo '<td>'.$rows['Academic Plan'].'</td>';
							?>
							</tr>
							<?php
						}
						?>
						</tbody>
					</table>

					<!-- Hidden form that echoes (returns) the user id -->
					<form method="post" action="UserInformationStudent.php">
						<input type="hidden" name="studentID" id="studentID" value="<?php echo $userid; ?>" />
					</form>
				</div>
			</div>
		</main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>

<script>
function filterSearch() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        // td = tr[i].getElementsByTagName("td")[0];
        alltags = tr[i].getElementsByTagName("td");
        isFound = false;
        for(j=0; j< alltags.length; j++) {
          td = alltags[j];
          if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                  j = alltags.length;
                  isFound = true;
              }
            }       
          }
          if(!isFound && tr[i].className !== "top") {
            tr[i].style.display = "none";
          }
        }
    }
</script>