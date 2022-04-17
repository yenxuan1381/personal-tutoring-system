<?php
	session_start();

	include_once('Connection.php');

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or (($_SESSION['category'] != "Tutor") and ($_SESSION['category'] != "Student")))
	{
		header("Location:Loginpage.php");
	}

	$userid = $_SESSION['userid'];
	
	if(isset($_POST['id'])){
		$_SESSION['announcementid'] = $_POST['id'];
	}

	
	$announcementid = $_GET['announcementid'];
	
	

	
    $sql = "SELECT * FROM announcement WHERE announcement_id = '$announcementid';";
	$result = $conn->query($sql);	
	$sql1 = "SELECT * FROM comment WHERE announcement_id = '$announcementid';";	
	$result1 = $conn->query($sql1);	
	if($_SESSION['category']=="Student"){
		$sql2 = "SELECT name FROM tutors WHERE `Lect ID` = (SELECT `Tutor Id` FROM students WHERE `Student Id` ='$userid')";
		$sql3 = "SELECT `Full Name` FROM students WHERE `Student Id` = '$userid'";
		$result3 = $conn->query($sql3);	
		while($rows=$result3->fetch_assoc())
		{
			$studentname = $rows['Full Name'];
		}
	}
	elseif($_SESSION['category']=="Tutor"){
		$sql2 = "SELECT name FROM tutors WHERE `Lect ID` = $userid";
	}
	$result2 = $conn->query($sql2);	
	while($rows=$result2->fetch_assoc())
	{
		$tutorname = $rows['name'];
	}	
	
	if(isset($_POST['text'])){
		$comment = $_POST['text'];
		if($_SESSION['category']=="Tutor"){
			$sql = "INSERT INTO comment (user_name,announcement_id,content) VALUES ('$tutorname','$announcementid','$comment')";
		}
		elseif($_SESSION['category']=="Student"){
			$sql = "INSERT INTO comment (user_name,announcement_id,content) VALUES ('$studentname','$announcementid','$comment')";
		}
		
				
		if(mysqli_query($conn, $sql)){
			header("Location:Announcementview.php?announcementid=$announcementid");
		} 
		else {
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
        <link rel="stylesheet" type="text/css" href="Announcement_view.css">
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
		<?php 
            while($rows=$result->fetch_assoc())
            {   
		?>
			<div class="background">
					<div class="background-image"></div>
					<div class="title-container">
						<span class="title"><?php echo $rows['title']?></span>
					</div>
					<div class="Annoucement-container">
						<div class="from-container">
							<span class="from">From:</span>
							<span class="tutor"><?php echo $rows['tutor_name']?></span>
						</div>
						<div class="Annoucement-info">
							<h3><pre><?php echo $rows['content']?></pre></h3>
						</div>
					</div>
					<div class="Comment-container">
						<div class="comment">
							<p>
							<?php
								while($rows=$result1->fetch_assoc())
								{   
									echo "<span style='color:blue;font-weight:bold;font-size:25px'>",$rows['user_name'],"</span>: ",$rows['content'],"<br><br>";	
								} 
							?> 
							</p>
						</div>
							<div class="container1">
								<form  method="POST" onsubmit="return confirm('Are you sure you want to comment?');">	
								<textarea type="text" id="text_id" name="text" class="input" placeholder="Write a comment"></textarea>							
								<button  class='primaryContained float-right' type="submit">Add Comment</button>
								</form>
							</div>
						</div>
					</div>
					<div class="back-button">
						<a href="announcement.php">
							<ion-icon name="arrow-back"></ion-icon>
						</a>
					</div>
			</div>
			<?php } ?>
		</main>
		<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	</body>

    
    
    </html>

