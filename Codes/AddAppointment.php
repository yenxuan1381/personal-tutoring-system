<?php
	session_start();

	include_once('Connection.php');

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor"))
	{
		header("Location:Loginpage.php");
	}
	$userid = $_SESSION['userid'];
	$date= $_GET['date'];
	$sql1 = "SELECT name FROM tutors WHERE `Lect ID` = $userid";
	$result1 = $conn->query($sql1);	
	while($rows=$result1->fetch_assoc())
	{
		$tutorname = $rows['name'];
	}

    $sql = "SELECT `Full Name` FROM students WHERE `Tutor Id` = $userid";
    $result = $conn->query($sql);

	if(isset($_POST['student'])){
		$studentname = $_POST['student'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		echo "<script>console.log('$start')</script>";

		$sql2 = "INSERT INTO meeting (date,start_time,end_time,tutor_name,student_name) VALUES ('$date','$start','$end','$tutorname','$studentname')";
		if(mysqli_query($conn, $sql2)){
    		header("Location:Appointmentview.php?date=$date");
		} else {
    		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
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
        <link rel="stylesheet" type="text/css" href="announcement_new.css">
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
                <a href="loginpage.php">
                    <span class="title">Logout</span>
                    <ion-icon name="log-out"></ion-icon>
                </a>
            </div>
        </aside>
        <main>
            <div class="background">
                <div class="background-image"></div>
                <div class="title-container">
                    <span class="title">New Appointment</span>
                </div>
                <div class="content-container">
                    <form id="appointmentform"  method="POST" >
                        <label for="student">Student:</label><br>
						<select id="student" name="student">
							<?php while($rows=$result->fetch_assoc())
							{
								echo "<option value='",$rows['Full Name'],"'>",$rows['Full Name'],"</option>";
							}
							?>
						</select>
                        <br></br>
                        <label for="start">Starting time:</label><br>
                        <input type="time" id="start" name="start"><br><br>
						<label for="end">Ending time:</label><br>
                        <input type="time" id="end" name="end">
						<input type="submit" value="Make Appointment">
                    </form>
                    

                </div>
                <div class="back-button">
                    <a href="Appointmentview.php?date=<?php echo"$date" ?>">
                        <ion-icon name="arrow-back"></ion-icon>
                    </a>
                </div>
            </div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>