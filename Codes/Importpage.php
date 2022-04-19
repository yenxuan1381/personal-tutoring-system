<?php
	session_start();
	
	include('Connection.php');
	
	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Admin"))
	{
		header("Location:Loginpage.php");
	}
	
	include('Import.php');
	
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="importpage.css">
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
                    }else{
						require_once "sidebar_admin.php";
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
            <div class="background">
                <div class="background-image"></div>
                <div class="title-container">
                    <span class="title">Import File</span>
                </div>
                <div class="content-container">
					<form enctype="multipart/form-data" method="post" action="" id="importfile">
						<div class="drop-zone">
							<span class="drop-zone__prompt">Drop .csv file here or click to upload</span>
							<input type="file" name="file" id="file" class="drop-zone__input">
						</div>
						<input type="submit" name="submitfile">
						<input type="hidden" name="AdminID" value="<?php echo $userid; ?>" />
					</form>
                </div>

                <div class="dropdown">
                    <ion-icon name="settings-outline"></ion-icon>
                    <div class="dropdown-content">
                        <ul>
                            <li>
                                <a href = "Importpage.php">
                                    <span class="channel">Add New Students</span>
                                </a>
                            </li>
                            <li>
                                <a href = "Addnewtutors.php">
                                    <span class="channel">Add New Tutors</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
				
            </div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script src="import.js"></script>
    </body>
</html>



  