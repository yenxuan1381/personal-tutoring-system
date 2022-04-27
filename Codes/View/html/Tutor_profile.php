<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="./View/html/style.css">
        <link rel="stylesheet" type="text/css" href="./View/html/Tutor_profile.css">

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
                        <h1><?php echo $tutor_info['Name']?></h1>
                    </div>
                    <span class="role">Tutor</span>
                </div>
                <div class="to-do-list">
                    <a href="ToDoList.php"><ion-icon name="checkmark-done-circle"></ion-icon></a>
                </div>
            </div>
            <!-- Show tutor profile information -->
            <div class="lower_profile">
                <div class="info">
                    <p>Personal Information</p>
					<strong>Lecturer ID: </strong> <?php echo $tutor_info['Lect ID'] ?> </br>
        			<strong>Name: </strong> <?php echo $tutor_info['Name'] ?> </br>
        			<strong>Email: </strong> <?php echo $tutor_info['email'] ?> </br>
                </div>
                <div class="academic">
                    <p>Academic Information</p>
					<strong>School: </strong> <?php echo $tutor_info['School'] ?> </br>
         			<strong>Office Location: </strong> <?php echo $tutor_info['office'] ?> </br>
         			<strong>Tutor Position: </strong> <?php if($isSeniorTutor){echo "Senior Tutor";}else{echo "Regular Tutor";}?> </br>
                </div>
            </div>
		</div>
			</div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>