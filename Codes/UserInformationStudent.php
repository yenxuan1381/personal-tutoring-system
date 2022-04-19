<?php

	session_start();

	include_once('Connection.php'); //to connect the page to the database

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or (($_SESSION['category'] != "Student") and ($_SESSION['category'] != "Tutor")))
	{
		header("Location:Loginpage.php");
	}
    if ($_SESSION['category'] == "Student")
    {
        $userid = $_GET['studentID']?? "";
    }
	if ($_SESSION['category'] == "Tutor")
    {
        if(isset($_GET['tuteeid'])){
            $userid = $_GET['tuteeid'];
            
        }
        
    }

	$getStudentID = $userid;

	$firstNameQuery = 'SELECT students.`First Name` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentFirstName = mysqli_query($conn, $firstNameQuery) or die("Error fetching student's first name.");
	$firstName = mysqli_fetch_array($getStudentFirstName,MYSQLI_ASSOC);

	$lastNameQuery = 'SELECT students.`Last Name` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentLastName = mysqli_query($conn, $lastNameQuery) or die("Error fetching student's last name.");
	$lastName = mysqli_fetch_array($getStudentLastName,MYSQLI_ASSOC);

    $genderQuery = 'SELECT students.`Gender` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentGender = mysqli_query($conn, $genderQuery) or die("Error fetching student's gender.");
	$gender = mysqli_fetch_array($getStudentGender,MYSQLI_ASSOC);	

	$nationalityQuery = 'SELECT students.`Nationality` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentNationality = mysqli_query($conn, $nationalityQuery) or die("Error fetching student's last name.");
	$nationality = mysqli_fetch_array($getStudentNationality,MYSQLI_ASSOC);

	$emailQuery = 'SELECT students.`Email Address` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentEmail = mysqli_query($conn, $emailQuery) or die("Error fetching student's email.");
	$email = mysqli_fetch_array($getStudentEmail,MYSQLI_ASSOC);

	//Academic Information

	$academicPlanCodeQuery = 'SELECT students.`Academic Plan Code` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentAcademicPlanCode = mysqli_query($conn, $academicPlanCodeQuery) or die("Error fetching student's academic plan code.");
	$academicPlanCode = mysqli_fetch_array($getStudentAcademicPlanCode,MYSQLI_ASSOC);

	$academicPlanQuery = 'SELECT `academic plan codes`.`Academic Plan` FROM `academic plan codes` JOIN students ON students.`Academic Plan Code` = `academic plan codes`.`Code` WHERE students.`Student Id` ='.$userid.'';
	$getStudentAcademicPlan = mysqli_query($conn, $academicPlanQuery) or die("Error fetching student's academic plan.");
	$academicPlan = mysqli_fetch_array($getStudentAcademicPlan,MYSQLI_ASSOC);

	$currentYearQuery = 'SELECT students.`Current Year` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentCurrentYear = mysqli_query($conn, $currentYearQuery) or die("Error fetching student's current year.");
	$currentYear = mysqli_fetch_array($getStudentCurrentYear,MYSQLI_ASSOC);

	$levelQuery = 'SELECT students.`Level` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentLevel = mysqli_query($conn, $levelQuery) or die("Error fetching level.");
	$level = mysqli_fetch_array($getStudentLevel,MYSQLI_ASSOC);

	$registrationDateQuery = 'SELECT students.`Registration Date` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getStudentRegistrationDate = mysqli_query($conn, $registrationDateQuery) or die("Error fetching student's registration date.");
	$registrationDate = mysqli_fetch_array($getStudentRegistrationDate,MYSQLI_ASSOC);

    if(isset($_POST['Personal_Goal'])){
        $personalGoals = $_POST['Personal_Goal'];
        $editPersonalGoalsQuery = "UPDATE students SET `Personal Goals` = '$personalGoals' WHERE `Student Id` = '$userid'";
        if(mysqli_query($conn, $editPersonalGoalsQuery)){
    		header("Location: UserInformationStudent.php?studentID=".$userid);
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }

    $personalGoalsQuery = 'SELECT students.`Personal Goals` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getPersonalGoals = mysqli_query($conn, $personalGoalsQuery) or die("Error fetching student's personal goals.");
	$personalGoals = mysqli_fetch_array($getPersonalGoals,MYSQLI_ASSOC);

    if(isset($_POST['Remark'])){
        $remark = $_POST['Remark'];
        $sql = "UPDATE students SET `Remarks`='$remark' WHERE `Student id` = '$getStudentID'";
        if(mysqli_query($conn, $sql)){
    		header("Location:UserInformationStudent.php?tuteeid=".$getStudentID);
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }

    $remarksQuery = 'SELECT students.`remarks` FROM `students` WHERE `Student Id` = '.$userid.'';
	$getRemarks = mysqli_query($conn, $remarksQuery) or die("Error fetching student's personal goals.");
	$remarks = mysqli_fetch_array($getRemarks,MYSQLI_ASSOC);

	if(isset($_POST['First_Name'])){
        $fName = $_POST['First_Name'];
        $lName = $_POST['Last_Name'];
        $nationality = $_POST['Nationality'];
        $email = $_POST['Email'];
        $sql = "UPDATE students SET `First Name`='$fName',`Last Name`='$lName',Nationality='$nationality',`Email Address`='$email' WHERE `Student Id`='$getStudentID' ";
        if(mysqli_query($conn, $sql)){
    		header("Location:UserInformationStudent.php?studentID=".$getStudentID);
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
	}

    if(isset($_POST['Academic_Plan_Code'])){
        $code = $_POST['Academic_Plan_Code'];
        $level = $_POST['Level'];
        $year = $_POST['Current_Year'];
        $rDate = $_POST['Registration_Date'];
        $sql = "UPDATE students SET `Academic Plan Code`='$code', `Level`='$level',`Current Year` = '$year',`Registration Date`='$rDate' WHERE `Student Id`='$getStudentID'";
        if(mysqli_query($conn, $sql)){
    		header("Location:UserInformationStudent.php?tuteeid=".$getStudentID);
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
?>

<!-- start of the HTML script for the student view page  -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="profile.css">
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
                        <?php
                            if($_SESSION['category'] == "Tutor")
                            {
                                echo '<h3>Student Profile:</h3>';
                            }else{
                                echo '<h3>My Profile:</h3>';
                            }
                        ?>
                        <h1><?php echo $firstName['First Name']?></h1>
                        <h4><?php echo $lastName['Last Name']?></h4>
                    </div>
                    <span class="role">Student</span>
                </div>
            </div>
                <div id="pop-out">
                    <div class="lower-title-1">
                        <span class="sub-title">Edit Personal Goal</span>
                        <div class="edit_goal"> 
                            <button class="edit1" onclick="remove()"><ion-icon name="close"></ion-icon></button>
                        </div>
                    </div>
                    <form method="post" name="form1">
                        <textarea name="Personal_Goal" placeholder="Your Personal Goal.."></textarea><br>
                        <input type="submit" value="Confirm">
                    </form>
                </div>
                <div id="pop-out1">
                    <div class="lower-title-1">
                        <span class="sub-title">Personal Information</span>
                        <div class="edit_goal"> 
                            <button class="edit1" onclick="remove1()"><ion-icon name="close"></ion-icon></button>
                        </div>
                    </div>
                    <form method="post">
                        <label for="First_Name">First Name:</label><br>
                        <input type="text" name="First_Name" value="<?php echo $firstName['First Name'] ?>"><br><br>
                        <label for="Last_Name">Last Name: </label><br>
                        <input type="text" name="Last_Name" value="<?php echo $lastName['Last Name'] ?>"><br><br>
                        <label for="Nationality">Nationality:</label><br>
                        <input type="text" name="Nationality" value="<?php echo $nationality['Nationality'] ?>"><br><br>
                        <label for="Email">Email:</label><br>
                        <input type="text" name="Email" value="<?php echo $email['Email Address'] ?>"><br><br>
                        <input type="submit" value="Confirm">
                    </form>
                </div>
                <div id="pop-out2">
                <div class="lower-title-1">
                        <span class="sub-title">Academic Information</span>
                        <div class="edit_goal"> 
                            <button class="edit1" onclick="remove2()"><ion-icon name="close"></ion-icon></button>
                        </div>
                    </div>
                    <form method="post">
                        <label for="Academic_Plan_Code">Academic Plan Code:</label><br>
                        <input type="text" name="Academic_Plan_Code" value="<?php echo $academicPlanCode['Academic Plan Code'] ?>"><br><br>
                        <label for="Level">Level:</label><br>
                        <input type="text" name="Level" value="<?php echo $level['Level'] ?>"><br><br>
                        <label for="Current_Year">Current Year:</label><br>
                        <input type="text" name="Current_Year" value="<?php echo $currentYear['Current Year'] ?>"><br><br>
                        <label for="Registration_Date">Registration Date:</label><br>
                        <input type="text" name="Registration_Date" value="<?php echo $registrationDate['Registration Date'] ?>"><br><br>
                        <input type="submit" value="Confirm">
                    </form>
                </div>
                <div id="pop-out3">
                    <div class="lower-title-1">
                        <span class="sub-title">Edit Remark</span>
                        <div class="edit_goal"> 
                            <button class="edit1" onclick="remove3()"><ion-icon name="close"></ion-icon></button>
                        </div>
                    </div>
                    <form method="post" name="form1">
                        <textarea name="Remark" placeholder="Add Remarks Here..."></textarea><br>
                        <input type="submit" value="Confirm">
                    </form>
                </div>
            <div class="lower_profile">
                <div class="info">
                    <div class="lower-title-1">
                        <span class="sub-title">Personal Information</span>
                        <div class="edit_goal"> 
                            <?php
                                if ($_SESSION['category'] == "Student")
                                {
                                    echo '<button class="edit1" onclick="pop1()"><ion-icon name="create"></ion-icon></button>';
                                }
                            ?>
                        </div>
                    </div>
					<strong>Student ID: <br></strong> <?php echo $getStudentID ?> </br>
					<strong>First Name: <br></strong> <?php echo $firstName['First Name'] ?> </br>
					<strong>Last Name: <br></strong> <?php echo $lastName['Last Name'] ?> </br>
					<strong>Nationality: <br></strong> <?php echo $nationality['Nationality'] ?> </br>
					<strong>Email: <br></strong> <?php echo $email['Email Address'] ?> </br>
                </div>
                <div class="academic">
                    <div class="lower-title-1">
                        <span class="sub-title">Academic Information</span>
                        <div class="edit_goal"> 
                            <?php
                                if ($_SESSION['category'] == "Tutor")
                                {
                                    echo '<button class="edit1" onclick="pop2()"><ion-icon name="create"></ion-icon></button>';
                                }
                            ?>
                        </div>
                    </div>
					<strong>Academic Plan Code: <br></strong> <?php echo $academicPlanCode['Academic Plan Code'] ?> </br>
					<strong>Academic Plan: <br></strong> <?php echo $academicPlan['Academic Plan'] ?> </br>
					<strong>Level: <br></strong> <?php echo $level['Level'] ?> </br>
					<strong>Current Year: <br></strong> <?php echo $currentYear['Current Year'] ?> </br>
					<strong>Registration Date: <br></strong> <?php echo $registrationDate['Registration Date'] ?> </br>
                </div>
                <div class="goal_and_remark">
                    <div class="personal-goal">
                        <div class="lower-title-1">
                            <span class="sub-title">Personal Goal</span>
                            <div class="edit_goal"> 
                                <?php
                                    if ($_SESSION['category'] == "Student")
                                    {
                                        echo '<button class="edit1" onclick="pop()"><ion-icon name="create"></ion-icon></button>';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php echo $personalGoals['Personal Goals'] ?>
                    </div>
                    <div class="remark">
                        <div class="lower-title-1">
                            <span class="sub-title">Remark</span>
                            <div class="edit_goal"> 
                                <?php
                                    if ($_SESSION['category'] == "Tutor")
                                    {
                                        echo '<button class="edit1" onclick="pop3()"><ion-icon name="create"></ion-icon></button>';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php echo $remarks['remarks']?>
                    </div>
                </div>
            </div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        function pop() {
            document.getElementById("pop-out").style.visibility = "visible";
        }
        function remove() {
            document.getElementById("pop-out").style.visibility = "hidden";
        }

        function pop1() {
            document.getElementById("pop-out1").style.visibility = "visible";
        }
        function remove1() {
            document.getElementById("pop-out1").style.visibility = "hidden";
        }

        function pop2() {
            document.getElementById("pop-out2").style.visibility = "visible";
        }
        function remove2() {
            document.getElementById("pop-out2").style.visibility = "hidden";
        }
        function pop3() {
            document.getElementById("pop-out3").style.visibility = "visible";
        }
        function remove3() {
            document.getElementById("pop-out3").style.visibility = "hidden";
        }


    </script>
    </body>
</html>
<!-- End of HTML script -->
