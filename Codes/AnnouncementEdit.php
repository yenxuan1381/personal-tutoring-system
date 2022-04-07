<?php
	session_start();

	include_once('Connection.php');

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor"))
	{
		header("Location:Loginpage.php");
	}

    $id = $_GET['id'];

	$sql1 = "SELECT * FROM announcement WHERE announcement_id='$id'";
	$result1 = $conn->query($sql1);	

    if(isset($_POST['text'])){
		$title = $_POST['title'];
		$announcement = $_POST['text'];
        $sql = "UPDATE announcement SET title='$title',content='$announcement' WHERE announcement_id='$id' ";
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
        <title>Nottingham Tutor 2.0</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="announcement_new.css">
    </head>
    <body>
        <aside>
            <div class="header">
                <div class="logo">
                    <img src="./image/logo1.png" alt="" >
                    <span class="title">Nottingham Tutor 2.0</span>
                </div>
                <div class="hidden">
                    <img src="./image/icon.png" alt="">
                </div>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="#">
                            <ion-icon name="person"></ion-icon>
                            <span class="title">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <ion-icon name="calendar"></ion-icon>
                            <span class="title">Appointment</span>
                        </a>
                    </li>
                    <li>
                        <a href="Announcement.php">
                            <ion-icon name="mail"></ion-icon>
                            <span class="title">Announcement</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <ion-icon name="chatbubble-ellipses"></ion-icon>
                            <span class="title">Message</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="logout">
                <a href="#">
                    <span class="title">Logout</span>
                    <ion-icon name="log-out"></ion-icon>
                </a>
            </div>
        </aside>
        <main>
            <div class="background">
                <div class="background-image"></div>
                <div class="title-container">
                    <span class="title">Edit Announcement</span>
                </div>
                <div class="content-container">
				<?php
					while($rows=$result1->fetch_assoc())
					{
				?>
                    <form id="announcementform"  method="POST" >
                        <label for="title">New Title:</label><br>
                        <input type="text" id="title" name="title" value="<?php echo $rows['title'];?>"><br></br>
                        <label for="Content">New Content:</label><br>
                        <textarea id="announcement" name="text"><?php echo $rows['content'];?></textarea>
						<input type="submit" value="Submit">
                    </form>
				<?php } ?>

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
