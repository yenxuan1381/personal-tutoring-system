<!DOCTYPE html>
<html lang="en">
	
    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="./View/html/style.css">
        <link rel="stylesheet" type="text/css" href="./View/html/announcement_new.css">
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
            <!-- Navigation Bar -->
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
                    <!-- Form to add new appointment -->
                    <form id="appointmentform"  method="POST" >
                        <label for="student">Student:</label><br>
						<select id="student" name="student">
							<?php while($rows = mysqli_fetch_array($tutor_studentlist, MYSQLI_ASSOC))
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