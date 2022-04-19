<?php
	session_start();

	include_once('Connection.php');

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor"))
	{
		header("Location:Loginpage.php");
	}
	$userid = $_SESSION['userid'];
	$sql1 = "SELECT name FROM tutors WHERE `Lect ID` = $userid";
	$result = $conn->query($sql1);	
	while($rows=$result->fetch_assoc())
	{
		$tutorname = $rows['name'];
	}

	if(isset($_POST['text'])){
		$title = $_POST['title'];
		$announcement = $_POST['text'];
	}
	if(isset($announcement))
	{
		$sql = "INSERT INTO announcement (title,content,tutor_name) VALUES ('$title','$announcement','$tutorname')";
				
		if(mysqli_query($conn, $sql)){
    		header("Location:Announcement.php");
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
                    <span class="title">New Announcement</span>
                </div>
                <div class="content-container">
                    <form id="announcementform"  method="POST" >
                        <label for="title">Title:</label><br>
                        <input type="text" id="title" name="title"><br></br>
                        <label for="Content">Content:</label><br>
                        <textarea id="announcement" name="text" placeholder="Write something..."></textarea>
						<input type="submit" value="Submit">
                    </form>
                    

                </div>
                <div class="back-button">
                    <a href="announcement.php">
                        <ion-icon name="arrow-back"></ion-icon>
                    </a>
                </div>
            </div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>












